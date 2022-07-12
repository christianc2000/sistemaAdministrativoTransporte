<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DuenioLinea extends Model
{
    use HasFactory;
    protected $guarded=['id','created_at','updated_at'];

    public function duenio(){
      return $this->belongsTo(Duenio::class);
    }
    public function linea(){
        return $this->belongsTo(Lineas::class);
    }
}
