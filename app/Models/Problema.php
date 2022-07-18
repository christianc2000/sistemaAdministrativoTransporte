<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Problema extends Model
{
    use HasFactory;
    protected $guarded=['id','created_at','updated_at'];

    //relacion de 1 a muchos inversa
    public function choferMicro(){
        return $this->belongsTo(ChoferMicro::class);
    }
}
