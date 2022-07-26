<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChoferTarjeta extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];
    //relación de 1 a muchos
    public function choferTarjetaRecorridos(){
        return $this->hasMany(ChoferTarjetaRecorrido::class);
    }
    //relacion inversa de 1 a muchos
    public function chofer()
    {
        return $this->belongsTo(Chofer::class);
    }
    public function tarjeta()
    {
        return $this->belongsTo(Tarjeta::class);
    }
}
