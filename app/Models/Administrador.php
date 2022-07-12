<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    use HasFactory;
    protected $guarded = ['id','created_at', 'updated_at'];
    public function institucions()
    {
        return $this->hasMany(Institucion::class);
    }
    //relación inversa de 1 a 1
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
