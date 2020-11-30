<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compras extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'compras';
    public $timestamps = false;
    protected $fillable = [
        'fecha_sol',
		'nombre_sol',
		'fecha_entrega',
		'nombre_proy',
		'codigo_proy',
		'periodicidad',
		'metodopago',
		'fecha_create'
    ];
}
