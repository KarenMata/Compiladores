<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Validator;

class SolicitudComitiva extends Model
{ 
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'solicitud_comitiva';
    public $timestamps = false;
    protected $fillable = [
        'id_solicitud',
        'nombre',
        'actividad',
        'as_si',
        'as_no',
        'objetivo',
        'observaciones'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    
    public static function creaRegistro($data) {
            return SolicitudComitiva::create([
                'id_solicitud' => $data['id_solicitud'],
                'nombre' => $data['nombre'],
                'actividad' => $data['actividad'],
                'as_si' => $data['as_si'],
                'as_no' => $data['as_no'],
                'objetivo' => $data['objetivo'],
                'observaciones' => $data['observaciones']
            ]);
    }
    
    public static function editaRegistro($data) {
        $registro= SolicitudComitiva::where('id',$data['id'])->first();
        $registro->clave=$data['clave'];
        $registro->proyecto=$data['proyecto'];
        $registro->responsable=$data['responsable'];
        $registro->costo_directo=$data['costo_directo'];
        $registro->hospedaje=$data['hospedaje'];
        $registro->transporte=$data['transporte'];
        $registro->total_directo=$data['total_directo'];
        $registro->adquisiciones=$data['adquisiciones'];
        $registro->total_estado=$data['total_estado'];
        $registro->total=$data['total'];
        $registro->save();
        return true;
    }
    
    
    
    
}
