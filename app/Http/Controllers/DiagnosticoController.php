<?php

namespace App\Http\Controllers;

use App\Models\Diagnostico;
use Illuminate\Http\Request;

class DiagnosticoController extends Controller
{
    public function index(){
        return view("diagnostico.index", ["data"=>Diagnostico::paginate(20)]);
    }
}
