<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sis_Grupos extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function ciclo()
    {
        return $this->belongsTo(Ciclos::class, 'id_ciclo');
    }

    public function alumnos()
    {
        return $this->hasMany(Alumnos::class, 'id_sis');
    }
}
