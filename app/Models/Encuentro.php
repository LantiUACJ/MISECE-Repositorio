<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encuentro extends Model
{
    use HasFactory;

    public function observaciones(){
        return $this->hasMany(Observacion::class, "encuentro_id", "id");
    }
    public function alergias(){
        return $this->hasMany(Alergia::class, "encuentro_id", "id");
    }
    public function medicamentos(){
        return $this->hasMany(MedicamentoAdministracion::class, "encuentro_id", "id");
    }
    public function diagnosticos(){
        return $this->hasMany(Diagnostico::class, "encuentro_id", "id");
    }
}
