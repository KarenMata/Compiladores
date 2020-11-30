<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{ 
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'usuarios';
    public $timestamps = false;
    protected $fillable = [
        'nombre',
        'correo',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function nombreCompleto () {
        return $this->attributes['nombre']." ".$this->attributes['ap_paterno']." ".$this->attributes['ap_materno'];
    }
    
}
