<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Validator;

class CatalogoPartidas extends Model
{ 
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'catalogo_partidas';
    
    public function getCodDescAttribute () {
        return $this->attributes['codigo']." - ".$this->attributes['descripcion'];
    }

    
}
