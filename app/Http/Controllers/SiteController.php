<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(){
        return view("site.index");
    }

    public function consultar(){
        return view("site.consultar",[
            "alergias"=>\App\Models\Alergia::count(),
            "diagnostico"=>\App\Models\Diagnostico::count(),
            "encuentro"=>\App\Models\Encuentro::count(),
            "imagenes"=>\App\Models\Imagenes::count(),
            "medicamento"=>\App\Models\MedicamentoAdministracion::count(),
            "observacion"=>\App\Models\Observacion::count(),
            "organizacion"=>\App\Models\Organizacion::count(),
            "paciente"=>\App\Models\Paciente::count(),
        ]);
    }
}
