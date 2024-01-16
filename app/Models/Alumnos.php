<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Alumnos extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function grupo()
    {
        return $this->belongsTo(Grupos::class, 'id_grupo');
    }

    public function sisGrupo()
    {
        return $this->belongsTo(Sis_Grupos::class, 'id_sis');
    }

    public function calificaciones()
    {
        return $this->hasMany(Calificaciones::class, 'id_alumno');
    }
}
