<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mensajes;

class MensajeController extends Controller
{

    public function enviaMensaje(Request $request)
    {
        $data['nombre'] = $request->get('nombre');
        $data['correo'] = $request->get('correo');
        $data['mensaje'] = $request->get('msj');

        Mensajes::creaRegistro($data);
        return 1;
    }
}
