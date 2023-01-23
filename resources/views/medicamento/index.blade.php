@extends('layout')

@section('content')
    <h1 class="mt-2">Medicamentos</h1>
    <div style="overflow: auto; width: 100%">
        <table class="striped">
            <tr>
                <th>#Paciente</th>
                <th>Organización</th>
                <th>#Encuentro</th>
                <th>Dosis</th>
                <th>Estatus</th>
                <th>Motivo</th>
                <th>Medicamento</th>
                <th>Hash</th>
            </tr>
            @foreach ($data as $item)
                <tr>
                    <td>{{$item->paciente->id}}</td>
                    <td>{{$item->organizacion->nombre}}</td>
                    <td>{{$item->encuentro_id}}</td>
                    <td>{{$item->dosis_texto}}</td>
                    <td>{{$item->estatus}}</td>
                    <td>{{$item->intent}}</td>
                    <td>{{$item->medicamento}}</td>
                    <td>{{$item->hash}}</td>
                </tr>
            @endforeach
        </table>
    </div>
    {{$data->links('components.paginatorMaterialize')}}
@endsection