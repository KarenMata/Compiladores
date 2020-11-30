<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comunidades extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'comunidades';
    public $timestamps = false;
    
    public function resultado($s){
        
        $res15 = Resultados2015::where('seccion',$s)->where('anio',2015)->first();
        ($res15) ? $gan15 = "2015: $res15->ganador" : $gan15 = "2015: SIN DEFINIR";
        $res18 = Resultados2018::where('id_seccion',$s)->first();
        ($res18) ? $gan18 = "2018: $res18->ganador" : $gan18 = "2018: SIN DEFINIR";
        return "<td>".$gan15."</td><td>".$gan18."</td>";
    }
    
    
}
