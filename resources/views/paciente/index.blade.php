@extends('layout')

@section('content')
    <h1 class="mt-2">Pacientes</h1>
    <div style="overflow: auto; width: 100%">
        <table class="responsive-table striped">
            <tr>
                <th>identifier</th>
                <th>fecha_nac</th>
                <th>estado_nac</th>
                <th>nacionalidad</th>
                <th>sexo</th>
                <th>etnia</th>
                <th>genero</th>
                <th>tipo_dir</th>
                <th>estado_dir</th>
                <th>ciudad_dir</th>
                <th>cp_dir</th>
            </tr>
            @foreach ($data as $item)
                <tr>
                    <td>{{$item->identifier}}</td>
                    <td>{{$item->fecha_nac}}</td>
                    <td>{{$item->estado_nac}}</td>
                    <td>{{$item->nacionalidad}}</td>
                    <td>{{$item->sexo}}</td>
                    <td>{{$item->etnia}}</td>
                    <td>{{$item->genero}}</td>
                    <td>{{$item->tipo_dir}}</td>
                    <td>{{$item->estado_dir}}</td>
                    <td>{{$item->ciudad_dir}}</td>
                    <td>{{$item->cp_dir}}</td>
                </tr>
            @endforeach
        </table>
    </div>
    {{$data->links('components.paginatorMaterialize')}}
@endsection