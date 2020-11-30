<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Validator;

class Mensajes extends Model
{ 
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'mensajes';
    public $timestamps = false;
    protected $fillable = [
        'nombre', 
        'correo', 
        'mensaje',
        'fecha',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    
    public static function creaRegistro($data) {
            return Mensajes::create([
                'nombre' => $data['nombre'],         
                'correo' => $data['correo'],                 
                'mensaje' => $data['mensaje'], 
                'fecha' => date("Y-m-d H:i:s",strtotime ( '-6 hour' , strtotime ( date("Y-m-d H:i:s")) ))
            ]);
    }
    
    
}
