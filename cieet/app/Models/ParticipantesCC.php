<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Validator;

class ParticipantesCC extends Model {

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'participantes_cc';
    public $timestamps = false;
    protected $fillable = [
        'id_cc',
        'id_usuario',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public static function creaRegistro($data) {
        return ParticipantesCC::create([
                    'id_cc' => $data['id_cc'],
                    'id_usuario' => $data['id_usuario']
        ]);
    }

    public static function editaRegistro($data) {
        $registro = ParticipantesCC::find($data['id']);
        $registro->id_cc = $data['id_cc'];
        $registro->id_usuario = $data['id_usuario'];
        $registro->save();
        return true;
    }

    public function participante(){
        return $this->belongsTo('App\Models\User','id_usuario','id')->first();
    }
}
