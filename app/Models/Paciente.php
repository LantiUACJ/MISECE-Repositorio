<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    public function encuentros(){
        return $this->hasMany(Encuentro::class, "paciente_id", "identifier");
    }

}
