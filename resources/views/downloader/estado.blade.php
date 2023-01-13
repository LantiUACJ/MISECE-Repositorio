@extends('layout')

@section('content')
    <p>Seleccione un estado para realizar la consulta</p>
    <select name="" id="element" onchange="selectElement()">
        <option value="">Seleccione un estado</option>
        @foreach ($data as $item)
            <option value="{{$item->estado_dir}}">{{$item->estado_dir}}</option>
        @endforeach
    </select>

    <a id="url" href="{{url('descargar/estado/')}}" target="_blank" class="btn">Descargar</a>


    <script>
        function selectElement(){
            base_url = "{{url('descargar/estado')}}/";
            $("#url").attr("href", base_url + $("#element").val());
        }
    </script>
@endsection