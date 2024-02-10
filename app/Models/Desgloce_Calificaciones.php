<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Desgloce_Calificaciones extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];
    protected $table = 'desgloce__calificaciones';

    protected $fillable = [
        'actividades',
        'proyecto',
        'desempeno',
        'total',
        'id_alumno',
        'id_materia',
        'id_trimestre',
    ];

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
