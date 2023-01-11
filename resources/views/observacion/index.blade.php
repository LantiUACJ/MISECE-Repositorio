@extends('layout')

@section('content')
    <h1 class="mt-2">Observación</h1>
    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th>codigo_sistema</th>
                <th>codigo_visual</th>
                <th>codigo</th>
                <th>codigo_texto</th>
                <th>cantidad_unidad</th>
                <th>cantidad_valor</th>
                <th>cantidad_codigo</th>
                <th>cantidad_sistema</th>
                <th>cantidad_texto</th>
                <th>fecha_efectiva</th>
                <th>estatus</th>
                <th>tipo_valor</th>
                <th>cantidad_visual</th>
            </tr>
            @foreach ($data as $item)
                <tr>
                    <td>{{$item->codigo_sistema}}</td>
                    <td>{{$item->codigo_visual}}</td>
                    <td>{{$item->codigo}}</td>
                    <td>{{$item->codigo_texto}}</td>
                    <td>{{$item->cantidad_unidad}}</td>
                    <td>{{$item->cantidad_valor}}</td>
                    <td>{{$item->cantidad_codigo}}</td>
                    <td>{{$item->cantidad_sistema}}</td>
                    <td>{{$item->cantidad_texto}}</td>
                    <td>{{$item->fecha_efectiva}}</td>
                    <td>{{$item->estatus}}</td>
                    <td>{{$item->tipo_valor}}</td>
                    <td>{{$item->cantidad_visual}}</td>
                </tr>
            @endforeach
        </table>
    </div>
    {{$data->links('pagination::bootstrap-4')}}
    
@endsection