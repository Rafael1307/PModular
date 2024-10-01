<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Maestros extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['nombre', 'apellido', 'foto', 'telefono', 'correo'];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'correo', 'email');
    }

    public function grupos()
    {
        return $this->hasMany(Grupos::class, 'id_asesor');
    }

    public function materias()
    {
        return $this->hasMany(Materias::class, 'id_maestro');
    }

    

    // En el modelo Maestro
    public function notas()
    {
        return $this->hasMany(Notas::class, 'id_maestro');
    }

}
