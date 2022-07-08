<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChoferRequisitos extends Model
{
    use HasFactory;
    protected $guarded=['id','created_at','updated_at'];

    //relación inversa de 1 a muchos
    public function chofer(){
        return $this->belongsTo(Chofer::class,'id_chofer');
    }
    public function requisito(){
        return $this->belongsTo(Requisitos::class,'id_requisito');
    }
}
