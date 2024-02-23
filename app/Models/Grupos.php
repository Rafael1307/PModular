<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grupos extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['grupo', 'grado', 'turno', 'id_asesor', 'id_ciclo'];

    // Relación con maestro (muchos a uno)
    public function asesor()
    {
        return $this->belongsTo(Maestros::class, 'id_asesor');
    }

    // Relación con ciclo (muchos a uno)
    public function ciclo()
    {
        return $this->belongsTo(Ciclos::class, 'id_ciclo');
    }

    // Relación con alumnos (uno a muchos)
    public function alumnos()
    {
        return $this->hasMany(Alumnos::class, 'id_grupo');
    }

    public function materias()
    {
        return $this->hasMany(Materias::class, 'id_grupo');
    }
}
