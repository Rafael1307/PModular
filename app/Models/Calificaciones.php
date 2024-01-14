<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calificaciones extends Model
{
    use HasFactory;

    public function alumno()
    {
        return $this->belongsTo(Alumnos::class, 'id_alumno');
    }

    public function materia()
    {
        return $this->belongsTo(Materias::class, 'id_materia');
    }
}