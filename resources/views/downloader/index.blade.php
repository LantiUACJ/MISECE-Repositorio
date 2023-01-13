@extends('layout')

@section('content')
    <p>
        Para descargar la información seleccione una opción <br>
    </p>
    <ul>
        <li><b>Organización</b>: Permite seleccionar una organización para descargar todos los datos asociados a esa organización.</li>
        <li><b>Estado</b>: Permite seleccionar un estado para descargar todos los datos asociados al estado.</li>
        <li><b>Todo</b>: Descargar todos los datos.</li>
    </ul>
    <p>
        <a href="{{url("descargar/organizacion")}}" class="btn">Organización</a>
    </p>
    <p>
        <a href="{{url("descargar/estado")}}" class="btn">Estado</a>
    </p>
    <p>
        <a href="{{url("descargar/todo")}}" class="btn">Todo</a>
    </p>
@endsection