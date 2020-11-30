<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Validator;

class User_ extends Model
{ 
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'usuarios';
    public $timestamps = false;
    protected $fillable = [
        'nombre', 
        'ap_paterno', 
        'ap_materno',
        'fecha_nac',
        'correo',
        'password',
        'remember_token',
        'direccion',
        'fotografia',
        'horario',
        'telefono',
        'puesto',
        'ini_contrato',
        'fin_contrato',
        'contrato'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    protected function validator($data)
    {
        return Validator::make($data, [
            'nombre' => 'required|max:255',
            'ap_paterno' => 'required|max:255',
            'ap_materno' => 'required|max:255',
            'correo' => 'required|email|max:255|unique:usuarios',
            'password' => 'required|min:6|confirmed',
            'fotografia' => 'required|image|mimes:jpeg,bmp,png',
        ]);
    }
    protected function validatorEdit($data,$id)
    {
        return Validator::make($data, [
            'nombre' => 'required|max:255',
            'ap_paterno' => 'required|max:255',
            'ap_materno' => 'required|max:255',
            'correo' => 'required|email|max:255|unique:usuarios,email,'.$id,
            'password' => 'required|min:6|confirmed',
            'fotografia' => 'image|mimes:jpeg,bmp,png',
        ]);
    }
    
    public static function creaRegistro($data) {
            return User::create([
                'nombre' => $data['nombre'],         
                'ap_paterno' => $data['ap_paterno'],                 
                'ap_materno' => $data['ap_materno'], 
                'fecha_nac' => $data['fecha_nac'], 
                'correo' => $data['correo'],    
                'password' => \Hash::make($data['password']),                
                'remember_token' => $data['remember_token'], 
                'direccion' => $data['direccion'],         
                'fotografia' => $data['fotografia'],                 
                'horario' => $data['horario'],   
                'telefono' => $data['telefono'],    
                'puesto' => $data['puesto'],                 
                'ini_contrato' => $data['ini_contrato'],  
                'fin_contrato' => $data['fin_contrato'],                 
                'contrato' => $data['contrato'],  
            ]);
    }
    
    public static function editaRegistro($data) {
        $registro= User::where('id',$data['id'])->first();
        $registro->nombre=$data['nombre'];
        $registro->ap_paterno=$data['ap_paterno'];
        $registro->ap_materno=$data['ap_materno'];
        $registro->fecha_nac=$data['fecha_nac'];
        $registro->correo=$data['correo'];
        $registro->password=  bcrypt($data['password']);
        $registro->remember_token=$data['remember_token'];
        $registro->direccion=$data['direccion'];
        $registro->fotografia=$data['fotografia'];
        $registro->horario=$data['horario'];
        $registro->telefono=$data['telefono'];
        $registro->puesto=$data['puesto'];
        $registro->ini_contrato=$data['ini_contrato'];
        $registro->fin_contrato=$data['fin_contrato'];
        $registro->contrato=$data['contrato'];
        $registro->save();
        return true;
    }
    
    
    
    
}
