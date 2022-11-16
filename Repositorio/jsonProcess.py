
from datetime import datetime
from types import NoneType
from Repositorio.models import P_direccion, Paciente, P_encuentro


class Resources:
    def __init__(self, json):
        print("inicio")
        for b_item in json.keys(): 
            if(b_item == "entry"):
                for element in json["entry"]:   
                    for e_item in element.keys():  
                        if(e_item == "resource"):
                            if(element["resource"]["resourceType"] == "Patient"):
                                print(element["resource"])
                                self.paciente= self.patient(element["resource"])
                            if(element["resource"]["resourceType"] == "Organization"):
                                print(element)
                            
            
        
    def setup(self, json):        
        print(json["resourceType"])
        if(json["resourceType"] == "Bundle"):
            self.bundle(json)
        if(json["resourceType"] == "AllergyIntolerance"):
            self.allergyIntolerance(json)
#        if(json["resourceType"] == "Patient"):
#            self.patient(json)
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
                    #self.setup(element["resource"])
                    self.entry(element)
                #print(element)
    
    def allergyIntolerance(self, json):
        #print(json["resourceType"])
        print(json["criticality"])


    def p_address(self, json):
        address_len = len(json)
        print(address_len)
        add_items = {}
        for i in range(address_len):
            add_items = json[i]
        return add_items

    def lst_2dic(self, json):
        print(json)
        dic_items = {}
        lst_len= len(json) - 1
        for i in range(lst_len):
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
                        Paciente_act.paciente_id = valor
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
                        #p_dir.estado_dir = json[a_item]
                        P_dir.estado_dir = dir[a_item]
                    if(a_item == "city"):
                        #p_dir.ciudad_dir = json[a_item]
                        P_dir.ciudad_dir = dir[a_item]
                    if(a_item == "postalCode"):
                        #p_dir.cp_dir = json[a_item]
                        P_dir.cp_dir = dir[a_item]
            #retornar estatus de guardar info, error o todo bien, (archivo de log pendiente)
        Paciente_act.save()
        #p_dir.paciente_id = Paciente_act
        P_dir.paciente_id = Paciente_act.paciente_id
        P_dir.save()
       
   

    def FamilyMemberHistory(self, json):
        familymh_keys = json.keys()
        print(familymh_keys)
        for fmh_item in json.keys():  
            #if(obs_item == "identifier"):
            print(json[fmh_item])
    
    def encounter(self, json):
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
                        print(c_item)
                        if(c_item == "system"):
                            Encuentro_act.sistema = clase[c_item]
                        if(c_item == "code"):
                            Encuentro_act.codigo = clase[c_item]
                        if(c_item == "display"):
                            Encuentro_act.visual = clase[c_item]
        Encuentro_act.save()
        enc_keys = json.keys()
        """print(enc_keys)
        for enc_item in json.keys():  
            #if(enc_item == "identifier"):
            print(json[enc_item])
        #print(json["period"])"""

    def observation(self, json):
        obs_keys = json.keys()
        print(obs_keys)
        for obs_item in json.keys():  
            #if(obs_item == "identifier"):
            #print(json[obs_item])
            print(json[obs_item])
   
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