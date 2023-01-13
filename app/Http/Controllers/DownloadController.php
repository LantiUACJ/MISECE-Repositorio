<?php

namespace App\Http\Controllers;

use App\Models\Alergia;
use App\Models\Diagnostico;
use App\Models\Encuentro;
use App\Models\MedicamentoAdministracion;
use App\Models\Observacion;
use App\Models\Organizacion;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function index(){
        return view("downloader.index");
    }

    public function estado($estado){
        $this->headers();
        foreach(Organizacion::where("estado_dir", $estado)->get() as $org){
            $this->genData($org);
        }
    }
    public function organizacion(Organizacion $org){
        $this->headers();
        $this->getdate($org);
    }
    public function estadoForm(){
        $estados = Organizacion::select("estado_dir")->groupBy("estado_dir")->get();
        return view("downloader.estado", ["data"=>$estados]);
    }
    public function organizacionForm(){
        return view("downloader.organizacion", ["data"=>Organizacion::get()]);
    }
    public function todo(){
        $this->headers();
        foreach(Organizacion::cursor() as $org){
            $this->genData($org);
        }
    }
    private function genData(Organizacion $org){
        $col = 0;
        foreach($org->pacientes as $orgPac){
            $pac = $orgPac->paciente;
            if($pac){
                foreach($pac->encuentros as $enc){
                    if($enc->observaciones()->count() > 0){
                        echo "\n";
                        echo "\"#\",\" org-nombre\",\" org-estado_dir\",\" org-ciudad_dir\",\" org-cp_dir\",\" pac-identifier\",\" pac-fecha_nac\",\" pac-estado_nac\",\"pac-nacionalidad\",\"pac-sexo\",\"pac-etnia\",\"pac-genero\",\"pac-estado_dir\",\"pac-ciudad_dir\",\"pac-cp_dir\",\"enc-hash\",\"enc-estatus\",\"enc-motivo\",\"enc-periodo_inicio\",\"enc-periodo_fin\",\"obs-hash\",\"obs-categoria\",\"obs-codigo\",\"obs-valor\",\"obs-fecha_efectiva\",\"obs-estatus\"\n";
                    }
                    foreach($enc->observaciones as $obs){
                        echo "\"".($col++) ."\",\"" .
                            $org->nombre . "\",\"" . 
                            $org->estado_dir . "\",\"". 
                            $org->ciudad_dir . "\",\"" . 
                            $org->cp_dir . "\",\"" . 
                            $pac->identifier . "\",\"" .
                            $pac->fecha_nac . "\",\"" .
                            $pac->estado_nac . "\",\"" .
                            $pac->nacionalidad . "\",\"" .
                            $pac->sexo . "\",\"" .
                            $pac->etnia . "\",\"" .
                            $pac->genero . "\",\"" .
                            $pac->estado_dir . "\",\"" .
                            $pac->ciudad_dir . "\",\"" .
                            $pac->cp_dir . "\",\"" .
                            $enc->hash . "\",\"" .
                            $enc->estatus . "\",\"" .
                            $enc->motivo . "\",\"" .
                            $enc->periodo_inicio . "\",\"" .
                            $enc->periodo_fin . "\",\"" .
                            $obs->hash . "\",\"" .
                            $obs->categoria . "\",\"" .
                            $obs->codigo . "\",\"" .
                            $obs->valor . "\",\"" .
                            $obs->fecha_efectiva . "\",\"" .
                            $obs->estatus . "\"" .
                        "\n";
                    }
                    if($enc->alergias()->count() > 0){
                        echo "\n";
                        echo "\"#\",\" org-nombre\",\" org-estado_dir\",\" org-ciudad_dir\",\" org-cp_dir\",\" pac-identifier\",\" pac-fecha_nac\",\" pac-estado_nac\",\"pac-nacionalidad\",\"pac-sexo\",\"pac-etnia\",\"pac-genero\",\"pac-estado_dir\",\"pac-ciudad_dir\",\"pac-cp_dir\",\"enc-hash\",\"enc-estatus\",\"enc-motivo\",\"enc-periodo_inicio\",\"enc-periodo_fin\",\"ale-hash\",\"ale-estatus\",\"ale-tipo\",\"ale-codigo\",\"ale-criticidad\",\"ale-fecha_de_registro\"\n";
                    }
                    foreach($enc->alergias as $ale){
                        echo "\"".($col++) ."\",\"" .
                            $org->nombre . "\",\"" . 
                            $org->estado_dir . "\",\"". 
                            $org->ciudad_dir . "\",\"" . 
                            $org->cp_dir . "\",\"" . 
                            $pac->identifier . "\",\"" .
                            $pac->fecha_nac . "\",\"" .
                            $pac->estado_nac . "\",\"" .
                            $pac->nacionalidad . "\",\"" .
                            $pac->sexo . "\",\"" .
                            $pac->etnia . "\",\"" .
                            $pac->genero . "\",\"" .
                            $pac->estado_dir . "\",\"" .
                            $pac->ciudad_dir . "\",\"" .
                            $pac->cp_dir . "\",\"" .
                            $enc->hash . "\",\"" .
                            $enc->estatus . "\",\"" .
                            $enc->motivo . "\",\"" .
                            $enc->periodo_inicio . "\",\"" .
                            $enc->periodo_fin . "\",\"" .
                            $ale->hash . "\",\"" .
                            $ale->estatus . "\",\"" .
                            $ale->tipo . "\",\"" .
                            $ale->codigo . "\",\"" .
                            $ale->criticidad . "\",\"" .
                            $ale->fecha_de_registro . "\"" .
                        "\n";
                    }
                    if($enc->medicamentos()->count() > 0){
                        echo "\n";
                        echo "\"#\",\" org-nombre\",\" org-estado_dir\",\" org-ciudad_dir\",\" org-cp_dir\",\" pac-identifier\",\" pac-fecha_nac\",\" pac-estado_nac\",\"pac-nacionalidad\",\"pac-sexo\",\"pac-etnia\",\"pac-genero\",\"pac-estado_dir\",\"pac-ciudad_dir\",\"pac-cp_dir\",\"enc-hash\",\"enc-estatus\",\"enc-motivo\",\"enc-periodo_inicio\",\"enc-periodo_fin\",\"med-hash\",\"med-dosis_texto\",\"med-estatus\",\"med-intent\",\"med-medicamento\"\n";
                    }
                    foreach($enc->medicamentos as $med){
                        echo "\"".($col++) ."\",\"" .
                            $org->nombre . "\",\"" . 
                            $org->estado_dir . "\",\"". 
                            $org->ciudad_dir . "\",\"" . 
                            $org->cp_dir . "\",\"" . 
                            $pac->identifier . "\",\"" .
                            $pac->fecha_nac . "\",\"" .
                            $pac->estado_nac . "\",\"" .
                            $pac->nacionalidad . "\",\"" .
                            $pac->sexo . "\",\"" .
                            $pac->etnia . "\",\"" .
                            $pac->genero . "\",\"" .
                            $pac->estado_dir . "\",\"" .
                            $pac->ciudad_dir . "\",\"" .
                            $pac->cp_dir . "\",\"" .
                            $enc->hash . "\",\"" .
                            $enc->estatus . "\",\"" .
                            $enc->motivo . "\",\"" .
                            $enc->periodo_inicio . "\",\"" .
                            $enc->periodo_fin . "\",\"" .
                            $med->hash . "\",\"" .
                            $med->dosis_texto . "\",\"" .
                            $med->estatus . "\",\"" .
                            $med->intent . "\",\"" .
                            $med->medicamento . "\"" .
                            "\n";
                    }
                    if($enc->diagnosticos()->count() > 0){
                        echo "\n";
                        echo "\"#\",\" org-nombre\",\" org-estado_dir\",\" org-ciudad_dir\",\" org-cp_dir\",\" pac-identifier\",\" pac-fecha_nac\",\" pac-estado_nac\",\"pac-nacionalidad\",\"pac-sexo\",\"pac-etnia\",\"pac-genero\",\"pac-estado_dir\",\"pac-ciudad_dir\",\"pac-cp_dir\",\"enc-hash\",\"enc-estatus\",\"enc-motivo\",\"enc-periodo_inicio\",\"enc-periodo_fin\",\"dia-codigo\",\"dia-fecha_efectiva\"\n";
                    }
                    foreach($enc->diagnosticos as $dia){
                        echo "\"". ($col++) ."\",\"" .
                            $org->nombre . "\",\"" . 
                            $org->estado_dir . "\",\"". 
                            $org->ciudad_dir . "\",\"" . 
                            $org->cp_dir . "\",\"" . 
                            $pac->identifier . "\",\"" .
                            $pac->fecha_nac . "\",\"" .
                            $pac->estado_nac . "\",\"" .
                            $pac->nacionalidad . "\",\"" .
                            $pac->sexo . "\",\"" .
                            $pac->etnia . "\",\"" .
                            $pac->genero . "\",\"" .
                            $pac->estado_dir . "\",\"" .
                            $pac->ciudad_dir . "\",\"" .
                            $pac->cp_dir . "\",\"" .
                            $enc->hash . "\",\"" .
                            $enc->estatus . "\",\"" .
                            $enc->motivo . "\",\"" .
                            $enc->periodo_inicio . "\",\"" .
                            $enc->periodo_fin . "\",\"" .
                            $dia->codigo . "\",\"" .
                            $dia->fecha_efectiva . "\"" .
                            "\n";
                    }
                }
                $enc = new Encuentro();
                $enc->estatus = "NA";
                $enc->motivo = "NA";
                $enc->periodo_inicio = "NA";
                $enc->periodo_fin = "NA";
                if(Observacion::where("encuentro_id","NA")->where("paciente_id",$pac->identifier)->count() > 0){
                    echo "\n";
                    echo "\"#\",\" org-nombre\",\" org-estado_dir\",\" org-ciudad_dir\",\" org-cp_dir\",\" pac-identifier\",\" pac-fecha_nac\",\" pac-estado_nac\",\"pac-nacionalidad\",\"pac-sexo\",\"pac-etnia\",\"pac-genero\",\"pac-estado_dir\",\"pac-ciudad_dir\",\"pac-cp_dir\",\"enc-hash\",\"enc-estatus\",\"enc-motivo\",\"enc-periodo_inicio\",\"enc-periodo_fin\",\"obs-hash\",\"obs-categoria\",\"obs-codigo\",\"obs-valor\",\"obs-fecha_efectiva\",\"obs-estatus\"\n";
                }
                foreach(Observacion::where("encuentro_id","NA")->where("paciente_id", $pac->identifier)->cursor() as $obs){
                    echo "\"". ($col++) ."\",\"" .
                        $org->nombre . "\",\"" . 
                        $org->estado_dir . "\",\"". 
                        $org->ciudad_dir . "\",\"" . 
                        $org->cp_dir . "\",\"" . 
                        $pac->identifier . "\",\"" .
                        $pac->fecha_nac . "\",\"" .
                        $pac->estado_nac . "\",\"" .
                        $pac->nacionalidad . "\",\"" .
                        $pac->sexo . "\",\"" .
                        $pac->etnia . "\",\"" .
                        $pac->genero . "\",\"" .
                        $pac->estado_dir . "\",\"" .
                        $pac->ciudad_dir . "\",\"" .
                        $pac->cp_dir . "\",\"" .
                        $enc->hash . "\",\"" .
                        $enc->estatus . "\",\"" .
                        $enc->motivo . "\",\"" .
                        $enc->periodo_inicio . "\",\"" .
                        $enc->periodo_fin . "\",\"" .
                        $obs->hash . "\",\"" .
                        $obs->categoria . "\",\"" .
                        $obs->codigo . "\",\"" .
                        $obs->valor . "\",\"" .
                        $obs->fecha_efectiva . "\",\"" .
                        $obs->estatus . "\"" .
                    "\n";
                }
                if(Alergia::where("encuentro_id", "NA")->where("paciente_id", $pac->identifier)->count() > 0){
                    echo "\n";
                    echo "\"#\",\" org-nombre\",\" org-estado_dir\",\" org-ciudad_dir\",\" org-cp_dir\",\" pac-identifier\",\" pac-fecha_nac\",\" pac-estado_nac\",\"pac-nacionalidad\",\"pac-sexo\",\"pac-etnia\",\"pac-genero\",\"pac-estado_dir\",\"pac-ciudad_dir\",\"pac-cp_dir\",\"enc-hash\",\"enc-estatus\",\"enc-motivo\",\"enc-periodo_inicio\",\"enc-periodo_fin\",\"ale-hash\",\"ale-estatus\",\"ale-tipo\",\"ale-codigo\",\"ale-criticidad\",\"ale-fecha_de_registro\"\n";
                }
                foreach(Alergia::where("encuentro_id", "NA")->where("paciente_id", $pac->identifier)->cursor() as $ale){
                    echo "\"". ($col++) ."\",\"" .
                        $org->nombre . "\",\"" . 
                        $org->estado_dir . "\",\"". 
                        $org->ciudad_dir . "\",\"" . 
                        $org->cp_dir . "\",\"" . 
                        $pac->identifier . "\",\"" .
                        $pac->fecha_nac . "\",\"" .
                        $pac->estado_nac . "\",\"" .
                        $pac->nacionalidad . "\",\"" .
                        $pac->sexo . "\",\"" .
                        $pac->etnia . "\",\"" .
                        $pac->genero . "\",\"" .
                        $pac->estado_dir . "\",\"" .
                        $pac->ciudad_dir . "\",\"" .
                        $pac->cp_dir . "\",\"" .
                        $enc->hash . "\",\"" .
                        $enc->estatus . "\",\"" .
                        $enc->motivo . "\",\"" .
                        $enc->periodo_inicio . "\",\"" .
                        $enc->periodo_fin . "\",\"" .
                        $ale->hash . "\",\"" .
                        $ale->estatus . "\",\"" .
                        $ale->tipo . "\",\"" .
                        $ale->codigo . "\",\"" .
                        $ale->criticidad . "\",\"" .
                        $ale->fecha_de_registro . "\"" .
                    "\n";
                }
                if(MedicamentoAdministracion::where("encuentro_id", "NA")->where("paciente_id", $pac->identifier)->count() > 0){
                    echo "\n";
                    echo "\"#\",\" org-nombre\",\" org-estado_dir\",\" org-ciudad_dir\",\" org-cp_dir\",\" pac-identifier\",\" pac-fecha_nac\",\" pac-estado_nac\",\"pac-nacionalidad\",\"pac-sexo\",\"pac-etnia\",\"pac-genero\",\"pac-estado_dir\",\"pac-ciudad_dir\",\"pac-cp_dir\",\"enc-hash\",\"enc-estatus\",\"enc-motivo\",\"enc-periodo_inicio\",\"enc-periodo_fin\",\"med-hash\",\"med-dosis_texto\",\"med-estatus\",\"med-intent\",\"med-medicamento,\" \n";
                }
                foreach(MedicamentoAdministracion::where("encuentro_id", "NA")->where("paciente_id", $pac->identifier)->cursor() as $med){
                    echo "\"". ($col++) ."\",\"" .
                        $org->nombre . "\",\"" . 
                        $org->estado_dir . "\",\"". 
                        $org->ciudad_dir . "\",\"" . 
                        $org->cp_dir . "\",\"" . 
                        $pac->identifier . "\",\"" .
                        $pac->fecha_nac . "\",\"" .
                        $pac->estado_nac . "\",\"" .
                        $pac->nacionalidad . "\",\"" .
                        $pac->sexo . "\",\"" .
                        $pac->etnia . "\",\"" .
                        $pac->genero . "\",\"" .
                        $pac->estado_dir . "\",\"" .
                        $pac->ciudad_dir . "\",\"" .
                        $pac->cp_dir . "\",\"" .
                        $enc->hash . "\",\"" .
                        $enc->estatus . "\",\"" .
                        $enc->motivo . "\",\"" .
                        $enc->periodo_inicio . "\",\"" .
                        $enc->periodo_fin . "\",\"" .
                        $med->hash . "\",\"" .
                        $med->dosis_texto . "\",\"" .
                        $med->estatus . "\",\"" .
                        $med->intent . "\",\"" .
                        $med->medicamento . "\"" .
                        "\n";
                }
                if(Diagnostico::where("encuentro_id", "NA")->where("paciente_id", $pac->identifier)->count() > 0){
                    echo "\n";
                    echo "\"#\",\" org-nombre\",\" org-estado_dir\",\" org-ciudad_dir\",\" org-cp_dir\",\" pac-identifier\",\" pac-fecha_nac\",\" pac-estado_nac\",\"pac-nacionalidad\",\"pac-sexo\",\"pac-etnia\",\"pac-genero\",\"pac-estado_dir\",\"pac-ciudad_dir\",\"pac-cp_dir\",\"enc-hash\",\"enc-estatus\",\"enc-motivo\",\"enc-periodo_inicio\",\"enc-periodo_fin\",\"dia-codigo\",\"dia-fecha_efectiva\"\n";
                }
                foreach(Diagnostico::where("encuentro_id", "NA")->where("paciente_id", $pac->identifier)->cursor() as $dia){
                    echo "\"". ($col++) ."\",\"" .
                        $org->nombre . "\",\"" . 
                        $org->estado_dir . "\",\"". 
                        $org->ciudad_dir . "\",\"" . 
                        $org->cp_dir . "\",\"" . 
                        $pac->identifier . "\",\"" .
                        $pac->fecha_nac . "\",\"" .
                        $pac->estado_nac . "\",\"" .
                        $pac->nacionalidad . "\",\"" .
                        $pac->sexo . "\",\"" .
                        $pac->etnia . "\",\"" .
                        $pac->genero . "\",\"" .
                        $pac->estado_dir . "\",\"" .
                        $pac->ciudad_dir . "\",\"" .
                        $pac->cp_dir . "\",\"" .
                        $enc->hash . "\",\"" .
                        $enc->estatus . "\",\"" .
                        $enc->motivo . "\",\"" .
                        $enc->periodo_inicio . "\",\"" .
                        $enc->periodo_fin . "\",\"" .
                        $dia->codigo . "\",\"" .
                        $dia->fecha_efectiva . "\"" .
                        "\n";
                }
            }
            else{
                echo "No patient <br>";
            }
        }
    }
    private function headers(){
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: private",false);
        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename=\"data.csv\";" );
        header("Content-Transfer-Encoding: binary"); 
    }
}
