

import hashlib
from datetime import datetime
from types import NoneType
from Repositorio.models import P_direccion, Paciente, P_encuentro, P_observacion

class Resources:


    

    def __init__(self, json):
        print("inicio")
        for b_item in json.keys(): 
            print(json.keys())
            if(b_item == "entry"):
                for element in json["entry"]:   
                    for e_item in element.keys():  
                        if(e_item == "resource"):
                            if(element["resource"]["resourceType"] == "Patient"):
                                print(element["resource"])
                                self.paciente = self.patient(element["resource"])
                            if(element["resource"]["resourceType"] == "Organization"):
                                print(element)
                            
            
        
    def setup(self, json):    
        print(self.paciente)    
        print(json["resourceType"])
        if(json["resourceType"] == "Bundle"):
            self.bundle(json)
        if(json["resourceType"] == "Composition"):
            self.composition(json)
        if(json["resourceType"] == "AllergyIntolerance"):
            self.allergyIntolerance(json)
        if(json["resourceType"] == "FamilyMemberHistory"):
            self.FamilyMemberHistory(json)
        if(json["resourceType"] == "Encounter"):
            self.encounter(json)
        if(json["resourceType"] == "Observation"):
            self.observation(json)
        if(json["resourceType"] == "Medication"):
            self.medication(json)
        if(json["resourceType"] == "MedicationRequest"):
            self.medication_req(json)
        if(json["resourceType"] == "Condition"):
            self.condition(json)
 
    def bundle(self, json):
        Bundle_keys = json.keys()
        print(Bundle_keys)
        for b_item in json.keys(): 
            if(b_item == "entry"):
                for element in json["entry"]:   
                    self.entry(element)
    
    def allergyIntolerance(self, json):
        #print(json["resourceType"])
        print(json["criticality"])

    def hash_id(self, curp):
        salt = "repo"
        palabra = curp + salt
        palabra_h = hashlib.sha256(palabra.encode()).hexdigest()
        return palabra_h

    def lst_2dic(self, json):
        print(json)
        dic_items = {}
        lst_len= len(json)
        for i in range(lst_len):
            print(i)
            dic_items = json[i]
            print(dic_items)
        return dic_items
   
    def p_id_curp(self, json):
        id_len = len(json)
        print(id_len)
        id_items = {}
        for i in range(id_len):
            id_items = json[i]
            print(id_items)
            if id_items['system'] == 'CURP':
                return id_items
        
    def composition(self, json):
        for comp_item in json.keys():  
            if(comp_item == "encounter"):
                for e_item in json[comp_item]:
                    if(e_item == "reference"):
                        print(json[comp_item][e_item])
                       # self.encuentro = json[comp_item][e_item]
                        
  
    def patient(self, json):
        Paciente_act = Paciente()
        P_dir = P_direccion()
        for p_item in json.keys():  
            if(p_item == "identifier"):
                pac_id = {}
                pac_id = (self.p_id_curp(json[p_item]))
                print("identification section")
                if pac_id == None:
                    print("No hay CURP para este paciente")
                else:
                    print(pac_id)
                    for i_item in pac_id:
                        print(i_item)
                        if(i_item == "system"):
                            print(pac_id[i_item])
                            sistema = pac_id[i_item]
                        if(i_item == "value"):
                            valor = pac_id[i_item]
                    if sistema == "CURP":
                        Pac_Curp = valor
                        Paciente_act.paciente_id = self.hash_id(Pac_Curp)
                        #Paciente_act.paciente_id = "123456789"   
            if(p_item == "birthDate"):
                Paciente_act.fecha_nac = json[p_item]
            if(p_item == "gender"):
                Paciente_act.genero = json[p_item]
            if(p_item == "address"):
                print(json[p_item])
                dir = {}
                dir = (self.lst_2dic(json[p_item]))
                for a_item in dir:
                    if(a_item == "state"):
                        P_dir.estado_dir = dir[a_item]
                    if(a_item == "city"):
                        P_dir.ciudad_dir = dir[a_item]
                    if(a_item == "postalCode"):
                        P_dir.cp_dir = dir[a_item]
           #retornar estatus de guardar info, error o todo bien, (archivo de log pendiente)
        Paciente_act.save()
        #p_dir.paciente_id = Paciente_act
        P_dir.paciente_id = Paciente_act.paciente_id
        Paciente_ind = Paciente_act.paciente_id
        P_dir.save()
        return Paciente_act.paciente_id
       
    

    def FamilyMemberHistory(self, json):
        familymh_keys = json.keys()
        print(familymh_keys)
        for fmh_item in json.keys():  
            #if(obs_item == "identifier"):
            print(json[fmh_item])
    
    def encounter(self, json):
        print("Encuentro")
        Encuentro_act = P_encuentro()
        for e_item in json.keys():  
            if(e_item == "class"):
                #print((json[e_item]))
                clase = {}
                clase = json[e_item]
                print("encounter/class section")
                if clase == None:
                    print("No hay datos de clase para este encuentro")
                else:
                    print(clase)
                    for c_item in clase:
                        if(c_item == "system"):
                            Encuentro_act.sistema = clase[c_item]
                        if(c_item == "code"):
                            Encuentro_act.codigo = clase[c_item]
                        if(c_item == "display"):
                            Encuentro_act.visual = clase[c_item]
            if(e_item == "id"):
                print((json[e_item]))
                Encuentro_act.encuentro_id = json[e_item]
            if(e_item == "period"):
                #print((json[e_item]))
                periodo = {}
                periodo = json[e_item]
                print("encounter/class section")
                if periodo == None:
                    print("No hay datos de clase para este encuentro")
                else:
                    print(periodo)
                    for pe_item in periodo:
                        print(pe_item)
                        if(pe_item == "start"):
                            Encuentro_act.periodo_inicio = periodo[pe_item]
                        if(pe_item == "end"):
                            Encuentro_act.periodo_fin = periodo[pe_item]
        Encuentro_act.paciente_id = self.paciente
        Encuentro_act.save()
       
    def observation(self, json):
        observacion = P_observacion()
        obs_keys = json.keys()
        print(obs_keys)
        for obs_item in json.keys():  
            if(obs_item == "encounter"):
                #id_encuentro = json[obs_item]
                for enc_item in json[obs_item]:
                    if(enc_item == "reference"):
                        id_encuentro = json[obs_item][enc_item]
                        #remover "Encounter/" del valor, el id del encuentro al que corresponde esta observación inicia en el lugar 10
                        observacion.encuentro_id = id_encuentro[10:]
                print(observacion.encuentro_id)
            #print(json[obs_item])
            print(json[obs_item])
            if(obs_item == "effectiveDateTime"):
                observacion.fecha_efectiva = json[obs_item]
            if(obs_item == "id"):
                print("obs id:")
                observacion.observacion_id = json[obs_item]
                print(observacion.observacion_id)
            if(obs_item == "code"):
                for code_item in json[obs_item]:
                    if(code_item == "coding"):
                        print(json[obs_item]["coding"])
                        coding = {}
                        coding = (self.lst_2dic(json[obs_item][code_item]))
                        print("coding after lst to dic fnc")
                        print(coding)
                        for c_item in coding:
                            print(coding[c_item])    
                            if(c_item == "code"):
                                observacion.codigo_codigo = coding[c_item]
                            if(c_item == "system"):
                                observacion.codigo_sistema = coding[c_item]
                            if(c_item == "display"):
                                observacion.codigo_visual = coding[c_item]
                    if(code_item == "text"):
                        observacion.codigo_texto = json[obs_item][code_item]
            if(obs_item == "valueQuantity"):
                observacion.tipo_valor = obs_item
                print(json[obs_item])
                for v_item in json[obs_item]:
                    if(v_item == "value"):
                        observacion.cantidad_valor = json[obs_item][v_item]
                    if(v_item == "unit"):
                        observacion.cantidad_unidad = json[obs_item][v_item]
                    if(v_item == "code"):
                        observacion.cantidad_codigo = json[obs_item][v_item]
                    if(v_item == "system"):
                        observacion.cantidad_sistema = json[obs_item][v_item]
            if(obs_item == "valueCodeableConcept"):
                observacion.tipo_valor = obs_item
                print(json[obs_item])
                for v_item in json[obs_item]:
                    if(v_item == "display"):
                        observacion.cantidad_visual = json[obs_item][v_item]
                    if(v_item == "unit"):
                        observacion.cantidad_unidad = json[obs_item][v_item]
                    if(v_item == "code"):
                        observacion.cantidad_codigo = json[obs_item][v_item]
                    if(v_item == "system"):
                        observacion.cantidad_sistema = json[obs_item][v_item]
            if(obs_item == "valueString"):
                observacion.tipo_valor = obs_item
                observacion.cantidad_texto = json[obs_item]
            if(obs_item == "status"):
                observacion.estatus = json[obs_item]
            observacion.paciente_id = self.paciente
        observacion.save()
   
    def medication(self, json):
        med_keys = json.keys()
        print(med_keys)
        for med_item in json.keys():  
            #if(med_item == "identifier"):
            print(json[med_item])
    
    def medication_req(self, json):
        medr_keys = json.keys()
        print(medr_keys)
        for medr_item in json.keys():  
            #if(med_item == "identifier"):
            print(json[medr_item])
    
    def entry(self, json):
        entry_keys = json.keys()
        print(entry_keys)
        for e_item in json.keys():  
            if(e_item == "fullurl"):
                self.fullurl = (json[e_item])
                print(self.fullurl)
            if(e_item == "resource"):
                self.setup(json[e_item])
    
    def condition(self, json):
        con_keys = json.keys()
        print(con_keys)
        for con_item in json.keys():  
            #if(con_item == "identifier"):
            print(json[con_item])
    
    
        #print(json["resourceType"])
        #print(json["identifier"])