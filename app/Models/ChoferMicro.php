<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChoferMicro extends Model
{
    use HasFactory;
    protected $guarded=['id','created_at','updated_at'];
    //relación inversa de 1 a muchos
    public function chofer(){
        return $this->belongsTo(Chofer::class);
    }
    public function micro(){
        return $this->belongsTo(Micro::class);
    }
    //relación de 1 a mucho
    public function problemas(){
        return $this->hasMany(Problema::class);
    }
}
