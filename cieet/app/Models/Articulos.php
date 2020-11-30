<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articulos extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'articulos';
    public $timestamps = false;
    protected $fillable = [
        'id_compra',
		'numero_art',
		'concepto_art',
		'cantidad_art',
		'precio_art',
		'descripcion_art',
		'total_art',
		'elegible_art'
    ];
}
