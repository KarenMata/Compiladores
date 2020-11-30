<?php

namespace App\Http\Controllers;

use App\Models\CatalogoCC;
use App\Models\Costos;
use App\Models\User;
use App\Models\FacturasRecibidas;
use App\Models\ParticipantesCC;
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

class CatalogoCCController extends BaseController {

    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;

    public function index() {
        $catalogo_cc = CatalogoCC::all();
        return view('catalogo_cc.index')->with('catalogo_cc', $catalogo_cc);
    }

//     public function calendario() {
//     return view('calendario');
//     
//     }


    public function create() {
        $facts = CatalogoCC::whereNotNull('id_factura')->pluck('id_factura');
        $facturas = FacturasRecibidas::whereNotIn('id',$facts)->pluck('num','id');
//        dd($facturas);
        $catalogo_cc = CatalogoCC::all();
        $usuarios = User::all()->pluck('nomComp', 'id');
        return view('catalogo_cc/create')->with('usuarios', $usuarios)->with('facturas', $facturas);
    }

    public function edit($id) {
        $catalogo_cc = CatalogoCC::where('id', $id)->first();
        $catalogo_cc->monto = isset($catalogo_cc->id_factura) ? $catalogo_cc->factura()->importe : null;
//        dd($catalogo_cc);
        $facts = CatalogoCC::whereNotNull('id_factura')->where('id_factura','<>',$catalogo_cc->id_factura)->pluck('id_factura');
        $facturas = FacturasRecibidas::whereNotIn('id',$facts)->pluck('num','id');
//        dd($catalogo_cc->fecha_ini);
        $participantes = ParticipantesCC::where('id_cc',$id)->get();
        $usuarios = User::all()->pluck('nomComp', 'id');
        return view('catalogo_cc/edit')->with('catalogo_cc', $catalogo_cc)->with('participantes', $participantes)->with('usuarios', $usuarios)->with('facturas', $facturas);
    }

    public function store(Request $request) {
        $input = $request->all();        
//        dd($input);
        $cc = CatalogoCC::creaRegistro($input);

        $i = 0;
        foreach ($input["participante"] as $nom) {
            if($nom != null){
                $dataP[$i]["id_cc"] = $cc->id;
                $dataP[$i]["id_usuario"] = $nom;
                ParticipantesCC::creaRegistro($dataP[$i]);
                $i++;
            }
        }
        Session::flash('tituloMsg', 'Guardado exitoso!');
        Session::flash('mensaje', "Se ha creado existosamente el nuevo registro.");
        Session::flash('tipoMsg', 'success');
        return Redirect::to('/catalogo_cc/index');
    }

    public function update(Request $request) {
        $input = $request->all();
        ParticipantesCC::where('id_cc',$input['id'])->delete();
        $i = 0;
        foreach ($input["participante"] as $nom) {
            if($nom != null){
                $dataP[$i]["id_cc"] = $input['id'];
                $dataP[$i]["id_usuario"] = $nom;
                ParticipantesCC::creaRegistro($dataP[$i]);
                $i++;
            }
        }
        $catalogo_cc = CatalogoCC::editaRegistro($input, $input['id']);
        if ($catalogo_cc) {
            Session::flash('tituloMsg', 'Guardado exitoso!');
            Session::flash('mensaje', "Se ha editado existosamente el registro.");
            Session::flash('tipoMsg', 'success');
        } else {
            Session::flash('tituloMsg', 'Guardado fallido!');
            Session::flash('mensaje', "No se ha podido editar el registro.");
            Session::flash('tipoMsg', 'error');
        }
        return Redirect::to('catalogo_cc/index');
    }

    public function show($id) {
//        $facts = CatalogoCC::whereNotNull('id_factura')->pluck('id_factura');
//        $facturas = FacturasRecibidas::whereNotIn('id',$facts)->pluck('num','id');        
        $catalogo_cc = CatalogoCC::where('id', $id)->first();
        $catalogo_cc->factura = isset($catalogo_cc->id_factura) ? $catalogo_cc->factura()->num : null;
        $catalogo_cc->monto = isset($catalogo_cc->id_factura) ? $catalogo_cc->factura()->importe : null;
//        dd($catalogo_cc);
        $usuarios = ParticipantesCC::where('id_cc',$id)->get();
//        return view('catalogo_cc/show')->with('catalogo_cc', $catalogo_cc)->with('usuarios', $usuarios)->with('facturas', $facturas);
        return view('catalogo_cc/show')->with('catalogo_cc', $catalogo_cc)->with('usuarios', $usuarios);
    }

    public function delete($id) {
        $catalogo_cc = CatalogoCC::find($id)->delete();
        if ($catalogo_cc) {
            Session::flash('tituloMsg', 'Borrado exitoso!');
            Session::flash('mensaje', "Se ha eliminado existosamente el registro.");
            Session::flash('tipoMsg', 'success');
        } else {
            Session::flash('tituloMsg', 'Borrado fallido!');
            Session::flash('mensaje', "No se ha podido borrar el registro.");
            Session::flash('tipoMsg', 'error');
        }
        return Redirect::to('catalogo_cc/index');
    }

    public function proyectos() {
        $catalogo_cc = CatalogoCC::all();
        return view('catalogo_cc.proyectos')->with('catalogo_cc', $catalogo_cc);
    }
}
