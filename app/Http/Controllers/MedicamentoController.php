<?php

namespace App\Http\Controllers;

use App\Models\MedicamentoAdministracion;
use Illuminate\Http\Request;

class MedicamentoController extends Controller
{
    public function index(){
        return view("medicamento.index", ["data"=>MedicamentoAdministracion::paginate(20)]);
    }
}
