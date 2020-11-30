<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Validator;

class Depositos extends Model
{ 
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'depositos';
    public $timestamps = false;
    protected $fillable = [
        'anio', 
        'mes', 
        'dia',
        'total',
        'concepto',
        'id_factura',
        'fecha'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    
    public static function creaRegistro($data) {
            return Depositos::create([
                'anio' => $data['anio'],         
                'mes' => $data['mes'],                 
                'dia' => $data['dia'], 
                'total' => $data['total'], 
                'concepto' => $data['concepto'],    
                'id_factura' => $data['id_factura'],
                'fecha' => $data['fecha']  
            ]);
    }
    
    public static function editaRegistro($data) {
        $registro= Depositos::find($data['id']);
        $registro->anio=$data['anio'];
        $registro->mes=$data['mes'];
        $registro->dia=$data['dia'];
        $registro->total=$data['total'];
        $registro->concepto=$data['concepto'];
        $registro->id_factura=$data['id_factura'];
        $registro->fecha=$data['fecha'];
        $registro->save();
        return true;
    }
    
    public function mes(){
        $meses = [
            '1'=>'Enero',
            '2'=>'Febreo',
            '3'=>'Marzo',
            '4'=>'Abril',
            '5'=>'Mayo',
            '6'=>'Junio',
            '7'=>'Julio',
            '8'=>'Agosto',
            '9'=>'Septiembre',
            '10'=>'Octubre',
            '11'=>'Noviembre',
            '12'=>'Diciembre',
            ];
        return $meses[$this->attributes['mes']];
    }
    
    
}
