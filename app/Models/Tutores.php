<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tutores extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['nombre', 'apellido', 'correo', 'telefono'];


    public function alumnos()
    {
        return $this->belongsToMany(Alumnos::class, 'alumnos__tutores', 'id_tutor', 'id_alumno');
    }
}
