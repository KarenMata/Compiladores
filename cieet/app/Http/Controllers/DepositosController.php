<?php

namespace App\Http\Controllers;

use App\Models\Depositos;
use App\Models\FacturasEmitidas;
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

class DepositosController extends BaseController {

    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;

    public function index() {
        $depositos = Depositos::all();
//        dd($fac_rec);
        return view('depositos.index')->with('depositos', $depositos);
    }

    public function calendario() {
        return view('calendario');
    }

    public function create() {
        $facturas = FacturasEmitidas::all()->pluck('factura', 'id');
        return view('depositos/create')->with('facturas', $facturas);
    }

    public function edit($id) {
        $facturas = FacturasEmitidas::all()->pluck('factura', 'id');
        $deposito = Depositos::find($id);
        $deposito->factura = $deposito->id_factura;
        return view('depositos/edit')->with('deposito', $deposito)->with('facturas', $facturas);
    }

    public function store(Request $request) {
        $input = $request->all();
        $fecha = explode('-', $input['fecha']);
        $datos['anio'] = $fecha[0];
        $datos['mes'] = $fecha[1];
        $datos['dia'] = $fecha[2];
        $datos['fecha'] = $input['fecha'];
        $datos['total'] = $input['total'];
        $datos['concepto'] = $input['concepto'];
        $datos['id_factura'] = $input['factura'];
        Depositos::creaRegistro($datos);
        Session::flash('tituloMsg', 'Guardado exitoso!');
        Session::flash('mensaje', "Se ha creado existosamente el registro.");
        Session::flash('tipoMsg', 'success');
        return Redirect::to('/depositos/index');
    }

    public function update(Request $request) {
        $input = $request->all();
        $fecha = explode('-', $input['fecha']);
        $datos['id'] = $input['id'];
        $datos['anio'] = $fecha[0];
        $datos['mes'] = $fecha[1];
        $datos['dia'] = $fecha[2];
        $datos['fecha'] = $input['fecha'];
        $datos['total'] = $input['total'];
        $datos['concepto'] = $input['concepto'];
        $datos['id_factura'] = $input['factura'];
        $deposito = Depositos::editaRegistro($datos);
        if ($deposito) {
            Session::flash('tituloMsg', 'Guardado exitoso!');
            Session::flash('mensaje', "Se ha editado existosamente el depósito.");
            Session::flash('tipoMsg', 'success');
        } else {
            Session::flash('tituloMsg', 'Guardado fallido!');
            Session::flash('mensaje', "No se ha podido editar el depósito.");
            Session::flash('tipoMsg', 'error');
        }
        return Redirect::to('depositos/index');
    }

    public function show($id) {
        $facturas = FacturasEmitidas::all()->pluck('factura', 'id');
        $deposito = Depositos::find($id);
        $deposito->factura = $deposito->id_factura;
        return view('depositos/show')->with('deposito', $deposito)->with('facturas', $facturas);
    }

    public function delete($id) {
        $deposito = Depositos::find($id)->delete();
        Session::flash('tituloMsg', 'Borrado exitoso!');
        Session::flash('mensaje', "Se ha borrado existosamente el depósito.");
        Session::flash('tipoMsg', 'success');
        return Redirect::to('depositos/index');
    }

}
