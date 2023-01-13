<?php

namespace App\Http\Controllers;

use App\Tools\CurlHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class SiteController extends Controller
{
    public function index(){
        return view("site.landing");
    }

    public function home(){
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

    public function login(){
        return view("site.login");
    }

    public function loginPost(Request $request){
        $tryData = $this->loginAttempts($request);
        if(!$tryData["status"]){
            return back()->withErrors([
                'error' => 'Intentos máximos alcanzados, tiempo de espera: ' . $tryData["time"] . " minutos.",
            ]);
        }
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect("/");
		}
		return back()->withErrors([
			'error' => 'Correo/Contraseña incorrecta',
		]);
    }

    public function logout(Request $request){
		Auth::logout();
		$request->session()->invalidate();
		$request->session()->regenerateToken();
		return redirect('/');
	}

    private function loginAttempts(Request $request){
        $waitTime = 15;
        /* Iniciar variables */
        $date = $request->session()->get('date', Carbon::now());
        $attempt = $request->session()->get('attempt', 0);
        $block = $request->session()->get('block', false);
        $blockTime = $request->session()->get('blockTime', Carbon::now());
        /* Time Calcs */
        if($block){
            $wait = $blockTime->diffInMinutes(Carbon::now());
            if($wait>=$waitTime) {
                $blockTime = Carbon::now();
                $block = false;
                $date = Carbon::now();
                $attempt = -1;
            }
            else{
                return ["status"=>false, "date"=>$date->format("H:i:s"), "attempt"=>$attempt, "block"=>$block, "blockTime"=>$blockTime->format("H:i:s"), "time"=>$waitTime-$wait];
            }
        }
        /* Reset */
        $minutes = $date->diffInMinutes(Carbon::now());
        if($minutes > 1 && !$block){
            $date = Carbon::now();
            $attempt = -1;
        }
        $attempt++;
        if($attempt >3){
            $block = true;
            $blockTime = \Carbon\Carbon::now();
        }
        /* Update session */
        $request->session()->put('date', $date);
        $request->session()->put('attempt', $attempt);
        $request->session()->put('block', $block);
        $request->session()->put('blockTime', $blockTime);
        return ["status"=>true, "date"=>$date->format("H:i:s"), "attempt"=>$attempt, "block"=>$block, "blockTime"=>$blockTime->format("H:i:s")];
    }

    public function administrar(){
        return view("site.administrar");
    }

    public function actualizar(){
        try{
            $helper = new CurlHelper(env("MISECE_URL") . "api/actualizar/repositorio",[]);
            $helper->postJWT();
        }
        catch(\Exception $ex){
            return redirect("administrar");
        }
        finally{
            return redirect("administrar");
        }
    }
}
