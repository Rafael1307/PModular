<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Calificaciones extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function alumno()
    {
        return $this->belongsTo(Alumnos::class, 'id_alumno');
    }

    public function materia()
    {
        return $this->belongsTo(Materias::class, 'id_materia');
    }

    public function trimestre()
    {
        return $this->belongsTo(Trimestres::class, 'id_trimestre');
    }
}
