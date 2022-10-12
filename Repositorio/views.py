from django.http import HttpRequest, HttpResponse
from django.views.decorators.csrf import csrf_exempt
import json

@csrf_exempt
def petition(request):
    if request.method == 'POST':
        data = request.POST['data']
        varJson = json.loads(data)

        print(varJson["entry"][0]["resource"]["resourceType"])
        return HttpResponse("{\"status\":\"ok\"}", content_type="Application/json")
    else:
        return HttpResponse("{\"status\":\"fail\"}", content_type="Application/json")
    