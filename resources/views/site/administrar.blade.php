@extends('layout')

@section('content')
    <div class="jumbotron mt-2">
        <h1 class="display-3">Administrar</h1>

        <a href="{{url("administrar/actualizar")}}" class="btn">Actualizar repositorio</a>
    </div>
@endsection