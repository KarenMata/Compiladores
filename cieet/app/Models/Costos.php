<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Validator;

class Costos extends Model
{ 
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'costos';
    public $timestamps = false;
    protected $fillable = [
        'clave', 
        'proyecto', 
        'responsable',
        'costo_directo',
        'hospedaje',
        'transporte',
        'total_directo',
        'adquisiciones',
        'total_estado',
        'total'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    
    public static function creaRegistro($data) {
            return Costos::create([
                'clave' => $data['clave'],         
                'proyecto' => $data['proyecto'],                 
                'responsable' => $data['responsable'], 
                'costo_directo' => $data['costo_directo'], 
                'hospedaje' => $data['hospedaje'],  
                'transporte' => $data['transporte'],         
                'total_directo' => $data['total_directo'],                 
                'adquisiciones' => $data['adquisiciones'],   
                'total_estado' => $data['total_estado'],    
                'total' => $data['total']
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
