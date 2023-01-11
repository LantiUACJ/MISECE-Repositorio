@extends('layout')

@section('content')
    <h1 class="mt-2">Consultar datos</h1>
    <p>Aquí podrás encontrar los diferentes datos que almancenamos en el repositorio.</p>
    <table class="table table-bordered">
        <tr>
            <th>Nombre</th>
            <th>Datos Totales</th>
            <th>Enlace</th>
        </tr>
        <tr>
            <td>Alergias</td>
            <td>{{$alergias}}</td>
            <td> <a href="{{url("alergias")}}" class="btn btn-primary">Ver</a></td>
        </tr>
        <tr>
            <td>Diagnostico</td>
            <td>{{$diagnostico}}</td>
            <td> <a href="{{url("diagnostico")}}" class="btn btn-primary">Ver</a></td>
        </tr>
        <tr>
            <td>Encuentro</td>
            <td>{{$encuentro}}</td>
            <td> <a href="{{url("encuentro")}}" class="btn btn-primary">Ver</a></td>
        </tr>
        <tr>
            <td>Imagenes</td>
            <td>{{$imagenes}}</td>
            <td> <a href="{{url("imagenes")}}" class="btn btn-primary">Ver</a></td>
        </tr>
        <tr>
            <td>Medicamento</td>
            <td>{{$medicamento}}</td>
            <td> <a href="{{url("medicamento")}}" class="btn btn-primary">Ver</a></td>
        </tr>
        <tr>
            <td>Observacion</td>
            <td>{{$observacion}}</td>
            <td> <a href="{{url("observacion")}}" class="btn btn-primary">Ver</a></td>
        </tr>
        <tr>
            <td>Organizacion</td>
            <td>{{$organizacion}}</td>
            <td> <a href="{{url("organizacion")}}" class="btn btn-primary">Ver</a></td>
        </tr>
        <tr>
            <td>Paciente</td>
            <td>{{$paciente}}</td>
            <td> <a href="{{url("paciente")}}" class="btn btn-primary">Ver</a></td>
        </tr>
        <tr>
            <th>Total</th>
            <td>{{$alergias+ $diagnostico+ $encuentro+ $imagenes+ $medicamento+ $observacion+ $organizacion+ $paciente}}</td>
            <td> <a href="{{url("paciente")}}" class="btn btn-primary">Ver</a></td>
        </tr>
    </table>
@endsection