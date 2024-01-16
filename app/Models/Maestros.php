<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Maestros extends Model
{
    use HasFactory;
    use SoftDeletes;

    
    public function user()
    {
        return $this->belongsTo(User::class, 'correo', 'email');
    }

    public function grupos()
    {
        return $this->hasMany(Grupos::class, 'id_asesor');
    }

}
