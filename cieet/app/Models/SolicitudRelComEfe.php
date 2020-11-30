<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Validator;

class SolicitudRelComEfe extends Model
{ 
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'solicitud_RelComEfe';
    public $timestamps = false;
    protected $fillable = [
        'id_solicitud',
        'concepto',
        'monto',
        'rec_fac_na'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    
    public static function creaRegistro($data) {
            return SolicitudRelComEfe::create([
                'id_solicitud' => $data['id_solicitud'],
                'concepto' => $data['concepto'],
                'monto' => $data['monto'],
                'rec_fac_na' => $data['rec_fac_na']
            ]);
    }
    
    public static function editaRegistro($data) {
        $registro= Costos::where('id',$data['id'])->first();
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
