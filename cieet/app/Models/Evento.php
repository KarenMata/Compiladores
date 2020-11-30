<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'eventos';
    public $timestamps = false;
    protected $fillable = [
        'fecha_inicio',
        'fecha_fin',
        'nombre',
        'descripcion',
        'usuario',
    ];

    public static function creaRegistro($data) {
            return Evento::create([
                'fecha_inicio' => $data['fecha_inicio'],
                'fecha_fin' => $data['fecha_fin'],
                'nombre' => $data['nombre'],
                'descripcion' => $data['descripcion'],
                'usuario' => $data['usuario'],
            ]);
    }

    public static function editaRegistro($data) {
        $registro= Evento::where('id',$data['id'])->first();
        $registro->fecha_inicio=$data['fecha_inicio'];
        $registro->fecha_fin=$data['fecha_fin'];
        $registro->nombre=$data['nombre'];
        $registro->descripcion=$data['descripcion'];
        $registro->save();
        return true;
    }
}