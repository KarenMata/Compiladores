<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Validator;

class FacturasEmitidas extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'facturas_emitidas';
    public $timestamps = false;
    protected $fillable = [
        'factura',
        'fecha',
        'rfc',
        'nombre',
        'concepto',
        'forma_pago',
        'modo_pago',
        'estatus',
        'subtotal',
        'iva',
        'total',
        'mov_id',
        'archivo',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */


    public static function creaRegistro($data) {
            return FacturasEmitidas::create([
                'factura' => $data['factura'],
                'fecha' => $data['fecha'],
                'rfc' => $data['rfc'],
                'nombre' => $data['nombre'],
                'concepto' => $data['concepto'],
                'forma_pago' => $data['forma_pago'],
                'modo_pago' => $data['modo_pago'],
                'estatus' => $data['estatus'],
                'subtotal' => $data['subtotal'],
                'iva' => $data['iva'],
                'total' => $data['total'],
                'archivo' => $data['archivo'],
            ]);
    }

    public static function editaRegistro($data) {
        $registro= FacturasEmitidas::find($data['id']);
        $registro->factura=$data['factura'];
        $registro->fecha=$data['fecha'];
        $registro->rfc=$data['rfc'];
        $registro->nombre=$data['nombre'];
        $registro->concepto=$data['concepto'];
        $registro->forma_pago=$data['forma_pago'];
        $registro->modo_pago=$data['modo_pago'];
        $registro->estatus=$data['estatus'];
        $registro->subtotal=$data['subtotal'];
        $registro->iva=$data['iva'];
        $registro->total=$data['total'];
        $registro->save();
        return true;
    }

    public static function editaArcRegistro($data) {
        $registro= FacturasEmitidas::find($data['id']);
        $registro->factura=$data['factura'];
        $registro->fecha=$data['fecha'];
        $registro->rfc=$data['rfc'];
        $registro->nombre=$data['nombre'];
        $registro->concepto=$data['concepto'];
        $registro->forma_pago=$data['forma_pago'];
        $registro->modo_pago=$data['modo_pago'];
        $registro->estatus=$data['estatus'];
        $registro->subtotal=$data['subtotal'];
        $registro->iva=$data['iva'];
        $registro->total=$data['total'];
        $registro->archivo=$data['archivo'];
        $registro->save();
        return true;
    }

    public function formaPago(){
        return $this->belongsTo('App\Models\FormaPagoFactura','forma_pago','id')->first();
    }

    public function modoPago(){
        return $this->belongsTo('App\Models\ModoPagoFactura','modo_pago','id')->first();
    }

    public function estFact(){
        return $this->belongsTo('App\Models\EstatusFactura','estatus','id')->first();
    }

}
