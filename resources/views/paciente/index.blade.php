@extends('layout')

@section('content')
    <h1 class="mt-2">Pacientes</h1>
    <table class="table table-bordered">
        <tr>
            <th>identifier</th>
            <th>fecha_nac</th>
            <th>estado_nac</th>
            <th>nacionalidad</th>
            <th>sexo</th>
            <th>etnia</th>
            <th>genero</th>
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
            </tr>
        @endforeach
    </table>{{$data->links('pagination::bootstrap-4')}}
@endsection