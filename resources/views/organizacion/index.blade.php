@extends('layout')

@section('content')
    <h1 class="mt-2">Alergias</h1>
    <div style="overflow: auto; width: 100%">
        <table class="responsive-table striped">
            <tr>
                <th>nombre</th>
                <th>estado_dir</th>
                <th>ciudad_dir</th>
                <th>cp_dir</th>
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