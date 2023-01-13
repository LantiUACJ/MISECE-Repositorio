@extends('layout')

@section('content')
    <h1 class="mt-2">Diagnósticos</h1>
    <table class="responsive-table striped">
        <tr>
            <th>paciente_id</th>
            <th>organizacion_id</th>
            <th>encuentro_id</th>
            <th>codigo</th>
            <th>fecha_efectiva</th>
        </tr>
        @foreach ($data as $item)
            <tr>
                <td>{{$item->paciente_id}}</td>
                <td>{{$item->organizacion_id}}</td>
                <td>{{$item->encuentro_id}}</td>
                <td>{{$item->codigo}}</td>
                <td>{{$item->fecha_efectiva}}</td>
            </tr>
        @endforeach
    </table>{{$data->links('components.paginatorMaterialize')}}
@endsection