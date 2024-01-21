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
}
