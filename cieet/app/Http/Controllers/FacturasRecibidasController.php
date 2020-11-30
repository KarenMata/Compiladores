<?php

namespace App\Http\Controllers;

use App\Models\FacturasRecibidas;
use App\Models\FormaPagoFactura;
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

class FacturasRecibidasController extends BaseController {

    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;

    public function index() {
        $fac_rec = FacturasRecibidas::all();
        return view('facturas_recibidas.facturas_recibidas')->with('fac_rec', $fac_rec);
    }

    public function calendario() {
        return view('calendario');
    }

    public function create() {
        $subtotal = 0;
        $iva = 0;
        $isr = 0;
        $importe = 0;
        $formaPago = FormaPagoFactura::pluck('forma', 'id');
        return view('facturas_recibidas/create')->with('importe', $importe)->with('formaPago', $formaPago);
    }

    public function edit($id) {
        $fac_rec = FacturasRecibidas::find($id);
        $formaPago = FormaPagoFactura::pluck('forma', 'id');
        return view('facturas_recibidas/edit')->with('fac_rec', $fac_rec)->with('formaPago', $formaPago);
    }

    public function store(Request $request) {
        $input = $request->all();
        if(isset($input['pdf'])){
            $file = $request->file('pdf');
            $nombre = $file->getClientOriginalName();
            $tmp_archivo = $_FILES['pdf']['tmp_name'];
            $archivador = public_path() . '/pdfFR/' . $nombre;
            move_uploaded_file($tmp_archivo, $archivador);
            $input['archivo'] = $nombre;
        }
        else{
            $input['archivo'] = null;
        }
        FacturasRecibidas::creaRegistro($input);
        Session::flash('tituloMsg', 'Guardado exitoso!');
        Session::flash('mensaje', "Se ha creado existosamente la factura.");
        Session::flash('tipoMsg', 'success');
        return Redirect::to('/facturas_recibidas/index');
    }

    public function update(Request $request) {
        $input = $request->all();
        if(isset($input['pdf'])){
            $file = $request->file('pdf');
            $nombre = $file->getClientOriginalName();
//            $nombre = str_replace(" ","_",$file->getClientOriginalName());
//            $nombre = utf8_decode($file->getClientOriginalName());
            $tmp_archivo = $_FILES['pdf']['tmp_name'];
            $archivador = public_path() . '/pdfFR/' . $nombre;
            move_uploaded_file($tmp_archivo, $archivador);
            $input['archivo'] = $nombre;
            $fac_rec = FacturasRecibidas::editaArcRegistro($input);
        }
        else{
            $fac_rec = FacturasRecibidas::editaRegistro($input);
        }        
        if ($fac_rec) {
            Session::flash('tituloMsg', 'Guardado exitoso!');
            Session::flash('mensaje', "Se ha editado existosamente la factura.");
            Session::flash('tipoMsg', 'success');
        } else {
            Session::flash('tituloMsg', 'Guardado fallido!');
            Session::flash('mensaje', "No se ha podido editar la factura.");
            Session::flash('tipoMsg', 'error');
        }
        return Redirect::to('facturas_recibidas/index');
    }

    public function show($id) {
        $fac_rec = FacturasRecibidas::find($id);
        return view('facturas_recibidas/show')->with('fac_rec', $fac_rec);
    }

    public function delete($id) {
        $reportes = FacturasRecibidas::find($id);
        $reportes->delete();
        Session::flash('tituloMsg', 'Borrado exitoso!');
        Session::flash('mensaje', "Se ha borrado existosamente la factura.");
        Session::flash('tipoMsg', 'success');
        return Redirect::to('facturas_recibidas/index');
    }

    public function cargaXML_(Request $request) {
        $file = $request->file('file');
        $nombre = $file->getClientOriginalName();
        $tmp_archivo = $_FILES['file']['tmp_name'];
        $archivador = public_path() . '/xmlFR/' . $nombre;
        
        if (!move_uploaded_file($tmp_archivo, $archivador)) {
            $res['error'] = 0;
            $res['valores'] = "Ocurrió un error al cargar el archivo $nombre";
        } else {
            $reader = new \XMLReader();
            $doc = new \DOMDocument();
            $reader->open($archivador);
            $result = [];
            while ($reader->read()) {

                if ($reader->nodeType == \XMLReader::ELEMENT && $reader->name == 'cfdi:Comprobante') {

                    $node = simplexml_import_dom($doc->importNode($reader->expand(), true));

                    $result['Comprobante']['CFDI'] = $reader->getAttribute('xmlns:cfdi');
                    $result['Comprobante']['XSI'] = $reader->getAttribute('xmlns:xsi');
                    $result['Comprobante']['Sello'] = $reader->getAttribute('Sello') . $reader->getAttribute('sello');
                    $result['Comprobante']['Certificado'] = $reader->getAttribute('Certificado') . $reader->getAttribute('certificado');
                    $result['Comprobante']['SchemaLocation'] = $reader->getAttribute('xsi:schemaLocation');
                    $result['Comprobante']['Serie'] = $reader->getAttribute('Serie') . $reader->getAttribute('serie');
                    $result['Comprobante']['Folio'] = $reader->getAttribute('Folio') . $reader->getAttribute('folio');
                    $fecha = explode("T",$reader->getAttribute('Fecha') . $reader->getAttribute('fecha'));
                    $result['Comprobante']['Fecha'] = $fecha[0];
                    $result['Comprobante']['Version'] = $reader->getAttribute('Version') . $reader->getAttribute('version');
                    $result['Comprobante']['FormaPago'] = $reader->getAttribute('FormaPago') . $reader->getAttribute('formaDePago');
                    $result['Comprobante']['NoCertificado'] = $reader->getAttribute('NoCertificado') . $reader->getAttribute('noCertificado');
                    $result['Comprobante']['MetodoPago'] = $reader->getAttribute('MetodoPago') . $reader->getAttribute('metodoDePago');
                    $result['Comprobante']['TipoCambio'] = $reader->getAttribute('TipoCambio');
                    $result['Comprobante']['Moneda'] = $reader->getAttribute('Moneda');
                    $result['Comprobante']['TipoDeComprobante'] = $reader->getAttribute('TipoDeComprobante') . $reader->getAttribute('tipoDeComprobante');
                    $result['Comprobante']['SubTotal'] = $reader->getAttribute('SubTotal') . $reader->getAttribute('subTotal');
                    $result['Comprobante']['Descuento'] = $reader->getAttribute('Descuento');
                    $result['Comprobante']['Total'] = $reader->getAttribute('Total') . $reader->getAttribute('total');
                    $result['Comprobante']['LugarExpedicion'] = $reader->getAttribute('LugarExpedicion');
                }
                if ($reader->nodeType == \XMLReader::ELEMENT && $reader->name == 'cfdi:Emisor') {

                    $node = simplexml_import_dom($doc->importNode($reader->expand(), true));

                    $result['Emisor']['RFC'] = $reader->getAttribute('Rfc') . $reader->getAttribute('rfc');
                    $result['Emisor']['Nombre'] = $reader->getAttribute('Nombre') . $reader->getAttribute('nombre');
                    $result['Emisor']['RegimenFiscal'] = $reader->getAttribute('RegimenFiscal');
                }
                if ($reader->nodeType == \XMLReader::ELEMENT && $reader->name == 'cfdi:Receptor') {

                    $node = simplexml_import_dom($doc->importNode($reader->expand(), true));

                    $result['Receptor']['RFC'] = $reader->getAttribute('Rfc') . $reader->getAttribute('rfc');
                    $result['Receptor']['Nombre'] = $reader->getAttribute('Nombre') . $reader->getAttribute('nombre');
                    $result['Receptor']['UsoCFDI'] = $reader->getAttribute('UsoCFDI') . $reader->getAttribute('usoCFDI');
                }
            }
            $reader->close();
            $res['error'] = 0;
            $res['valores'] = $result;
        }
        return $res;
    }
    
    public function cargaXML(Request $request) {
        $file = $request->file('file');
        $nombre = $file->getClientOriginalName();
        $tmp_archivo = $_FILES['file']['tmp_name'];
        $archivador = public_path() . '/xmlFR/' . $nombre;

        if (!move_uploaded_file($tmp_archivo, $archivador)) {
            $res['error'] = 0;
            $res['valores'] = "Ocurrió un error al cargar el archivo $nombre";
        } else {
            $xml = \simplexml_load_file($archivador);
            $ns = $xml->getNamespaces(true);
            $xml->registerXPathNamespace('c', $ns['cfdi']);
            $xml->registerXPathNamespace('t', $ns['tfd']);
            $result = [];
            foreach ($xml->xpath('//cfdi:Comprobante') as $cfdiComprobante) {
                $fecha = explode("T", $cfdiComprobante['Fecha'] . $cfdiComprobante['fecha']);
                $result['Comprobante']['Fecha'] = $fecha[0];
                $result['Comprobante']['Total'] = $cfdiComprobante['Total'] . $cfdiComprobante['total'];
                $result['Comprobante']['SubTotal'] = $cfdiComprobante['SubTotal'] . $cfdiComprobante['subTotal'];
//                $result['Comprobante']['Folio'] = $cfdiComprobante['Folio'] . $cfdiComprobante['folio'];
            }
            foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Emisor') as $Emisor) {
                $result['Emisor']['RFC'] = $Emisor['Rfc'] . $Emisor['rfc'];
                $result['Emisor']['Nombre'] = $Emisor['Nombre'] . $Emisor['nombre'];
            }
            foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Receptor') as $Receptor) {
                $result['Receptor']['RFC'] = $Receptor['Rfc'] . $Receptor['rfc'];
                $result['Receptor']['Nombre'] = $Receptor['Nombre'] . $Receptor['nombre'];
            }
            foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Conceptos//cfdi:Concepto') as $Concepto) {
                $result['Concepto']['Descripcion'] = $Concepto['Descripcion'] . $Concepto['descripcion'];
            }
            foreach ($xml->xpath('//t:TimbreFiscalDigital') as $uuid) {
                $result['Comprobante']['Folio'] = $uuid['UUID'];
            }
            $res['error'] = 0;
            $res['valores'] = $result;
        }
        return $res;
    }

}
