from django.http import HttpRequest, HttpResponse
from django.views.decorators.csrf import csrf_exempt
import json

@csrf_exempt
def petition(request):
    if request.method == 'POST':
        data = request.POST['data']
        varJson = json.loads(data)

        print(varJson["entry"][0]["resource"]["resourceType"])
        return HttpResponse("{\"status\":\"Ok\"}", content_type="Application/json")
    else:
        return HttpResponse("{\"status\":\"Fail\"}", content_type="Application/json")
    