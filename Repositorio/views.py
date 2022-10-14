from django.http import HttpRequest, HttpResponse
from django.views.decorators.csrf import csrf_exempt
import json
from Repositorio.jsonProcess import Resources

@csrf_exempt
def petition(request):
    if request.method == 'POST':
        data = request.POST['data']
        varJson = json.loads(data)

        print(varJson["entry"][0]["resource"]["resourceType"])
        return HttpResponse("{\"status\":\"Ok\"}", content_type="Application/json")
    else:
        return HttpResponse("{\"status\":\"fail\"}", content_type="Application/json")
    
def readJson(request):
    f = open("test.json", "r")
    data = f.read()
    varJson = json.loads(data)
    res = Resources()
    res.setup(varJson)
    return HttpResponse("{\"status\":\"ok\"}", content_type="Application/json")
