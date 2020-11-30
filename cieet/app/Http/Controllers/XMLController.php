<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\FacturasEmitidas;
use App\Models\FacturasRecibidas;
use Config;

class XMLController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $reader = new \XMLReader();
        $doc = new \DOMDocument();
        $reader->open(public_path() . "/xml/ejemplo7.xml");
        $result = [];
        while ($reader->read()) {

            if ($reader->nodeType == \XMLReader::ELEMENT && $reader->name == 'cfdi:Comprobante') {

                $node = simplexml_import_dom($doc->importNode($reader->expand(), true));

                $result['Comprobante']['CFDI'] = $reader->getAttribute('xmlns:cfdi');
                $result['Comprobante']['XSI'] = $reader->getAttribute('xmlns:xsi');
                $result['Comprobante']['Sello'] = $reader->getAttribute('Sello').$reader->getAttribute('sello');
                $result['Comprobante']['Certificado'] = $reader->getAttribute('Certificado').$reader->getAttribute('certificado');
                $result['Comprobante']['SchemaLocation'] = $reader->getAttribute('xsi:schemaLocation');
                $result['Comprobante']['Serie'] = $reader->getAttribute('Serie').$reader->getAttribute('serie');
                $result['Comprobante']['Folio'] = $reader->getAttribute('Folio').$reader->getAttribute('folio');
                $result['Comprobante']['Fecha'] = $reader->getAttribute('Fecha').$reader->getAttribute('fecha');
                $result['Comprobante']['Version'] = $reader->getAttribute('Version').$reader->getAttribute('version');
                $result['Comprobante']['FormaPago'] = $reader->getAttribute('FormaPago').$reader->getAttribute('formaDePago');
                $result['Comprobante']['NoCertificado'] = $reader->getAttribute('NoCertificado').$reader->getAttribute('noCertificado');
                $result['Comprobante']['MetodoPago'] = $reader->getAttribute('MetodoPago').$reader->getAttribute('metodoDePago');
                $result['Comprobante']['TipoCambio'] = $reader->getAttribute('TipoCambio');
                $result['Comprobante']['Moneda'] = $reader->getAttribute('Moneda');
                $result['Comprobante']['TipoDeComprobante'] = $reader->getAttribute('TipoDeComprobante').$reader->getAttribute('tipoDeComprobante');
                $result['Comprobante']['SubTotal'] = $reader->getAttribute('SubTotal').$reader->getAttribute('subTotal');
                $result['Comprobante']['Descuento'] = $reader->getAttribute('Descuento');
                $result['Comprobante']['Total'] = $reader->getAttribute('Total').$reader->getAttribute('total');
                $result['Comprobante']['LugarExpedicion'] = $reader->getAttribute('LugarExpedicion');
                        
            }
            if ($reader->nodeType == \XMLReader::ELEMENT && $reader->name == 'cfdi:Emisor') {

                $node = simplexml_import_dom($doc->importNode($reader->expand(), true));

                $result['Emisor']['RFC'] = $reader->getAttribute('Rfc').$reader->getAttribute('rfc');
                $result['Emisor']['Nombre'] = $reader->getAttribute('Nombre').$reader->getAttribute('nombre');
                $result['Emisor']['RegimenFiscal'] = $reader->getAttribute('RegimenFiscal');
                        
            }
            if ($reader->nodeType == \XMLReader::ELEMENT && $reader->name == 'cfdi:Receptor') {

                $node = simplexml_import_dom($doc->importNode($reader->expand(), true));

                $result['Receptor']['RFC'] = $reader->getAttribute('Rfc').$reader->getAttribute('rfc');
                $result['Receptor']['Nombre'] = $reader->getAttribute('Nombre').$reader->getAttribute('nombre');
                $result['Receptor']['UsoCFDI'] = $reader->getAttribute('UsoCFDI').$reader->getAttribute('usoCFDI');
                        
            }
        }
        $reader->close();

        dd($result);
    }

}
