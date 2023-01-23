@extends('layout')

@section('content')
    <h1 class="mt-2">Alergias</h1>
    <div style="overflow: auto; width: 100%">
        <table class="striped">
            <tr>
                <th>#Paciente</th>
                <th>Organización</th>
                <th>#Encuentro</th>
                <th>Estatus</th>
                <th>Tipo</th>
                <th>Código</th>
                <th>Criticidad</th>
                <th>Fecha</th>
                <th>Hash</th>
            </tr>
            @foreach ($data as $item)
                <tr>
                    <td>{{$item->paciente->id}}</td>
                    <td>{{$item->organizacion->nombre}}</td>
                    <td>{{$item->encuentro_id}}</td>
                    <td>{{$item->estatus}}</td>
                    <td>{{$item->tipo}}</td>
                    <td>{{$item->codigo}}</td>
                    <td>{{$item->criticidad}}</td>
                    <td>{{$item->fecha_de_registro}}</td>
                    <td>{{$item->hash}}</td>
                </tr>
            @endforeach
        </table>
    </div>
    {{$data->links('components.paginatorMaterialize')}}
@endsection