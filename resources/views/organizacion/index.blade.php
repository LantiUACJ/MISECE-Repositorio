@extends('layout')

@section('content')
    <h1 class="mt-2">Alergias</h1>
    <div style="overflow: auto; width: 100%">
        <table class="striped">
            <tr>
                <th>Nombre</th>
                <th>Estado</th>
                <th>Ciudad</th>
                <th>Código Postal</th>
            </tr>
            @foreach ($data as $item)
                <tr>
                    <td>{{$item->nombre}}</td>
                    <td>{{$item->estado_dir}}</td>
                    <td>{{$item->ciudad_dir}}</td>
                    <td>{{$item->cp_dir}}</td>
                </tr>
            @endforeach
        </table>
    </div>
    {{$data->links('components.paginatorMaterialize')}}
@endsection