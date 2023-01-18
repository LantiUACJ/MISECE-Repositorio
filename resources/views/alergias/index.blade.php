@extends('layout')

@section('content')
    <h1 class="mt-2">Alergias</h1>
    <div style="overflow: auto; width: 100%">
        <table class="responsive-table striped">
            <tr>
                <th>paciente_id</th>
                <th>organizacion_id</th>
                <th>encuentro_id</th>
                <th>hash</th>
                <th>estatus</th>
                <th>tipo</th>
                <th>codigo</th>
                <th>criticidad</th>
                <th>fecha_de_registro</th>
            </tr>
            @foreach ($data as $item)
                <tr>
                    <td>{{$item->paciente->id}}</td>
                    <td>{{$item->organizacion_id}}</td>
                    <td>{{$item->encuentro_id}}</td>
                    <td>{{$item->hash}}</td>
                    <td>{{$item->estatus}}</td>
                    <td>{{$item->tipo}}</td>
                    <td>{{$item->codigo}}</td>
                    <td>{{$item->criticidad}}</td>
                    <td>{{$item->fecha_de_registro}}</td>
                </tr>
            @endforeach
        </table>
    </div>
    {{$data->links('components.paginatorMaterialize')}}
@endsection