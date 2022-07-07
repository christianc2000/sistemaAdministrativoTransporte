<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded=['id','created_at','updated_at'];
    //relación de herencia de uno a uno
    public function chofer(){
       return $this->hasOne(Chofer::class);
    }
    public function administrador(){
        return $this->hasOne(Administrador::class);
     }
     public function administradorInstitucion(){
        return $this->hasOne(AdministradorInstitucion::class);
     }
    

}
