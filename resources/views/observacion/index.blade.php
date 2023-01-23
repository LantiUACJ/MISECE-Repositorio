@extends('layout')

@section('content')
    <h1 class="mt-2">Observación</h1>
    <div style="overflow: auto; width: 100%">
        <table class="striped">
            <thead>
                <tr>
                    <th>#Paciente</th>
                    <th>Organizacion</th>
                    <th>#Encuentro</th>
                    <th>Categoria</th>
                    <th>Codigo</th>
                    <th>Valor</th>
                    <th>Fecha_efectiva</th>
                    <th>Estatus</th>
                    <th>Hash</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{$item->paciente->id}}</td>
                        <td>{{$item->organizacion->nombre}}</td>
                        <td>{{$item->encuentro_id}}</td>
                        <td>{{$item->categoria}}</td>
                        <td>{{$item->codigo}}</td>
                        <td>{{$item->valor}}</td>
                        <td>{{$item->fecha_efectiva}}</td>
                        <td>{{$item->estatus}}</td>
                        <td>{{$item->hash}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{$data->links('components.paginatorMaterialize')}}
    
@endsection