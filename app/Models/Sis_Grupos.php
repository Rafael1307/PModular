<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sis_Grupos extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];
    protected $table = 'sis_grupos';

    protected $fillable = ['grupo', 'id_ciclo'];

    // Relación con ciclo (muchos a uno)
    public function ciclo()
    {
        return $this->belongsTo(Ciclos::class, 'id_ciclo');
    }

    public function alumnos()
    {
        return $this->hasMany(Alumnos::class, 'id_sis');
    }
}
