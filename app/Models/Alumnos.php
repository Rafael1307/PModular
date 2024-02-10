<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Alumnos extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['nombre', 'apellido', 'correo', 'foto', 'id_grupo', 'id_sis'];

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

    public function desgloces()
    {
        return $this->hasMany(Desgloce_Calificaciones::class, 'id_alumno');
    }
    
    public function tutores()
    {
        return $this->belongsToMany(Tutores::class, 'alumnos__tutores', 'id_alumno', 'id_tutor');
    }
}
