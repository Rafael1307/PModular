<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grupos extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function maestro()
    {
        return $this->belongsTo(Maestros::class, 'id_asesor');
    }

    public function materias()
    {
        return $this->hasMany(Materias::class, 'id_grupo');
    }
}
