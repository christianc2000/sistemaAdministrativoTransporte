<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdministradorInstitucion extends Model
{
    use HasFactory;
    public function institucion(){
        return $this->belongsTo(Institucion::class, 'id_institucion');
    }

    public function lineas(){
        return $this->hasMany(Lineas::class, 'id');
    }
}
