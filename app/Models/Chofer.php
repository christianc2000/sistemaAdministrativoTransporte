<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chofer extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];
    public function micros()
    {
        return $this->belongsToMany(Micros::class, 'chofer_micros');
    }

    public function requisitos()
    {
        return $this->belongsToMany(Requisitos::class, 'chofer_requisitos');
    }

    public function tarjetas()
    {
        return $this->belongsToMany(Tarjeta::class, 'permiso_tarjetas');
    }
    //relación inversa de 1 a 1
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
