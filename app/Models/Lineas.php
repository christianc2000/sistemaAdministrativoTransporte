<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lineas extends Model
{
    use HasFactory;
    protected $guarded=['id','created_at','updated_at'];
    public function institucion(){
        return $this->belongsTo(Institucion::class);
    }

    public function administradorInstitucion(){
        return $this->belongsTo(AdministradorInstitucion::class);
    }

    public function requisitos(){
        return $this->hasMany(Requisitos::class);
    }

    public function permisoLineas(){
        return $this->hasMany(PermisoLinea::class);
    }
    
    public function duenioLineas(){
        return $this->hasMany(DuenioLinea::class);
    }
}
