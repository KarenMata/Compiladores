<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Validator;

class CatalogoCC extends Model {

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'catalogo_proyectos';
    public $timestamps = false;
    protected $fillable = [
        'nombre',
        'responsable',
        'num',
        'fecha_ini',
        'estatus',
        'fecha_fin',
        'contratante',
        'contratado',
        'avance',
        'id_factura',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public static function creaRegistro($data) {
        return CatalogoCC::create([
                    'num' => $data['num'],
                    'nombre' => $data['nombre'],
                    'responsable' => $data['responsable'],
                    'fecha_ini' => $data['fecha_ini'],
                    'estatus' => $data['estatus'],
                    'fecha_fin' => $data['fecha_fin'],
                    'contratante' => $data['contratante'],
                    'contratado' => $data['contratado'],
        ]);
    }

    public static function editaRegistro($data) {
        $registro = CatalogoCC::where('id', $data['id'])->first();
        $registro->num = $data['num'];
        $registro->nombre = $data['nombre'];
        $registro->responsable = $data['responsable'];
        $registro->fecha_ini = $data['fecha_ini'];
        $registro->estatus = $data['estatus'];
        $registro->fecha_fin = $data['fecha_fin'];
        $registro->contratante = $data['contratante'];
        $registro->contratado = $data['contratado'];
        $registro->avance = $data['avance'];
        $registro->id_factura = $data['id_factura'];
        $registro->save();
        return true;
    }

    public function estatus() {
        $estatus = [
            '1' => 'Proceso',
            '2' => 'Terminado',
            '3' => 'Pausado',
        ];
        return $estatus[$this->attributes['estatus']];
    }

    public function factura() {
        return $this->belongsTo('App\Models\FacturasRecibidas','id_factura','id')->first();
    }

    public function avance() {
        $ccs = CentroCostosDetalle::where('id_cc', $this->attributes['id'])->get();
        $av = 0;
        foreach ($ccs as $cc) {
            $av += $cc->avance;
        }
        return $av;
    }
    
    public function responsable(){
        return $this->belongsTo('App\Models\User','responsable','id')->first();
    }

}
