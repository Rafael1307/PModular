<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Alumnos extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function calificaciones()
    {
        return $this->hasMany(Calificaciones::class, 'id_alumno');
    }
}
