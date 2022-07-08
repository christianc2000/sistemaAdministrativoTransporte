<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requisitos extends Model
{
    use HasFactory;
    protected $guarded=['id','created_at','updated_at'];
    public function linea(){
        return $this->belongsTo(Lineas::class, 'id_linea');
    }

    public function choferRequisitos(){
        return $this->hasMany(ChoferRequisitos::class, 'id');
    }
}
