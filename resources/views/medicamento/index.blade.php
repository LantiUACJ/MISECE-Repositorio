@extends('layout')

@section('content')
    <h1 class="mt-2">Medicamentos</h1>
    <div style="overflow: auto; width: 100%">
        <table class="responsive-table striped">
            <tr>
                <th>paciente_id</th>
                <th>organizacion_id</th>
                <th>encuentro_id</th>
                <th>hash</th>
                <th>dosis_texto</th>
                <th>estatus</th>
                <th>intent</th>
                <th>medicamento</th>
            </tr>
            @foreach ($data as $item)
                <tr>
                    <td>{{$item->paciente->id}}</td>
                    <td>{{$item->organizacion_id}}</td>
                    <td>{{$item->encuentro_id}}</td>
                    <td>{{$item->hash}}</td>
                    <td>{{$item->dosis_texto}}</td>
                    <td>{{$item->estatus}}</td>
                    <td>{{$item->intent}}</td>
                    <td>{{$item->medicamento}}</td>
                </tr>
            @endforeach
        </table>
    </div>
    {{$data->links('components.paginatorMaterialize')}}
@endsection