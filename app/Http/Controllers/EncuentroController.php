<?php

namespace App\Http\Controllers;

use App\Models\Encuentro;
use Illuminate\Http\Request;

class EncuentroController extends Controller
{
    public function index(){
        return view("encuentro.index", ["data"=>Encuentro::paginate(20)]);
    }
}
