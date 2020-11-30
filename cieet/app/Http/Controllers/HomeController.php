<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    
    public function tema(Request $request)
    {
        $tema = $request->get('tema');
        $data['id'] = \Auth::User()->id;
        $data['tema'] = $tema;
        User::editaTema($data);
    }
    
    public function verificaCorreo(Request $request)
    {
        $correo = $request->get('correo');
        $count = User::where('correo','=',$correo)->count();
        return $count;
    }
    
    public function verificaCorreoEdit(Request $request)
    {
        $correo = $request->get('correo');
        $correoN = $request->get('correoN');
        $count = User::where('correo','=',$correoN)->whereNotIn('correo',[$correo])->count();
        return $count;
    }

    public function enviaMensaje(Request $request)
    {
        $nombre = $request->get('nombre');
        $correo = $request->get('correo');
        $msj = $request->get('msj');
        
        return 1;
    }
}
