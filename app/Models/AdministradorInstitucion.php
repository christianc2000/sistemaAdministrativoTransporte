<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdministradorInstitucion extends Model
{
    use HasFactory;
    protected $guarded = ['created_at', 'updated_at'];
    public function institucion()
    {
        return $this->belongsTo(Institucion::class, 'id_institucion');
    }

    public function lineas()
    {
        return $this->hasMany(Linea::class, 'id');
    }
    //relación inversa de 1 a 1
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
