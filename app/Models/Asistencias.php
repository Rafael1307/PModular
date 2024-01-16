<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asistencias extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function alumno()
    {
        return $this->belongsTo(Alumnos::class, 'id_alumno');
    }

    public function trimestre()
    {
        return $this->belongsTo(Trimestres::class, 'id_trimestre');
    }
}
