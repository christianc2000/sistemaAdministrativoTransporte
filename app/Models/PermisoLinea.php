<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermisoLinea extends Model
{
    use HasFactory;
    protected $guarded=['id','created_at','updated_at'];
    public function linea(){
        return $this->belongsTo(Linea::class);
    }

    public function duenio(){
        return $this->belongsTo(Duenio::class);
    }

    public function micros(){
        return $this->hasMany(Micros::class);
    }

    public function microActivo(){
        $micros=$this->hasMany(Micro::class);
        return $micros->where('fecha_baja',null);
    }
}
