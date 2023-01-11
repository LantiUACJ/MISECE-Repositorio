<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function index(){
        return view("paciente.index", ["data"=>Paciente::paginate(20)]);
    }
}
