<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Validator;

class SolicitudVG extends Model
{ 
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'solicitudVG';
    public $timestamps = false;
    protected $fillable = [
        'solicitante',
        'fechaSol',
        'fechaSal',
        'proyecto',
        'actividades',
        'objetivo',
        'destino',
        'gasolina',
        'alimentos',
        'hospedaje',
        'otroSol',
        'tarjEden',
        'tarjDeb',
        'efectivoER',
        'otroEnt',
        'vehiculo',
        'destinoME',
        'kmIni',
        'kmFin',
        'recibe',
        'entrega',
        'hrApSal',
        'hrApLle',
        'hrReSal',
        'hrReLle',
        'fechaLle',
        'edenred',
        'debito',
        'miEden',
        'mfEden',
        'miDeb',
        'mfDeb',
        'efectivo',
        'otroMed',
        'responsable',
        'observaciones'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    
    public static function creaRegistro($data) {
            return SolicitudVG::create([
                'solicitante' => $data['solicitante'],
                'fechaSol' => $data['fechaSol'],
                'fechaSal' => $data['fechaSal'],
                'proyecto' => $data['proyecto'],
                'actividades' => $data['actividades'],
                'objetivo' => $data['objetivo'],
                'destino' => $data['destino'],
                'gasolina' => $data['gasolina'],
                'alimentos' => $data['alimentos'],
                'hospedaje' => $data['hospedaje'],
                'otroSol' => $data['otroSol'],
                'tarjEden' => $data['tarjEden'],
                'tarjDeb' => $data['tarjDeb'],
                'efectivoER' => $data['efectivoER'],
                'otroEnt' => $data['otroEnt'],
                'vehiculo' => $data['vehiculo'],
                'destinoME' => $data['destinoME'],
                'kmIni' => $data['kmIni'],
                'kmFin' => $data['kmFin'],
                'recibe' => $data['recibe'],
                'entrega' => $data['entrega'],
                'hrApSal' => $data['hrApSal'],
                'hrApLle' => $data['hrApLle'],
                'hrReSal' => $data['hrReSal'],
                'hrReLle' => $data['hrReLle'],
                'fechaLle' => $data['fechaLle'],
                'edenred' => $data['edenred'],
                'debito' => $data['debito'],
                'miEden' => $data['miEden'],
                'mfEden' => $data['mfEden'],
                'miDeb' => $data['miDeb'],
                'mfDeb' => $data['mfDeb'],
                'efectivo' => $data['efectivo'],
                'otroMed' => $data['otroMed'],
                'responsable' => $data['responsable'],
                'observaciones' => $data['observaciones']
            ]);
    }
    
    public static function editaRegistro($data) {
        $registro= SolicitudVG::where('id',$data['id'])->first();
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
