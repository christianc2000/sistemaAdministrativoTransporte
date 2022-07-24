<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Duenio extends Model
{
    use HasFactory;
    protected $guarded=['id','created_at','updated_at'];
    public function permisoLineas(){
        return $this->hasMany(PermisoLinea::class);
    }
    public function duenioLineas(){
        return $this->hasMany(DuenioLinea::class);
    }
}
