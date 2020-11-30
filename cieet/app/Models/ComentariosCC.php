<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Validator;

class ComentariosCC extends Model {

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'comentarios_proyectos';
    public $timestamps = false;
    protected $fillable = [
        'id_proyecto',
        'id_usuario',
        'fecha',
        'comentarios',
        'estatus',
        'com_ant',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public static function creaRegistro($data) {
        return ComentariosCC::create([
                    'id_proyecto' => $data['id_proyecto'],
                    'id_usuario' => \Auth::User()->id,
                    'fecha' => date('Y-m-d'),
                    'comentarios' => $data['comentarios'],
                    'estatus' => 1,
                    'com_ant' => null,
        ]);
    }
    public static function creaRegistroEdit($data) {
        return ComentariosCC::create([
                    'id_proyecto' => $data['id_proyecto'],
                    'id_usuario' => \Auth::User()->id,
                    'fecha' => date('Y-m-d'),
                    'comentarios' => $data['comentarios'],
                    'estatus' => 1,
                    'com_ant' => $data['com_ant'],
        ]);
    }

    public static function editaRegistro($data) {
        $registro = ComentariosCC::where('id', $data['id'])->first();
        $registro->estatus = 2;
        $registro->save();
        return true;
    }

    public function proyecto(){
        return $this->belongsTo('App\Models\CatalogoCC','id_proyecto','id')->first();
    }

    public function usuario(){
        return $this->belongsTo('App\Models\User','id_usuario','id')->first();
    }

}
