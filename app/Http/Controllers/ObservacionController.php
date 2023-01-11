<?php

namespace App\Http\Controllers;

use App\Models\Observacion;
use Illuminate\Http\Request;

class ObservacionController extends Controller
{
    public function index(){
        return view("observacion.index", ["data"=>Observacion::paginate(20)]);
    }
}
