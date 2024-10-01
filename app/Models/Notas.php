<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notas extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['asunto','descripcion', 'id_alumno', 'id_maestro'];

    

   
    public function alumno()
    {
        return $this->belongsTo(Alumnos::class, 'id_alumno');
    }

    public function maestro()
    {
        return $this->belongsTo(Maestros::class, 'id_maestro');
    }
}


