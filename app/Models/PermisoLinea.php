<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermisoLinea extends Model
{
    use HasFactory;
    public function linea(){
        return $this->belongsTo(Linea::class, 'id_linea');
    }

    public function duenio(){
        return $this->belongsTo(Duenio::class, 'id_duenio');
    }

    public function micros(){
        return $this->hasMany(Micros::class, 'id');
    }
}
