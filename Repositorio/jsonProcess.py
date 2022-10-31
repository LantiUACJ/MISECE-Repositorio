
class Resources:

    def setup(self, json):
        print(json["resourceType"])
        if(json["resourceType"] == "Bundle"):
            self.bundle(json)
        if(json["resourceType"] == "AllergyIntolerance"):
            self.allergyIntolerance(json)
        if(json["resourceType"] == "Patient"):
            self.patient(json)
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
            #print(address_parts.type()) 
            #print(add_items)
        print(add_items.keys())
        for a_item in add_items:
            print(add_items[a_item])
    
    def patient(self, json):
        patient_keys = json.keys()
        print(patient_keys)
        for p_item in json.keys():  
            if(p_item == "identifier"):
                print(json[p_item])
            if(p_item == "birthDate"):
                print(json[p_item])
            if(p_item == "gender"):
                print(json[p_item])
            if(p_item == "address"):
                print(json[p_item])
                self.p_address(json[p_item])

    def FamilyMemberHistory(self, json):
        familymh_keys = json.keys()
        print(familymh_keys)
        for fmh_item in json.keys():  
            #if(obs_item == "identifier"):
            print(json[fmh_item])
    
    def encounter(self, json):
        enc_keys = json.keys()
        print(enc_keys)
        for enc_item in json.keys():  
            #if(enc_item == "identifier"):
            print(json[enc_item])
        #print(json["period"])

    def observation(self, json):
        obs_keys = json.keys()
        print(obs_keys)
        for obs_item in json.keys():  
            #if(obs_item == "identifier"):
            #print(json[obs_item])
            print(obs_item[0])
   
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