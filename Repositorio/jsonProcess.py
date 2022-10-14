
class Resources:

    def setup(self, json):
        if(json["resourceType"] == "Bundle"):
            self.bundle(json)
        if(json["resourceType"] == "AllergyIntolerance"):
            self.allergyIntolerance(json)

    def bundle(self, json):
        print(json["resourceType"])
        print(json["id"])
        print(json["type"])
        for element in json["entry"]:
            self.setup(element["resource"])

    def allergyIntolerance(self, json):
        print(json["resourceType"])
        print(json["criticality"])