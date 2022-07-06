<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requisitos extends Model
{
    use HasFactory;
    public function linea(){
        return $this->belongsTo(Lineas::class, 'id_linea');
    }

    public function chofers(){
        return $this->belongsToMany(Chofer::class, 'chofer_requisitos');
    }
}
