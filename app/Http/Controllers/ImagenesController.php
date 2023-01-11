<?php

namespace App\Http\Controllers;

use App\Models\Imagenes;
use Illuminate\Http\Request;

class ImagenesController extends Controller
{
    public function index(){
        return view("imagenes.index", ["data"=>Imagenes::paginate(20)]);
    }
}
