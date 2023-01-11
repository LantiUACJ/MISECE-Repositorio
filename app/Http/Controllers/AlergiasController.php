<?php

namespace App\Http\Controllers;

use App\Models\Alergia;
use Illuminate\Http\Request;

class AlergiasController extends Controller
{
    public function index(){
        return view("alergias.index", ["data"=>Alergia::paginate(20)]);
    }
}
