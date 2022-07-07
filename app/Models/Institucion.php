<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institucion extends Model
{
    use HasFactory;
    protected $guarded=['id','created_at','updated_at'];
    public function administrador(){
        return $this->belongsTo(Administrador::class, 'id_administrador');
    }

    public function administradorInstitucions(){
        return $this->hasMany(AdministradorInstitucion::class, 'id');
    }

    public function lineas(){
        return $this->hasMany(Lineas::class, 'id');
    }
}
