<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SolicitudVG;
use App\Models\SolicitudComitiva;
use App\Models\SolicitudRelComEfe;
use App\Models\ModoPagoFactura;
use App\Models\EstatusFactura;
use App\Models\FormaPagoFactura;
use App\Models\CatalogoPartidas;
use App\Models\FacturasEmitidas;
use App\Models\FacturasRecibidas;
use App\Models\CatalogoCC;
use App\Models\ComentariosCC;
use App\Models\CentroCostosDetalle as CC;
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

class CentrosCostosController extends BaseController {

    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;

    public function index($id) {
        $cc = CatalogoCC::find($id);
        $facts = CC::join('facturas_recibidas','facturas_recibidas.id','=','centro_costos_detalle.id_factura')
                ->select('centro_costos_detalle.id','centro_costos_detalle.id_partida','facturas_recibidas.fecha',
                        'facturas_recibidas.concepto','facturas_recibidas.importe','facturas_recibidas.num','centro_costos_detalle.avance')
                ->where('centro_costos_detalle.id_cc',$id)->get();
        return view('centro_costos/index')->with('facts', $facts)->with('cc', $cc);
    }

    public function create($id) {
        $cc = CatalogoCC::find($id);
        $facts = CC::pluck('id_factura');
        $facturas = FacturasRecibidas::whereNotIn('id',$facts)->pluck('num', 'id');
        $partidas = CatalogoPartidas::all()->pluck('codDesc', 'id');
        return view('centro_costos/create')->with('partidas', $partidas)->with('facturas', $facturas)->with('cc', $cc);
    }

    public function store(Request $request) {
        $input = $request->all();
        
        $cc = CC::creaRegistro($input);

        if($cc){            
            Session::flash('tituloMsg','Guardado exitoso!');
            Session::flash('mensaje',"Se ha guardado existosamente la factura.");
            Session::flash('tipoMsg','success');
        }
        else{
            Session::flash('tituloMsg','Guardado fallido!');
            Session::flash('mensaje',"No se ha podido guardar la factura.");
            Session::flash('tipoMsg','error');
        }
        return Redirect::to('catalogo_cc/detalle/'.$input['id']);
    }

    public function edit($id) {
        $partidas = CatalogoPartidas::all()->pluck('codDesc', 'id');
        $fac = CC::find($id);
        $cc = $fac->id_cc;
        $facRec = FacturasRecibidas::find($fac->id_factura);
//        dd($facRec);
        $facRec->fechaEmision = date_format (new \DateTime($facRec->fecha), 'd/m/Y');
        $facRec->partida = $fac->id_partida;
        $facRec->metodoPago = $facRec->formaPago()->forma;
        $facRec->subFact = $facRec->subtotal;
        $facRec->ivaFact = $facRec->iva;
        $facRec->ivaRet = $facRec->iva_retenido;
        $facRec->isrRet = $facRec->isr_retenido;
        $facRec->otro = $facRec->otro;
        $facRec->avance = $fac->avance;
        $facRec->factura = $facRec->num;
        $facRec->total = $facRec->importe;
        return view('centro_costos/edit')->with('partidas', $partidas)->with('fac', $facRec)->with('id', $id)->with('cc', $cc);
    }

    public function update(Request $request) {
        $input = $request->all();
//        dd($input);
        $cc = CC::editaRegistro($input);
        if ($cc) {
            Session::flash('tituloMsg', 'Guardado exitoso!');
            Session::flash('mensaje', "Se ha editado existosamente la factura.");
            Session::flash('tipoMsg', 'success');
        } else {
            Session::flash('tituloMsg', 'Guardado fallido!');
            Session::flash('mensaje', "No se ha podido editar la factura.");
            Session::flash('tipoMsg', 'error');
        }
        return Redirect::to('catalogo_cc/detalle/'.$input['cc']);
    }

    public function show($id) {
        $facturas = FacturasRecibidas::all()->pluck('num', 'id');
        $partidas = CatalogoPartidas::all()->pluck('codDesc', 'id');
        $fac = CC::find($id);
        $cc = $fac->id_cc;
        $facRec = FacturasRecibidas::find($fac->id_factura);
//        dd($facRec);
        $facRec->fechaEmision = date_format (new \DateTime($facRec->fecha), 'd/m/Y');
        $facRec->partida = $fac->partida()->coddesc;
        $facRec->metodoPago = $facRec->formaPago()->forma;
        $facRec->subFact = $facRec->subtotal;
        $facRec->ivaFact = $facRec->iva;
        $facRec->ivaRet = $facRec->iva_retenido;
        $facRec->isrRet = $facRec->isr_retenido;
        $facRec->otro = $facRec->otro;
        $facRec->avance = $fac->avance;
        $facRec->factura = $facRec->num;
        $facRec->total = $facRec->importe;
        return view('centro_costos/show')->with('partidas', $partidas)->with('facturas', $facturas)->with('fac', $facRec)->with('cc', $cc);
    }
    
    public function delete($id) {
        $fac = CC::find($id);
        $cc = $fac->id_cc;
        $fac->delete();

        if ($fac) {
            Session::flash('tituloMsg', 'Borrado exitoso!');
            Session::flash('mensaje', "Se ha eliminado existosamente la factura.");
            Session::flash('tipoMsg', 'success');
        } else {
            Session::flash('tituloMsg', 'Borrado fallido!');
            Session::flash('mensaje', "No se ha podido borrar la factura.");
            Session::flash('tipoMsg', 'error');
        }
        return Redirect::to('catalogo_cc/detalle/'.$cc);
    }

    public function buscaFactura2(Request $request) {
        $formaPago = [1=>'Transferecia electrónica de fondos',2=>'Cheque nominativo',3=>'Efectivo',4=>'Tarjeta de débito'];
        $fact = FacturasEmitidas::find($request->get('fac'));
        $fact->forma_pago = $formaPago[$fact->forma_pago];
        $fact->fecha2 = date_format (new \DateTime($fact->fecha), 'Y-m-d');
        $fact->fecha = date_format (new \DateTime($fact->fecha), 'd/m/Y');
        return $fact;
    }

    public function buscaFactura(Request $request) {
        $formaPago = [1=>'Transferecia electrónica de fondos',2=>'Cheque nominativo',3=>'Efectivo',4=>'Tarjeta de débito'];
        $fact = FacturasRecibidas::find($request->get('fac'));
        $fact->forma_pago = $formaPago[$fact->forma_pago];
        $fact->fecha2 = date_format (new \DateTime($fact->fecha), 'Y-m-d');
        $fact->fecha = date_format (new \DateTime($fact->fecha), 'd/m/Y');
        $fact->ivaRet = $fact->iva_retenido;
        $fact->isrRet = $fact->isr_retenido;
        return $fact;
    }

    public function obtenMonto(Request $request) {
        $fact = FacturasRecibidas::find($request->get('fac'));
        return number_format($fact->importe,2);
    }

    public function comentarios($id) {
        $cc = CatalogoCC::find($id);
        $comentarios = ComentariosCC::where('id_proyecto',$id)->where('estatus',1)->get();
        return view('centro_costos/comentarios')->with('comentarios', $comentarios)->with('cc', $cc);
    }
    
    public function createComent($id) {
        $cc = CatalogoCC::find($id);
        return view('centro_costos/createComent')
                ->with('cc', $cc);
    }
    
    
    public function storeComent(Request $request) {
        $input = $request->all();
        
        $cc = ComentariosCC::creaRegistro($input);

        if($cc){
            Session::flash('tituloMsg','Guardado exitoso!');
            Session::flash('mensaje',"Se ha guardado existosamente el comentario.");
            Session::flash('tipoMsg','success');
        }
        else{
            Session::flash('tituloMsg','Guardado fallido!');
            Session::flash('mensaje',"No se ha podido guardar el comentario.");
            Session::flash('tipoMsg','error');
        }
        return Redirect::to('catalogo_cc/comentarios/'.$input['id_proyecto']);
    }
    
    public function editComent($id) {
        $com = ComentariosCC::find($id);
        return view('centro_costos/editComent')->with('com', $com);
    }
    
    
    public function showComent($id) {
        $com = ComentariosCC::find($id);
        return view('centro_costos/showComent')->with('com', $com);
    }
    
    public function updateComent(Request $request) {
        $input = $request->all();
//        dd($input);
        $cc = ComentariosCC::editaRegistro($input);
        $input['id_proyecto'] = $input['cc'];
        $input['com_ant'] = $input['id'];
        $cc2 = ComentariosCC::creaRegistroEdit($input);
        if ($cc2) {
            Session::flash('tituloMsg', 'Guardado exitoso!');
            Session::flash('mensaje', "Se ha editado existosamente el comentario.");
            Session::flash('tipoMsg', 'success');
        } else {
            Session::flash('tituloMsg', 'Guardado fallido!');
            Session::flash('mensaje', "No se ha podido editar el comentario.");
            Session::flash('tipoMsg', 'error');
        }
        return Redirect::to('catalogo_cc/comentarios/'.$input['cc']);
    }
    
    public function deleteComent($id) {
        $com = ComentariosCC::find($id);
        $com->estatus = 3;
        $com->save();

        if ($com) {
            Session::flash('tituloMsg', 'Borrado exitoso!');
            Session::flash('mensaje', "Se ha eliminado existosamente el comentario.");
            Session::flash('tipoMsg', 'success');
        } else {
            Session::flash('tituloMsg', 'Borrado fallido!');
            Session::flash('mensaje', "No se ha podido borrar el comentario.");
            Session::flash('tipoMsg', 'error');
        }
        return Redirect::to('catalogo_cc/comentarios/'.$com->id_proyecto);
    }
}
