<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ciclos extends Model
{
    protected $fillable = ['ciclo'];

    use HasFactory;
    use SoftDeletes;

    public function trimestres()
    {
        return $this->hasMany(Trimestres::class, 'id_ciclo');
    }

    public function grupos()
    {
        return $this->hasMany(Grupos::class, 'id_ciclo');
    }

    public function sis_grupos()
    {
        return $this->hasMany(Sis_Grupos::class, 'id_ciclo');
    }
}
