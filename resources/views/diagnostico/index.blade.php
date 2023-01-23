@extends('layout')

@section('content')
    <h1 class="mt-2">Diagnósticos</h1>
    <div style="overflow: auto; width: 100%">
        <table class="striped">
            <tr>
                <th># Paciente</th>
                <th>Organización</th>
                <th># Encuentro</th>
                <th>Código</th>
                <th>Fecha</th>
            </tr>
            @foreach ($data as $item)
                <tr>
                    <td>{{$item->paciente->id}}</td>
                    <td>{{$item->organizacion->nombre}}</td>
                    <td>{{$item->encuentro_id}}</td>
                    <td>{{$item->codigo}}</td>
                    <td>{{$item->fecha_efectiva}}</td>
                </tr>
            @endforeach
        </table>
    </div>
    {{$data->links('components.paginatorMaterialize')}}
@endsection