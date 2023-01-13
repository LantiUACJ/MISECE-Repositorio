@extends('layout')

@section('content')
    <h1 class="mt-2">Observación</h1>
    <div style="overflow: auto; width: 100%">
        <table class="responsive-table">
            <thead>
                <tr>
                    <th>paciente_id</th>
                    <th>organizacion_id</th>
                    <th>encuentro_id</th>
                    <th>hash</th>
                    <th>categoria</th>
                    <th>codigo</th>
                    <th>valor</th>
                    <th>fecha_efectiva</th>
                    <th>estatus</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{$item->paciente_id}}</td>
                        <td>{{$item->organizacion_id}}</td>
                        <td>{{$item->encuentro_id}}</td>
                        <td>{{$item->hash}}</td>
                        <td>{{$item->categoria}}</td>
                        <td>{{$item->codigo}}</td>
                        <td>{{$item->valor}}</td>
                        <td>{{$item->fecha_efectiva}}</td>
                        <td>{{$item->estatus}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{$data->links('pagination::bootstrap-4')}}
    
@endsection