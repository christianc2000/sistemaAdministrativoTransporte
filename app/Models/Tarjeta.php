<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarjeta extends Model
{
    use HasFactory;
    public function recorridos(){
        return $this->hasMany(RecorridoTarjeta::class, 'id');
    }

    public function chofers(){
        return $this->belongsToMany(Chofer::class, 'permiso_tarjetas');
    }
}
