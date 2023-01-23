@extends('layout')

@section('content')
    <h1 class="mt-2">Imágenes</h1>
    <div style="overflow: auto; width: 100%">
        <table class="striped">
            <tr>
                <th>Estatus</th>
                <th>Id sistema urn</th>
                <th>Id valor urnoid</th>
                <th>Código texto</th>
                <th>Fecha</th>
            </tr>
            @foreach ($data as $item)
                <tr>
                    <th>{{$item->estatus}}</th>
                    <th>{{$item->id_sistema_urn}}</th>
                    <th>{{$item->id_valor_urnoid}}</th>
                    <th>{{$item->codigo_texto}}</th>
                    <th>{{$item->fecha_inicio}}</th>
                </tr>
            @endforeach
        </table>
    </div>
    {{$data->links('components.paginatorMaterialize')}}
@endsection