<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Micros extends Model
{
    use HasFactory;
    protected $guarded=['id','created_at','updated_at'];
    public function permisoLinea(){
        return $this->belongsTo(PermisoLinea::class, 'id_permiso_linea');
    }

    public function choferMicros()
    {
        return $this->hasMany(ChoferMicro::class, 'id');
    }
}
