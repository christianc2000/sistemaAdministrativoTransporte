<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecorridoTarjeta extends Model
{
    use HasFactory;
    protected $guarded=['id','created_at','updated_at'];
    public function tarjeta(){
        return $this->belongsTo(Tarjeta::class, 'id_tarjeta');
    }
}
