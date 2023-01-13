@extends('layout')

@section('content')
    
    <p>Seleccione una organización para realizar la consulta</p>
    <select name="" id="element" onchange="selectElement()">
        <option value="">Seleccione un organización</option>
        @foreach ($data as $item)
            <option value="{{$item->id}}">{{$item->nombre}}</option>
        @endforeach
    </select>

    <a id="url" href="{{url('descargar/organizacion/')}}" target="_blank" class="btn">Descargar</a>


    <script>
        function selectElement(){
            base_url = "{{url('descargar/organizacion')}}/";
            $("#url").attr("href", base_url + $("#element").val());
        }
    </script>

@endsection