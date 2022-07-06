<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Micros extends Model
{
    use HasFactory;
    public function permiso_linea(){
        return $this->belongsTo(PermisoLinea::class, 'id_permiso_linea');
    }

    public function chofers(){
        return $this->belongsToMany(Chofer::class, 'chofer_micros');
    }
}
