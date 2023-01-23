@extends('layout')

@section('content')
    <h1 class="mt-2">Encuentro</h1>
    <div style="overflow: auto; width: 100%">
        <table class="striped">
            <tr>
                <th>#Paciente</th>
                <th>Organización</th>
                <th>Estatus</th>
                <th>Sistema</th>
                <th>Código</th>
                <th>Visual</th>
                <th>Inicio</th>
                <th>Fin</th>
                <th>Hash</th>
            </tr>
            @foreach ($data as $item)
                <tr>
                    <td>{{$item->paciente->id}}</td>
                    <td>{{$item->organizacion->nombre}}</td>
                    <td>{{$item->estatus}}</td>
                    <td>{{$item->sistema}}</td>
                    <td>{{$item->codigo}}</td>
                    <td>{{$item->visual}}</td>
                    <td>{{$item->periodo_inicio}}</td>
                    <td>{{$item->periodo_fin}}</td>
                    <td>{{$item->hash}}</td>
                </tr>
            @endforeach
        </table>
    </div>
    {{$data->links('components.paginatorMaterialize')}}
@endsection