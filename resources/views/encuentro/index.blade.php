@extends('layout')

@section('content')
    <h1 class="mt-2">Encuentro</h1>
    <table class="responsive-table striped">
        <tr>
            <th>paciente_id</th>
            <th>organizacion_id</th>
            <th>hash</th>
            <th>estatus</th>
            <th>sistema</th>
            <th>codigo</th>
            <th>visual</th>
            <th>periodo_inicio</th>
            <th>periodo_fin</th>
        </tr>
        @foreach ($data as $item)
            <tr>
                <td>{{$item->paciente_id}}</td>
                <td>{{$item->organizacion_id}}</td>
                <td>{{$item->hash}}</td>
                <td>{{$item->estatus}}</td>
                <td>{{$item->sistema}}</td>
                <td>{{$item->codigo}}</td>
                <td>{{$item->visual}}</td>
                <td>{{$item->periodo_inicio}}</td>
                <td>{{$item->periodo_fin}}</td>
            </tr>
        @endforeach
    </table>{{$data->links('components.paginatorMaterialize')}}
@endsection