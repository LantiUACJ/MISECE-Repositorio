@extends('layout')

@section('content')
    <h1 class="mt-2">Alergias</h1>
    <table class="table table-bordered">
        <tr>
            <th>hash</th>
            <th>criticidad</th>
            <th>codigo_sistema</th>
            <th>codigo</th>
            <th>codigo_visual</th>
            <th>texto</th>
            <th>estatus</th>
            <th>fecha_de_registro</th>
        </tr>
        @foreach ($data as $item)
            <tr>
                <td>{{$item->hash}}</td>
                <td>{{$item->criticidad}}</td>
                <td>{{$item->codigo_sistema}}</td>
                <td>{{$item->codigo}}</td>
                <td>{{$item->codigo_visual}}</td>
                <td>{{$item->texto}}</td>
                <td>{{$item->estatus}}</td>
                <td>{{$item->fecha_de_registro}}</td>
            </tr>
        @endforeach
    </table>{{$data->links('pagination::bootstrap-4')}}
@endsection