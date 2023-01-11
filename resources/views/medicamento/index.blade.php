@extends('layout')

@section('content')
    <h1 class="mt-2">Medicamentos</h1>
    <table class="table table-bordered">
        <tr>
            <th>estatus</th>
            <th>id_sistema_urn</th>
            <th>id_valor_urnoid</th>
            <th>codigo_texto</th>
            <th>fecha_inicio</th>
        </tr>
        @foreach ($data as $item)
            <tr>
                <td>{{$item->estatus}}</td>
                <td>{{$item->id_sistema_urn}}</td>
                <td>{{$item->id_valor_urnoid}}</td>
                <td>{{$item->codigo_texto}}</td>
                <td>{{$item->fecha_inicio}}</td>
            </tr>
        @endforeach
    </table>{{$data->links('pagination::bootstrap-4')}}
@endsection