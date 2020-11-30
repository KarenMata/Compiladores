<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Validator;

class CentroCostosDetalle extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'centro_costos_detalle';
    public $timestamps = false;
    protected $fillable = [
        'id_cc',
        'id_factura',
        'id_partida',
//        'iva_ret',
//        'isr_ret',
//        'otro',
        'avance',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */


    public static function creaRegistro($data) {
            return CentroCostosDetalle::create([
                'id_cc' => $data['id'],
                'id_factura' => $data['factura'],
                'id_partida' => $data['partida'],
//                'iva_ret' => $data['ivaRet'],
//                'isr_ret' => $data['isrRet'],
//                'otro' => $data['otro'],
                'avance' => $data['avance'],
            ]);
    }

    public static function editaRegistro($data) {
        $registro= CentroCostosDetalle::find($data['id']);
        $registro->id_partida=$data['partida'];
//        $registro->iva_ret=$data['ivaRet'];
//        $registro->isr_ret=$data['isrRet'];
//        $registro->otro=$data['otro'];
        $registro->avance=$data['avance'];
        $registro->save();
        return true;
    }

    public function partida(){
        return $this->belongsTo('App\Models\CatalogoPartidas','id_partida','id')->first();
    }

}
