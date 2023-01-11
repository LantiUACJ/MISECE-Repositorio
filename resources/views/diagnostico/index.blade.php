@extends('layout')

@section('content')
    <h1 class="mt-2">Diagnósticos</h1>
    <table class="table table-bordered">
        <tr>
            <th>codigo_sistema</th>
            <th>codigo</th>
            <th>codigo_visual</th>
            <th>codigo_texto</th>
            <th>estatus</th>
            <th>fecha_efectiva</th>
        </tr>
        @foreach ($data as $item)
            <tr>
                <td>{{$item->codigo_sistema}}</td>
                <td>{{$item->codigo}}</td>
                <td>{{$item->codigo_visual}}</td>
                <td>{{$item->codigo_texto}}</td>
                <td>{{$item->estatus}}</td>
                <td>{{$item->fecha_efectiva}}</td>
            </tr>
        @endforeach
    </table>{{$data->links('pagination::bootstrap-4')}}
@endsection