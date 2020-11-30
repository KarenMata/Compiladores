<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Validator;

class FacturasRecibidas extends Model
{ 
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'facturas_recibidas';
    public $timestamps = false;
    protected $fillable = [
        'num', 
        'fecha', 
        'num_factura',
        'rfc',
        'denominacion',
        'concepto',
        'subtotal',
        'iva',
        'isr_retenido',
        'iva_retenido',
        'importe',
        'otro',
        'mov_id',
        'archivo',
        'forma_pago',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    
    
    public static function creaRegistro($data) {
            return FacturasRecibidas::create([
                'num' => $data['num'],         
                'fecha' => $data['fecha'],                 
                'num_factura' => $data['num_factura'], 
                'rfc' => $data['rfc'], 
                'denominacion' => $data['denominacion'],    
                'concepto' => $data['concepto'],                
                'subtotal' => $data['subtotal'], 
                'iva' => $data['iva'],         
                'isr_retenido' => $data['isr_retenido'],                 
                'iva_retenido' => $data['iva_retenido'],   
                'otro' => $data['otro'],  
                'importe' => $data['importe'],  
                'archivo' => $data['archivo'],  
                'forma_pago' => $data['forma_pago'],  
            ]);
    }
    
    public static function editaRegistro($data) {
        $registro= FacturasRecibidas::find($data['id']);
        $registro->num=$data['num'];
        $registro->fecha=$data['fecha'];
        $registro->num_factura=$data['num_factura'];
        $registro->rfc=$data['rfc'];
        $registro->denominacion=$data['denominacion'];
        $registro->concepto=$data['concepto'];
        $registro->subtotal=$data['subtotal'];
        $registro->iva=$data['iva'];
        $registro->isr_retenido=$data['isr_retenido'];
        $registro->iva_retenido=$data['iva_retenido'];
        $registro->otro=$data['otro'];
        $registro->importe=$data['importe'];
        $registro->forma_pago=$data['forma_pago'];
        $registro->save();
        return true;
    }
    
    public static function editaArcRegistro($data) {
        $registro= FacturasRecibidas::find($data['id']);
        $registro->num=$data['num'];
        $registro->fecha=$data['fecha'];
        $registro->num_factura=$data['num_factura'];
        $registro->rfc=$data['rfc'];
        $registro->denominacion=$data['denominacion'];
        $registro->concepto=$data['concepto'];
        $registro->subtotal=$data['subtotal'];
        $registro->iva=$data['iva'];
        $registro->isr_retenido=$data['isr_retenido'];
        $registro->iva_retenido=$data['iva_retenido'];
        $registro->otro=$data['otro'];
        $registro->importe=$data['importe'];
        $registro->archivo=$data['archivo'];
        $registro->forma_pago=$data['forma_pago'];
        $registro->save();
        return true;
    }
    
   public function formaPago(){
        return $this->belongsTo('App\Models\FormaPagoFactura','forma_pago','id')->first();
    }
    
    
}
