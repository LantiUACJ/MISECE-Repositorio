<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Observacion extends Model
{
    use HasFactory;
    public function paciente(){
        return $this->hasOne(Paciente::class, "identifier", "paciente_id");
    }
}
