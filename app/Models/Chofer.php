<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chofer extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];
    public function choferMicros()
    {
        return $this->hasMany(ChoferMicro::class, 'id');
    }
//relación de 1 a muchos
    public function choferRequisitos()
    {
        return $this->hasMany(ChoferRequisitos::class,'id');
    }

    public function choferTarjetas()
    {
        return $this->hasMany(ChoferTarjeta::class,'id');
    }
    //relación inversa de 1 a 1
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}
