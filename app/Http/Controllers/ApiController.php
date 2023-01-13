<?php

namespace App\Http\Controllers;

use App\Fhir\Element\Reference;
use App\Models\Paciente;
use App\Models\Observacion;
use App\Models\Encuentro;
use Illuminate\Http\Request;


class ApiController extends Controller
{

    public function store(Request $request){
        
        //return ($request->input("bundle"));
        $bundle = new \App\Fhir\Resource\Bundle($request->input("bundle"));
        $patient = $bundle->findPatient(1);
        $pat = null;

        foreach($patient->identifier as $identifier){
            if((
                    (isset($identifier->type) && isset($identifier->type->text) && $identifier->type->text == "CURP") || 
                    (isset($identifier->system) && $identifier->system == "urn:oid:2.16.840.1.113883.4.629")
                ) && isset($identifier->value)){
                $hash = hash("sha256", $identifier->value);
                $pat = Paciente::where("identifier", $hash)->first();
                if(!$pat){
                    $pat = new Paciente();
                    $pat->identifier = $hash;
                    break;
                }
            }
        }
        if(!$pat){
            return ["error"=>"not curp", "data"=>$patient];
        }
        $pat->fecha_nac = $patient->birthDate;
        $pat->estado_nac = "";
        $pat->estado_dir = "";
        $pat->ciudad_dir = "";
        $pat->cp_dir = "";
        foreach($patient->address as $address){
            if(isset($address->state)){
                $pat->estado_nac = $address->state;
                break;
            }
            if(isset($address->state)){
                $pat->estado_dir = $address->state;
                break;
            }
            if(isset($address->city)){
                $pat->ciudad_dir = $address->city;
                break;
            }
            if(isset($address->postalCode)){
                $pat->cp_dir = $address->postalCode;
                break;
            }
        }
        $pat->nacionalidad = "";
        $pat->sexo = "";
        $pat->etnia = "";
        $pat->genero = $patient->gender;
        $pat->save();

        $elements = $this->bundle($bundle->toArray()["entry"]);
        $organizacion = null;

        $resources = [];
        $encounters = [];

        foreach($elements as $element){
            switch($element["resourceType"]){
                case "AllergyIntolerance":
                    $alergia = new \App\Models\Alergia();
                    $alergia->paciente_id = $pat->identifier;
                    /* 
                        paciente_id [x]
                        organizacion_id [x]
                        encuentro_id [?]
                        hash [x]
                        estatus [x] allergyIntolerance.clinicalStatus
                        tipo [x] allergyIntolerance.type
                        codigo [x] allergyIntolerance.text
                        criticidad[x] allergyIntolerance.criticality
                        fecha_de_registro[x] allergyIntolerance.recordedDate
                    */
                    $alergia->estatus = "t";
                    if(isset($element["clinicalStatus"]) && isset($element["clinicalStatus"]["text"]))
                        $alergia->estatus = $element["clinicalStatus"]["text"];
                    $alergia->tipo = "t";
                    if(isset($element["type"]))
                        $alergia->tipo = $element["type"];
                    $alergia->codigo = "t";
                    if(isset($element["code"]) && isset($element["code"]) && isset($element["code"]["text"]))
                        $alergia->codigo = $element["code"]["text"];
                    $alergia->criticidad = "t";
                    if(isset($element["criticality"]))
                        $alergia->criticidad = $element["criticality"];
                    $alergia->fecha_de_registro = "t";
                    if(isset($element["recordedDate"]))
                        $alergia->fecha_de_registro = $element["recordedDate"];
                    $alergia->encuentro_id = null;
                    if(isset($element["encounter"]))
                        $alergia->encuentro_id = $element["encounter"];
                    //dd($alergia);
                    $resources [] = $alergia;
                break;
                case "Organization":
                    /*
                        nombre
                        estado_dir
                        ciudad_dir
                        cp_dir
                    */
                    if(isset($element["name"])){
                        if(\App\Models\Organizacion::where("nombre", $element["name"])->count() > 0){
                            $organizacion = \App\Models\Organizacion::where("nombre", $element["name"])->first();
                        }
                        else{
                            $organizacion = new \App\Models\Organizacion();
                        }
                        $organizacion->nombre = $element["name"];
                    }
                    else{
                        break;
                    }
                    
                    $organizacion->estado_dir = "t";
                    if(isset($element["address"]) && isset($element["address"][0]) && isset($element["address"][0]["state"]))
                        $organizacion->estado_dir = $element["address"][0]["state"];
                    
                    $organizacion->ciudad_dir = "t";
                    if(isset($element["address"]) && isset($element["address"][0]) && isset($element["address"][0]["city"]))
                        $organizacion->ciudad_dir = $element["address"][0]["city"];
                    
                    $organizacion->cp_dir = "t";
                    if(isset($element["address"]) && isset($element["address"][0]) && isset($element["address"][0]["postalCode"]))
                        $organizacion->cp_dir = $element["address"][0]["postalCode"];
                    
                    $organizacion->save();
                break;
                case "Observation":
                    /*
                        paciente_id [x]
                        organizacion_id [x]
                        encuentro_id [x]
                        hash [x]
                        categoria [x] observation.category.0.text
                        codigo [x] observation.code.0.text
                        valor [x] observation.valueString
                        fecha_efectiva [x] observation.effectiveDateTime
                        estatus [x] observation.status
                    */
                    $observation = new Observacion();
                    $observation->paciente_id = $pat->identifier;
                    
                    $observation->categoria = "t";
                    if(isset($element["category"]) && isset($element["category"][0]["text"]))
                        $observation->categoria = $element["category"][0]["text"];
                    $observation->codigo = "t";
                    if(isset($element["code"]) && isset($element["code"][0]["text"]))
                        $observation->codigo = $element["code"][0]["text"];
                    $observation->valor = "t";
                    if(isset($element["valueString"]))
                        $observation->valor = $element["valueString"];
                    $observation->fecha_efectiva = "t";
                    if(isset($element["effectiveDateTime"]))
                        $observation->fecha_efectiva = $element["effectiveDateTime"];
                    $observation->estatus = "t";
                    if(isset($element["status"]))
                        $observation->estatus = $element["status"];
                    $resources[] = $observation;
                    $observation->encuentro_id = null;
                    if(isset($element["encounter"]))
                        $observation->encuentro_id = $element["encounter"];
                    //dd($element);
                break;
                case "Condition":
                    /*
                        paciente_id
                        organizacion_id
                        encuentro_id
                        codigo [x] condition.CodeableConcepto.texto
                        fecha_efectiva [x] condition.recordedDate
                    */
                    $condicion = new \App\Models\Diagnostico();
                    $condicion->paciente_id = $pat->identifier;
                    $condicion->codigo = "t";
                    if(isset($element["code"]) && isset($element["code"]["text"]))
                        $condicion->codigo = $element["code"]["text"];
                    $condicion->fecha_efectiva = "t";
                    if(isset($element["recordedDate"]))
                        $condicion->fecha_efectiva = $element["recordedDate"];
                    $condicion->encuentro_id = null;
                    if(isset($element["encounter"]))
                        $condicion->encuentro_id = $element["encounter"];
                    $resources[] = $condicion;
                break;
                case "Encounter":
                    /*
                        paciente_id
                        organizacion_id
                        hash
                        estatus [x] encounter.status
                        motivo [x] encounter.reasonCode.0.text
                        periodo_inicio [x] encounter.period.start
                        periodo_fin [x] encounter.period.end
                    */
                    $encounter = new Encuentro();
                    $encounter->paciente_id=$pat->identifier;
                    $encounter->estatus="t";
                    if(isset($element["status"]))
                        $encounter->estatus = $element["status"];
                    $encounter->motivo = "t";
                    if(isset($element["reasonCode"]) && isset($element["reasonCode"][0]["text"]))
                        $encounter->motivo=$element["reasonCode"][0]["text"];
                    $encounter->periodo_inicio="t";
                    if(isset($element["period"]) && isset($element["period"]["start"]))
                        $encounter->periodo_inicio=$element["period"]["start"];
                    $encounter->periodo_fin="t";
                    if(isset($element["period"]) && isset($element["period"]["end"]))
                        $encounter->periodo_fin=$element["period"]["end"];
                    $encounters[$element["id"]] = $encounter;
                break;
                case "MedicationRequest":
                    /*
                        paciente_id
                        organizacion_id
                        encuentro_id
                        hash
                        dosis_texto
                        estatus
                        intent
                        medicamento
                    */
                    $medicacion = new \App\Models\MedicamentoAdministracion();

                    $medicacion->paciente_id = $pat->identifier;
                    $medicacion->medicamento = "t";
                    if(isset($element["medicationCodeableConcept"]) && isset($element["medicationCodeableConcept"]["text"]))
                        $medicacion->medicamento = $element["medicationCodeableConcept"]["text"];
                    $medicacion->dosis_texto = "t";
                    if(isset($element["dosageInstruction"]) && isset($element["dosageInstruction"][0]) && isset($element["dosageInstruction"][0]["text"]))
                        $medicacion->dosis_texto = $element["dosageInstruction"][0]["text"];
                    $medicacion->estatus = "t";
                    if(isset($element["estatus"]))
                        $medicacion->estatus = "existe";
                    $medicacion->intent = "t";
                    if(isset($element["intent"]))
                        $medicacion->intent = "existe";
                    $medicacion->encuentro_id = null;
                    if(isset($element["encounter"]))
                        $medicacion->encuentro_id = $element["encounter"];
                    $resources[] = $medicacion;
                break;
            }
        }
        if($organizacion){
            if(\App\Models\OrganizacionPaciente::where("paciente_id", $pat->identifier)->where("organizacion_id", $organizacion->id)->count() == 0){
                $orgPac = new \App\Models\OrganizacionPaciente();
                $orgPac->paciente_id = $pat->identifier;
                $orgPac->organizacion_id = $organizacion->id;
                $orgPac->save();
            }
        }

        foreach($encounters as $key => $element){
            if(!$organizacion)
                return ["error"=>"no organization"];
            $element->organizacion_id = $organizacion->id;
            $element->hash = hash("sha256", json_encode($element->toArray()));
            $exists = \App\Models\Encuentro::where("hash", $element->hash)->count()>0;
            if(!$exists){
                $element->save();
            }
            else{
                $encounters[$key] = \App\Models\Encuentro::where("hash", $element->hash)->first();
            }
        }

        $saved = 0;
        foreach($resources as $element){
            if(!$organizacion)
                return ["error"=>"no organization"];
            $element->organizacion_id = $organizacion->id;
            
            if($element->encuentro_id == null){
                $element->encuentro_id = "NA";
            }
            else{
                $encuentro = Reference::Load(json_decode(json_encode($element->encuentro_id)));
                //dd([$encounters, $element, $encuentro, json_encode($element->encuentro_id), $bundle->findResource($encuentro->getReferenceId())]);//$encounters[$encuentro->getReferenceId()]]);
                if(isset($encounters[$encuentro->getReferenceId()])){
                    $element->encuentro_id = $encounters[$encuentro->getReferenceId()]->id;
                }
                else{
                    $element->encuentro_id = "NA";
                }
            }
            $element->hash = hash("sha256", json_encode($element->toArray()));
            
            $exists = false;
            $kill = false;
            switch($element::class){
                case "App\Models\Observacion":
                    $exists = \App\Models\Observacion::where("hash", $element->hash)->count()>0;
                break;
                case "App\Models\MedicamentoAdministracion":
                    $exists = \App\Models\MedicamentoAdministracion::where("hash", $element->hash)->count()>0;
                break;
                case "App\Models\Alergia":
                    $exists = \App\Models\Alergia::where("hash", $element->hash)->count()>0;
                break;
            };

            if(!$exists){
                $saved++;
                if(!$element->save()){
                    //dd($exists, $kill, $element);
                }
            }
        }
        return ["status"=>true, "msg"=>"Almacenado correctamente", "saved"=>$saved];
    }

    private function bundle($data, $elements = []){
        foreach($data as $element){
            if($element["resource"]["resourceType"] != "Bundle")
                $elements[] = $element["resource"];
            else
                $elements = $this->bundle($element["resource"]["entry"], $elements);
        }
        return $elements;
    }
}
