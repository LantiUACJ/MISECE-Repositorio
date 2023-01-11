<?php

namespace App\Http\Controllers;

use App\Models\Organizacion;
use Illuminate\Http\Request;

class OrganizacionController extends Controller
{
    public function index(){
        return view("organizacion.index", ["data"=>Organizacion::paginate(20)]);
    }
}
