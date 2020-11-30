<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aprobados extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'aprobados';
    public $timestamps = false;
    protected $fillable = [
        'id_compra',
		'numero_aprob',
		'cuenta_clabe',
		'banco',
		'rfc',
		'razon_social',
		'partida',
		'especificaciones',
		'fecha_aplicacion',
		'forma_pago',
		'precio_fnal'
    ];
}
