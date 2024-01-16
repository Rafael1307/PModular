<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trimestres extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function ciclo()
    {
        return $this->belongsTo(Ciclos::class, 'id_ciclo');
    }

    public function desgloceCalificaciones()
    {
        return $this->hasMany(Desgloce_Calificaciones::class, 'id_trimestre');
    }

    public function calificaciones()
    {
        return $this->hasMany(Calificaciones::class, 'id_trimestre');
    }

    public function asistencias()
    {
        return $this->hasMany(Asistencias::class, 'id_trimestre');
    }
}
