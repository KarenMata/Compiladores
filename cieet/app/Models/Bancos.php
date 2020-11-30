<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bancos extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'bancos';
    public $timestamps = false;
    protected $fillable = [
        'banco',
		'cuenta'
		
    ];
}
