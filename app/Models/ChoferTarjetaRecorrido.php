<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChoferTarjetaRecorrido extends Model
{
    use HasFactory;
    protected $guarded=['id','created_at','updated_at'];

    //relación inversa de 1 a mucho
    public function recorridoTarjeta(){
        return $this->belongsTo(RecorridoTarjeta::class);
    }

    public function choferTarjeta(){
        return $this->belongsTo(ChoferTarjeta::class);
    }
}
