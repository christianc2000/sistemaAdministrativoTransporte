<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarjeta extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];
    public function recorridoTarjetas()
    {
        return $this->hasMany(RecorridoTarjeta::class, 'id');
    }

    public function choferTarjetas()
    {
        return $this->hasMany(ChoferTarjeta::class,'id');
    }
    
}
