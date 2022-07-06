<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Duenio extends Model
{
    use HasFactory;
    public function permiso_lineas(){
        return $this->hasMany(PermisoLinea::class, 'id');
    }
    public function lineas(){
        return $this->belongsToMany(Lineas::class, 'duenio_lineas');
    }
}
