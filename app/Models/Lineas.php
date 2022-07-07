<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lineas extends Model
{
    use HasFactory;
    protected $guarded=['id','created_at','updated_at'];
    public function institucion(){
        return $this->belongsTo(Institucion::class, 'id_institucion');
    }

    public function administradorInstitucion(){
        return $this->belongsTo(AdministradorInstitucion::class, 'id_admin_institucion');
    }

    public function requisitos(){
        return $this->hasMany(Requisitos::class, 'id');
    }

    public function permiso_lineas(){
        return $this->hasMany(PermisoLinea::class, 'id');
    }

    public function duenios(){
        return $this->belongsToMany(Duenio::class, 'duenio_lineas');
    }
}
