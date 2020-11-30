<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Costos;
use App\Models\Evento;
use App\Http\Controllers\SistemaController;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use File;
use Redirect;
use Illuminate\Support\Facades\Session;
use PDFMerger;
use Storage;

class ReporteController extends BaseController {

    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;

    public function usuarios() {
        $usuarios = User::all();
        return view('usuarios.index')->with('usuarios', $usuarios);
    }    
    
    public function create() {
        return view('usuarios/create');
    }

    public function edit($id) {
        $usuario = User::where('id', $id)->first();
        $fotografia = $usuario->fotografia;
        $contrato = $usuario->contrato;
        return view('usuarios/edit')
                        ->with('usuario', $usuario)
                        ->with('fotografia', $fotografia)
                        ->with('contrato', $contrato);
    }

    public function store(Request $request) {
        $input = $request->all();
        $datos['nombre'] = $input['nombre'];
        $datos['ap_paterno'] = $input['ap_paterno'];
        $datos['ap_materno'] = $input['ap_materno'];
        if ($input['fecha_nac']) {
            $datos['fecha_nac'] = $input['fecha_nac'];
        } else {
            $datos['fecha_nac'] = null;
        }
        $datos['correo'] = $input['correo'];
        $datos['password'] = $input['password'];
        $datos['remember_token'] = $input['remember_pass'];
        $datos['direccion'] = $input['direccion'];
        $datos['horario'] = $input['horario'];
        $datos['telefono'] = $input['telefono'];
        $datos['puesto'] = $input['puesto'];
        $datos['ini_contrato'] = $input['ini_contrato'];
        $datos['fin_contrato'] = $input['fin_contrato'];
        if (isset($input['contrato'])) {
            $file = $request->file('contrato');
            $datos['contrato'] = $file->getClientOriginalName();
            $path = public_path() . '/docs/';
            $subir = $file->move($path, $file->getClientOriginalName());
        } else {
            $datos['contrato'] = null;
        }
        if (isset($input['fotografia'])) {
            $file = $request->file('fotografia');
            $datos['fotografia'] = $file->getClientOriginalName();
            $path = public_path() . '/img/usuarios';
            $subir = $file->move($path, $file->getClientOriginalName());
        } else {
            $datos['fotografia'] = null;
        }

        User::creaRegistro($datos);
        Session::flash('tituloMsg', 'Guardado exitoso!');
        Session::flash('mensaje', "Se ha creado existosamente el nuevo usuario.");
        Session::flash('tipoMsg', 'success');
        return Redirect::to('/usuarios/index');




        /*
          $file = $request->file('fotografia');
          $respuesta = User::validator($datos);

          if ($respuesta->fails()) {
          //dd($respuesta);
          dd($datos);
          Session::flash('tituloMsg','Guardado fallido!');
          Session::flash('mensaje',$respuesta->messages()->first());
          Session::flash('tipoMsg','error');
          //            dd($respuesta->messages()->first());
          return Redirect::to('/usuarios/create');
          } else {
          $datos['fotografia'] = $file->getClientOriginalName();
          $path = public_path() . '/img/';
          $subir = $file->move($path, $file->getClientOriginalName());
          User::creaRegistro($datos);
          Session::flash('tituloMsg','Guardado exitoso!');
          Session::flash('mensaje',"Se ha creado existosamente el nuevo usuario.");
          Session::flash('tipoMsg','success');
          return Redirect::to('/usuarios/index');
          } */

//        dd($datos);
    }

    public function update(Request $request) {
        $input = $request->all();
        $registro = User::where('id', $input['id'])->first();
        $registro->nombre = $input['nombre'];
        $registro->ap_paterno = $input['ap_paterno'];
        $registro->ap_materno = $input['ap_materno'];
        $registro->fecha_nac = $input['fecha_nac'];
        $registro->correo = $input['correo'];
        $registro->direccion = $input['direccion'];
        if (isset($input['fotografia'])) {
            $file = $request->file('fotografia');
            $registro->fotografia = $file->getClientOriginalName();
            $path = public_path() . '/img/usuarios/';
            $subir = $file->move($path, $file->getClientOriginalName());
        }
        $registro->horario = $input['horario'];
        $registro->telefono = $input['telefono'];
        $registro->puesto = $input['puesto'];
        $registro->ini_contrato = $input['ini_contrato'];
        $registro->fin_contrato = $input['fin_contrato'];
        if (isset($input['contrato'])) {
            $file = $request->file('contrato');
            $registro->contrato = $file->getClientOriginalName();
            $path = public_path() . '/docs/';
            $subir = $file->move($path, $file->getClientOriginalName());
        }
        $registro->save();
        if ($registro) {
            Session::flash('tituloMsg', 'Guardado exitoso!');
            Session::flash('mensaje', "Se ha editado existosamente el registro.");
            Session::flash('tipoMsg', 'success');
        } else {
            Session::flash('tituloMsg', 'Guardado fallido!');
            Session::flash('mensaje', "No se ha podido editar el registro.");
            Session::flash('tipoMsg', 'error');
        }
        return Redirect::to('usuarios/index');
    }

    public function change_pass(Request $request) {
        $input = $request->all();
        $registro = User::where('id', $input['id'])->first();
        $registro->password = bcrypt($input['password']);
        $registro->save();
        if ($registro) {
            Session::flash('tituloMsg', 'Guardado exitoso!');
            Session::flash('mensaje', "Se ha cambiado la contraseña correctamente.");
            Session::flash('tipoMsg', 'success');
        } else {
            Session::flash('tituloMsg', 'Guardado fallido!');
            Session::flash('mensaje', "No se ha podido cambiar la contraseña.");
            Session::flash('tipoMsg', 'error');
        }
        return Redirect::to('usuarios/index');
    }

    public function show($id) {
        $reportes = User::where('id', $id)->first();
        $reportes->fecha_elaboracion = date("d/m/Y", strtotime($reportes->fecha_elaboracion));
        return view('usuarios/show')->with('reportes', $reportes);
    }

    public function delete($id) {
        $reportes = User::where('id', $id)->first();
        $reportes->delete();
        Session::flash('tituloMsg', 'Borrado exitoso!');
        Session::flash('mensaje', "Se ha borrado existosamente el registro.");
        Session::flash('tipoMsg', 'success');
        return Redirect::to('usuarios/index');
    }

    public function permisos($id) {
        $reportes = User::where('id', $id)->first();
        return view('usuarios/permisos')->with('reportes', $reportes);
    }

    public function updatepermisos(Request $request) {
        $input = $request->all();
        $registro = User::where('id', $input['id'])->first();
        $registro->permisos = $input['permisosusuario'];
        $registro->save();

        return Redirect::to('usuarios/index');
    }

    public function costos() {
        $costos = Costos::all();
        return view('costos.costos')->with('costos', $costos);
    }

    public function createcostos() {
        return view('costos/create');
    }

    public function storecostos(Request $request) {
        $input = $request->all();
        $datos['clave'] = $input['clave'];
        $datos['proyecto'] = $input['proyecto'];
        $datos['responsable'] = $input['responsable'];
        $datos['costo_directo'] = $input['costo_directo'];
        $datos['hospedaje'] = $input['hospedaje'];
        $datos['transporte'] = $input['transporte'];
        $datos['total_directo'] = $input['total_directo'];
        $datos['adquisiciones'] = $input['adquisiciones'];
        $datos['total_estado'] = $input['total_estado'];
        $datos['total'] = $input['total'];
        Costos::creaRegistro($datos);
        Session::flash('tituloMsg', 'Guardado exitoso!');
        Session::flash('mensaje', "Se ha creado existosamente el nuevo registro.");
        Session::flash('tipoMsg', 'success');
        return Redirect::to('/costos/costos');
    }

    public function calendario() {
        $events = 'events: [';
        $eventos = Evento::all();
        foreach ($eventos as $ev) {
            $fi = explode('-', $ev->fecha_inicio);
            $ff = explode('-', $ev->fecha_fin);
            $fi[1] = ($fi[1] * 1) - 1;
            $ff[1] = ($ff[1] * 1) - 1;
//            $events .= "{title: '".$ev->nombre."', start:  '2018-01-01T14:30:00', end: new Date(".$ff[0].", ".$ff[1].", ".$ff[2]."),allDay: false},";
            $events .= "{title: '" . $ev->nombre . "', start: new Date(" . $fi[0] . ", " . $fi[1] . ", " . $fi[2] . "), end: new Date(" . $ff[0] . ", " . $ff[1] . ", " . $ff[2] . ")},";
        }
        $events .= '],';
        return view('calendario')->with('events', $events)->with('eventos', $eventos);
    }

    public function guardaEvento(Request $request)
    {
        $data['nombre'] = $request->get('nom');
        $data['fecha_inicio'] = SistemaController::dateSave($request->get('fi'));
        $data['fecha_fin'] = SistemaController::dateSave($request->get('ff'));
        $data['descripcion'] = $request->get('des');
        $data['usuario'] = 1;
        Evento::creaRegistro($data);
        return 1;
    }
    
    public function verEvento(Request $request)
    {
        $id = $request->get('id');
        $evento = Evento::find($id);
        $evento->fecha_inicio = SistemaController::dateShow($evento->fecha_inicio);
        $evento->fecha_fin = SistemaController::dateShow($evento->fecha_fin);
        return $evento;
    }
    
    public function editaEvento(Request $request)
    {
        $data['nombre'] = $request->get('nom');
        $data['fecha_inicio'] = SistemaController::dateSave($request->get('fi'));
        $data['fecha_fin'] = SistemaController::dateSave($request->get('ff'));
        $data['descripcion'] = $request->get('des');
        $data['id'] = $request->get('id');
        $data['usuario'] = 1;
        Evento::editaRegistro($data);
        return 1;
    }
}
