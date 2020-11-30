<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MovimientosBancos extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'movimientos_banco';
    public $timestamps = false;
    protected $fillable = [
        'tipo',
        'movimiento',
        'fecha',
        'banco',
        'subcuenta',
        'no_cheque',
        'nombre',
        'concepto',
        'cantidad',
        'total',
        'fecha_registro',
        'factura'
		
    ];
}
