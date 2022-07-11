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
        return $this->hasMany(ChoferMicro::class);
    }
//relación de 1 a muchos
    public function choferRequisitos()
    {
        return $this->hasMany(ChoferRequisitos::class);
    }

    public function choferTarjetas()
    {
        return $this->hasMany(ChoferTarjeta::class);
    }
    //relación inversa de 1 a 1
    public function user()
    {
        return $this->belongsTo(User::class);
    }

   

    
}
