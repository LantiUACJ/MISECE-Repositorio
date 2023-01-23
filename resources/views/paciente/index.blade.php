@extends('layout')

@section('content')
    <h1 class="mt-2">Pacientes</h1>
    <div style="overflow: auto; width: 100%">
        <table class="striped">
            <tr>
                <th>NO.</th>
                <th>Fecha de nacimiento</th>
                <th>Estado de nacimiento</th>
                <th>Nacionalidad</th>
                <th>Sexo</th>
                <th>Etnia</th>
                <th>Genero</th>
                <th>Estado</th>
                <th>Ciudad</th>
                <th>CP</th>
            </tr>
            @foreach ($data as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->fecha_nac}}</td>
                    <td>{{$item->estado_nac}}</td>
                    <td>{{$item->nacionalidad}}</td>
                    <td>{{$item->sexo}}</td>
                    <td>{{$item->etnia}}</td>
                    <td>{{$item->genero}}</td>
                    <td>{{$item->estado_dir}}</td>
                    <td>{{$item->ciudad_dir}}</td>
                    <td>{{$item->cp_dir}}</td>
                </tr>
            @endforeach
        </table>
    </div>
    {{$data->links('components.paginatorMaterialize')}}
@endsection