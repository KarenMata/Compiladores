<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\FacturasEmitidas;
use App\Models\FacturasRecibidas;
use App\Models\MovimientosBancos;
use App\Models\CatalogoCC;
use App\Models\CentroCostosDetalle;
use App\Models\Depositos;
use Config;

class ExcelController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function excel() {
        ini_set("memory_limit", "-1");
        ini_set('max_execution_time', 3600);

        $ea = new \PHPExcel(); // ea is short for Excel Application
        $ews = $ea->getSheet(0);
//       ******************************  FACTURAS RECIBIDAS *******************************
        $ews->setTitle("FACTURAS");
        $ews->mergeCells('C1:M1');
        $ews->setCellValue("C1", "RELACIÓN DE FACTURAS AÑO 2017");
        $ews->mergeCells('C2:N3');
        $ews->setCellValue("C2", "TÁCTICA CENTRO DE INVESTIGACIÓN EMPRESARIAL Y ESTADISTICA");
        $ews->setCellValue("C4", "#");
        $ews->setCellValue("D4", "FECHA");
        $ews->setCellValue("E4", "No FACTURA");
        $ews->setCellValue("G4", "RFC");
        $ews->setCellValue("H4", "DENOMINACIÓN");
        $ews->setCellValue("I4", "CONCEPTO");
        $ews->setCellValue("J4", "SUBTOTAL");
        $ews->setCellValue("K4", "IVA");
        $ews->setCellValue("L4", "ISR Retenido");
        $ews->setCellValue("M4", "IVA Retenido");
        $ews->setCellValue("N4", "OTRO");
        $ews->setCellValue("O4", "TOTAL");
        $ews->getStyle('B1:O5')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FF9BBB59');
        $ews->getStyle('C1:O3')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FFC4D79B');
        $ews->getStyle('C1')->getFont()->setBold(true);
        $ews->getStyle('C1')->getFont()->setSize(22);
        $ews->getStyle('C2')->getFont()->setSize(18);
        $ews->getStyle('C1:C2')->getFont()->setName('Arial');
        $ews->getStyle('C1:O4')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $ews->getStyle('C4:O4')->getFont()->getColor()->setARGB(\PHPExcel_Style_Color::COLOR_WHITE);
        $ews->getStyle('C4:O4')->getFont()->setBold(true);
        $ews->getStyle('C4:O4')->getFont()->setSize(12);
        $ews->getColumnDimension('A')->setVisible(false);
        $ews->getColumnDimension('F')->setVisible(false);
        $ews->getColumnDimension('B')->setWidth(10);
        $ews->getColumnDimension('C')->setWidth(9);
        $ews->getColumnDimension('D')->setWidth(11);
        $ews->getColumnDimension('E')->setWidth(23);
        $ews->getColumnDimension('G')->setWidth(24);
        $ews->getColumnDimension('H')->setWidth(50);
        $ews->getColumnDimension('I')->setWidth(23);
        $ews->getColumnDimension('J')->setWidth(18);
        $ews->getColumnDimension('K')->setWidth(15);
        $ews->getColumnDimension('L')->setWidth(13);
        $ews->getColumnDimension('M')->setWidth(13);
        $ews->getColumnDimension('N')->setWidth(13);
        $ews->getColumnDimension('O')->setWidth(25);
        $row = 6;
        $facturasR = FacturasRecibidas::all();
        foreach ($facturasR as $fR) {
            $ews->setCellValue("C$row", $fR->num);
            $fecha = explode("-", $fR->fecha);
            $ews->setCellValue("D$row", $fecha[2] . "/" . $fecha[1] . "/" . $fecha[0]);
            $ews->setCellValue("E$row", $fR->num_factura);
            $ews->setCellValue("G$row", $fR->rfc);
            $ews->setCellValue("H$row", $fR->denominacion);
            $ews->setCellValue("I$row", $fR->concepto);
            $ews->setCellValue("J$row", $fR->subtotal);
            $ews->setCellValue("K$row", $fR->iva);
            $ews->setCellValue("L$row", $fR->isr_retenido);
            $ews->setCellValue("M$row", $fR->iva_retenido);
//            $ews->setCellValue("N$row", $fR->denominacion);
            $ews->setCellValue("O$row", $fR->importe);
            $row++;
        }
        $ews->getStyle("C6:E$row")->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $ews->getStyle("D6:D$row")->getNumberFormat()->setFormatCode(\PHPExcel_Style_NumberFormat::FORMAT_DATE_DDMMYYYY);
        $ews->getStyle("J6:O$row")->getNumberFormat()->setFormatCode(\PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
        $ews->getStyle("C6:O$row")->getFont()->setSize(12);
//       ******************************  CTA SCOTIABANK *******************************
        $ea->createSheet(1);
        $ews = $ea->getSheet(1);
        $ews->setTitle("CTA SCOTIABANK");
        $ews->mergeCells('B3:G3');
        $ews->setCellValue("B3", "NO. CTA. 01603943666");
        $ews->mergeCells('B4:G4');
        $ews->setCellValue("B4", "CIEET 2013");
        $ews->setCellValue("B5", "FECHA");
        $ews->setCellValue("C5", "NO. CHEQUE");
        $ews->setCellValue("D5", "NOMBRE");
        $ews->setCellValue("E5", "CONCEPTO");
        $ews->setCellValue("F5", "CANTIDAD");
        $ews->setCellValue("G5", "TOTAL");
        $ews->getStyle('B3:G5')->getFont()->setBold(true);
        $ews->getStyle("B3")->getFont()->setSize(12);
        $ews->getStyle("B4")->getFont()->setSize(14);
        $ews->getStyle('B3:G5')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $ews->getStyle('B5:G5')->getFont()->getColor()->setARGB(\PHPExcel_Style_Color::COLOR_WHITE);
        $ews->getStyle('B3:G5')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FF9BBB59');
        $ews->getStyle('B4:G4')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FFC4D79B');
        $ews->getStyle('B3:G4')->getBorders()->getOutline()->setBorderStyle(\PHPExcel_Style_Border::BORDER_MEDIUM);
        $ews->getColumnDimension('B')->setWidth(10);
        $ews->getColumnDimension('C')->setWidth(14);
        $ews->getColumnDimension('D')->setWidth(51);
        $ews->getColumnDimension('E')->setWidth(50);
        $ews->getColumnDimension('F')->setWidth(19);
        $ews->getColumnDimension('G')->setWidth(22);
        $row = 6;
        $scotia = MovimientosBancos::where('banco', 'Scotiabank')->get();
        foreach ($scotia as $sc) {
            $fecha = explode("-", $sc->fecha);
            $ews->setCellValue("B$row", $fecha[2] . "/" . $fecha[1] . "/" . $fecha[0]);
            $ews->setCellValue("C$row", $sc->no_cheque);
            $ews->setCellValue("D$row", $sc->nombre);
            $ews->setCellValue("E$row", $sc->concepto);
            $ews->setCellValue("F$row", $sc->cantidad);
            if ($sc->cantidad > 0) {
                $ews->getStyle("F$row")->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FFC6EFCE');
                $ews->getStyle("F$row")->getFont()->getColor()->setARGB('FF006100');
            } else {
                $ews->getStyle("F$row")->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FFFFC7CE');
                $ews->getStyle("F$row")->getFont()->getColor()->setARGB('FF9C0006');
            }
            $ews->setCellValue("G$row", $sc->total);
            $row++;
        }
        $ews->getStyle("B6:E$row")->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $ews->getStyle("B6:B$row")->getNumberFormat()->setFormatCode(\PHPExcel_Style_NumberFormat::FORMAT_DATE_DDMMYYYY);
        $ews->getStyle("F6:G$row")->getNumberFormat()->setFormatCode(\PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
//       ******************************  CTA BANORTE *******************************
        $ea->createSheet(2);
        $ews = $ea->getSheet(2);
        $ews->setTitle("CTA BANORTE");
        $ews->mergeCells('B3:H3');
        $ews->setCellValue("B3", "NO. CTA. 490481772");
        $ews->mergeCells('B4:H4');
        $ews->setCellValue("B4", "CIEET 2017");
        $ews->setCellValue("B5", "FECHA");
        $ews->setCellValue("C5", "SUBCUENTA");
        $ews->setCellValue("D5", "NO. CHEQUE");
        $ews->setCellValue("E5", "NOMBRE");
        $ews->setCellValue("F5", "CONCEPTO");
        $ews->setCellValue("G5", "CANTIDAD");
        $ews->setCellValue("H5", "TOTAL");
        $ews->getStyle('B3:H5')->getFont()->setBold(true);
        $ews->getStyle("B3")->getFont()->setSize(12);
        $ews->getStyle("B4")->getFont()->setSize(14);
        $ews->getStyle('B3:H5')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $ews->getStyle('B5:H5')->getFont()->getColor()->setARGB(\PHPExcel_Style_Color::COLOR_WHITE);
        $ews->getStyle('B3:H5')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FF9BBB59');
        $ews->getStyle('B4:H4')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FFC4D79B');
        $ews->getStyle('B3:H4')->getBorders()->getOutline()->setBorderStyle(\PHPExcel_Style_Border::BORDER_MEDIUM);
        $ews->getColumnDimension('B')->setWidth(10);
        $ews->getColumnDimension('C')->setWidth(16);
        $ews->getColumnDimension('D')->setWidth(14);
        $ews->getColumnDimension('E')->setWidth(51);
        $ews->getColumnDimension('F')->setWidth(50);
        $ews->getColumnDimension('G')->setWidth(19);
        $ews->getColumnDimension('H')->setWidth(22);
        $row = 6;
        $banorte1 = MovimientosBancos::where('banco', 'Banorte')->where('subcuenta', '490481772')->get();
        foreach ($banorte1 as $ban) {
            $fecha = explode("-", $ban->fecha);
            $ews->setCellValue("B$row", $fecha[2] . "/" . $fecha[1] . "/" . $fecha[0]);
            $ews->setCellValue("C$row", $ban->subcuenta);
            $ews->setCellValue("D$row", $ban->no_cheque);
            $ews->setCellValue("E$row", $ban->nombre);
            $ews->setCellValue("F$row", $ban->concepto);
            $ews->setCellValue("G$row", $ban->cantidad);
            if ($ban->cantidad > 0) {
                $ews->getStyle("G$row")->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FFC6EFCE');
                $ews->getStyle("G$row")->getFont()->getColor()->setARGB('FF006100');
            } else {
                $ews->getStyle("G$row")->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FFFFC7CE');
                $ews->getStyle("G$row")->getFont()->getColor()->setARGB('FF9C0006');
            }
            $ews->setCellValue("H$row", $ban->total);
            $row++;
        }
//       ******************************  DEPÓSITOS *******************************
        $ea->createSheet(3);
        $ews = $ea->getSheet(3);
        $ews->setTitle("DEPÓSITOS");
        $ews->mergeCells('B2:F3');
        $ews->setCellValue("B2", "DEPÓSITOS RECIBIDOS");
        $ews->getStyle("B2")->getFont()->setSize(22);        
        $ews->setCellValue("B4", "AÑO");
        $ews->setCellValue("C4", "MES");
        $ews->setCellValue("D4", "DÍA");
        $ews->setCellValue("E4", "TOTAL");
        $ews->setCellValue("F4", "CONCEPTO");
        $ews->getStyle('B2:F4')->getFont()->setBold(true);
        $ews->getStyle('A2:F4')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $ews->getStyle('A2:F4')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $ews->getStyle('B4:F4')->getBorders()->getAllBorders()->setBorderStyle(\PHPExcel_Style_Border::BORDER_MEDIUM);
        $ews->getStyle("B4:F4")->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FFD8E4BC');
        $ews->getColumnDimension('A')->setWidth(11);
        $ews->getColumnDimension('B')->setWidth(11);
        $ews->getColumnDimension('C')->setWidth(11);
        $ews->getColumnDimension('D')->setWidth(11);
        $ews->getColumnDimension('E')->setWidth(24);
        $ews->getColumnDimension('F')->setWidth(38);
        $meses = ['', 'ENERO', 'FEBERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE'];
        $colores = ['', 'FFFFFFFF', 'FFD8E4BC', 'FFFFFFFF', 'FFD8E4BC', 'FFFFFFFF', 'FFD8E4BC', 'FFFFFFFF', 'FFD8E4BC', 'FFFFFFFF', 'FFD8E4BC', 'FFFFFFFF', 'FFD8E4BC'];
        $row = 5;
        $m = 1;
        while ($m < 13) {
            $row2 = $row;
            $ews->getStyle("C$row:F$row")->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB("$colores[$m]");
            $ews->setCellValue("C$row", $meses[$m]);
            $depositos = Depositos::where('mes',$m)->get();
            foreach ($depositos as $dep) {
                $fecha = explode("-", $dep->fecha);
                $ews->setCellValue("D$row", $fecha[2] . "/" . $fecha[1] . "/" . $fecha[0]);
                $ews->setCellValue("E$row", $dep->total);
                $ews->setCellValue("F$row", $dep->concepto);
                $ews->getStyle("C$row:F$row")->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB("$colores[$m]");
                $row++;
            }
            $ews->getStyle("C$row:F$row")->getBorders()->getTop()->setBorderStyle(\PHPExcel_Style_Border::BORDER_MEDIUM);
            $m++;
            if($row2 == $row)
            $row++;
        }
        $row--;
        $ews->getStyle("B5:B$row")->getBorders()->getOutline()->setBorderStyle(\PHPExcel_Style_Border::BORDER_MEDIUM);
        $ews->getStyle("C5:C$row")->getBorders()->getOutline()->setBorderStyle(\PHPExcel_Style_Border::BORDER_MEDIUM);
        $ews->getStyle("D5:D$row")->getBorders()->getOutline()->setBorderStyle(\PHPExcel_Style_Border::BORDER_MEDIUM);
        $ews->getStyle("E5:E$row")->getBorders()->getOutline()->setBorderStyle(\PHPExcel_Style_Border::BORDER_MEDIUM);
        $ews->getStyle("F5:F$row")->getBorders()->getOutline()->setBorderStyle(\PHPExcel_Style_Border::BORDER_MEDIUM);
        $ews->getStyle("B5:B$row")->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FFD8E4BC');
        $ews->getStyle("F5:F$row")->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $ews->getStyle("D5:D$row")->getNumberFormat()->setFormatCode(\PHPExcel_Style_NumberFormat::FORMAT_DATE_DDMMYYYY);
        $ews->getStyle("E5:E$row")->getNumberFormat()->setFormatCode(\PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
        $ews->mergeCells("B5:B$row");
        $ews->setCellValue("B5", "2018");
        $ews->getStyle("B5")->getAlignment()->setTextRotation(90);
        $ews->getStyle('B5')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $ews->getStyle('B5')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $ews->getStyle('B5')->getFont()->setBold(true);
        $ews->getStyle("B5")->getFont()->setSize(26);  
//        $ews->getStyle("A4:A$row")->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FF4F6228');
//        $ews->getStyle("B4:L$row")->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FFC4D79B');
////        $ews->getStyle('B3:H4')->getBorders()->getOutline()->setBorderStyle(\PHPExcel_Style_Border::BORDER_MEDIUM);
//        $ews->getStyle('A4:L4')->getBorders()->getTop()->setBorderStyle(\PHPExcel_Style_Border::BORDER_MEDIUM);
//        $ews->getStyle("A$row:L$row")->getBorders()->getBottom()->setBorderStyle(\PHPExcel_Style_Border::BORDER_MEDIUM);
//        $ews->getStyle("A4:A$row")->getBorders()->getRight()->setBorderStyle(\PHPExcel_Style_Border::BORDER_MEDIUM);
//        $ews->getStyle("B4:L$row")->getFont()->setSize(12);
//        $ews->getStyle("B4:B$row")->getFont()->setBold(true);
//       ******************************  FACTURAS EMITIDAS *******************************
        $ea->createSheet(4);
        $ews = $ea->getSheet(4);
        $ews->setTitle("FAC. EMITIDAS");
        $ews->setCellValue("B3", "FACTURA");
        $ews->setCellValue("C3", "FECHA");
        $ews->setCellValue("D3", "NOMBRE");
        $ews->setCellValue("E3", "CONCEPTO");
        $ews->setCellValue("F3", "RFC");
        $ews->setCellValue("G3", "FORMA DE PAGO");
        $ews->setCellValue("H3", "MODO DE PAGO");
        $ews->setCellValue("I3", "SUB-TOTAL");
        $ews->setCellValue("J3", "IVA");
        $ews->setCellValue("K3", "TOTAL");
        $ews->setCellValue("L3", "STATUS");
        $ews->getStyle('B3:L3')->getFont()->setBold(true);
        $ews->getStyle('B3:L3')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $ews->getColumnDimension('A')->setWidth(3);
        $ews->getColumnDimension('B')->setWidth(10);
        $ews->getColumnDimension('C')->setWidth(13);
        $ews->getColumnDimension('D')->setWidth(41);
        $ews->getColumnDimension('E')->setWidth(79);
        $ews->getColumnDimension('F')->setWidth(18);
        $ews->getColumnDimension('G')->setWidth(30);
        $ews->getColumnDimension('H')->setWidth(23);
        $ews->getColumnDimension('I')->setWidth(13);
        $ews->getColumnDimension('J')->setWidth(13);
        $ews->getColumnDimension('K')->setWidth(14);
        $ews->getColumnDimension('L')->setWidth(24);
        $row = 4;
        $ews->freezePane('C4');
        $facturasE = FacturasEmitidas::all();
        foreach ($facturasE as $fE) {
            $ews->setCellValue("B$row", $fE->factura);
            $fecha = explode(" ", $fE->fecha);
            $fecha = explode("-", $fecha[0]);
            $ews->setCellValue("C$row", $fecha[2] . "/" . $fecha[1] . "/" . $fecha[0]);
            $ews->setCellValue("D$row", $fE->nombre);
            $ews->setCellValue("E$row", $fE->concepto);
            $ews->setCellValue("F$row", $fE->rfc);
            $ews->setCellValue("G$row", $fE->formaPago()->forma);
            $ews->setCellValue("H$row", $fE->modoPago()->modo);
            $ews->setCellValue("I$row", $fE->subtotal);
            $ews->setCellValue("J$row", $fE->iva);
            $ews->setCellValue("k$row", $fE->total);
            $ews->setCellValue("l$row", $fE->estFact()->estatus);
            $row++;
        }
        $row--;
        $ews->getStyle("B4:H$row")->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $ews->getStyle("C4:C$row")->getNumberFormat()->setFormatCode(\PHPExcel_Style_NumberFormat::FORMAT_DATE_DDMMYYYY);
        $ews->getStyle("I4:K$row")->getNumberFormat()->setFormatCode(\PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
        $ews->getStyle("A4:A$row")->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FF4F6228');
        $ews->getStyle("B4:L$row")->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FFC4D79B');
//        $ews->getStyle('B3:H4')->getBorders()->getOutline()->setBorderStyle(\PHPExcel_Style_Border::BORDER_MEDIUM);
        $ews->getStyle('A4:L4')->getBorders()->getTop()->setBorderStyle(\PHPExcel_Style_Border::BORDER_MEDIUM);
        $ews->getStyle("A$row:L$row")->getBorders()->getBottom()->setBorderStyle(\PHPExcel_Style_Border::BORDER_MEDIUM);
        $ews->getStyle("A4:A$row")->getBorders()->getRight()->setBorderStyle(\PHPExcel_Style_Border::BORDER_MEDIUM);
        $ews->getStyle("B4:L$row")->getFont()->setSize(12);
        $ews->getStyle("B4:B$row")->getFont()->setBold(true);
//       ****************************** CATÁLOGO DE PROYECTOS *******************************
        $ea->createSheet(5);
        $ews = $ea->getSheet(5);
        $ews->setTitle("CATÁLOGO DE PROYECTOS");
        $ews->setCellValue("B4", "2018");
        $ews->mergeCells('B4:J4');
        $ews->setCellValue("B5", "NÚMERO DE PROYECTO");
        $ews->setCellValue("C5", "FECHA INICIO");
        $ews->setCellValue("D5", "ESTATUS");
        $ews->setCellValue("E5", "FECHA TÉRMINO");
        $ews->setCellValue("F5", "CONTRATANTE");
        $ews->setCellValue("G5", "CONTRATADO");
        $ews->setCellValue("H5", "NÚMERO DE FACTURA");
        $ews->setCellValue("I5", "MONTO DE FACTURA");
        $ews->setCellValue("J5", "AVANCE");
        $ews->getStyle('B4:J5')->getFont()->setBold(true);
        $ews->getStyle("B4")->getFont()->setSize(14);
        $ews->getStyle("B5:J5")->getFont()->setSize(11);
        $ews->getStyle('B4:J5')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $ews->getStyle('B4')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FFC4D79B');
        $ews->getStyle('B5:J5')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FF76933C');
        $ews->getColumnDimension('B')->setWidth(20);
        $ews->getColumnDimension('C')->setWidth(17);
        $ews->getColumnDimension('D')->setWidth(18);
        $ews->getColumnDimension('E')->setWidth(14);
        $ews->getColumnDimension('F')->setWidth(13);
        $ews->getColumnDimension('G')->setWidth(13);
        $ews->getColumnDimension('H')->setWidth(20);
        $ews->getColumnDimension('I')->setWidth(20);
        $ews->getColumnDimension('J')->setWidth(20);
        $row = 6;
        $ccs = CatalogoCC::all();
        foreach ($ccs as $cc) {
            $ews->setCellValue("B$row", $cc->num);
            $fecha = explode("-", $cc->fecha_ini);
            $ews->setCellValue("C$row", $fecha[2] . "/" . $fecha[1] . "/" . $fecha[0]);
            $ews->setCellValue("D$row", $cc->estatus());
            $fechaT = explode("-", $cc->fecha_ini);
            $ews->setCellValue("E$row", $fechaT[2] . "/" . $fechaT[1] . "/" . $fechaT[0]);
            $ews->setCellValue("F$row", $cc->contratante);
            $ews->setCellValue("G$row", $cc->contratado);
            $ews->setCellValue("H$row", isset($cc->id_factura) ? $cc->factura()->num : '');
            $ews->setCellValue("I$row", isset($cc->id_factura) ? number_format($cc->factura()->importe) : '');
            $ews->setCellValue("J$row", number_format($cc->avance)."%");
            $row++;
        }
        $row--;
        $ews->getStyle("J6:J$row")->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
        $ews->getStyle("C6:C$row")->getNumberFormat()->setFormatCode(\PHPExcel_Style_NumberFormat::FORMAT_DATE_DDMMYYYY);
        $ews->getStyle("E6:E$row")->getNumberFormat()->setFormatCode(\PHPExcel_Style_NumberFormat::FORMAT_DATE_DDMMYYYY);
        $ews->getStyle("I6:I$row")->getNumberFormat()->setFormatCode(\PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);       
        $ews->getStyle("B6:J$row")->getFont()->setSize(12);
//       ******************************  CENTROS DE COSTOS POR PROYECTO *******************************
        $ccs = CatalogoCC::all();
        $h = 6;
        foreach ($ccs as $cc) {
            $ea->createSheet($h);
            $ews = $ea->getSheet($h);
            $ews->setTitle("CENTRO DE COSTOS #$cc->num");
            $ews->mergeCells('A2:K2');
            $ews->setCellValue("A2", "CENTRO DE COSTOS POR PROYECTO");
            $ews->mergeCells('A3:K4');
            $ews->setCellValue("A3", "PROYECTO $cc->num");
            $ews->setCellValue("A5", "Número de factura CIEET");
            $ews->setCellValue("B5", "Fecha de emision");
            $ews->setCellValue("C5", "Concepto");
            $ews->setCellValue("D5", "Partida");
            $ews->setCellValue("E5", "Método de pago");
            $ews->setCellValue("F5", "SUBTOTAL");
            $ews->setCellValue("G5", "IVA");
            $ews->setCellValue("H5", "IVA RETENIDO");
            $ews->setCellValue("I5", "ISR RETENIDO");
            $ews->setCellValue("J5", "OTRO");
            $ews->setCellValue("K5", "TOTAL");
            $ews->getStyle('A2:K5')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $ews->getStyle('A2:K5')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $ews->getStyle('A2:K4')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FFC4D79B');
            $ews->getStyle('A5:K7')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FF9BBB59');
            $ews->getStyle('A2')->getFont()->setBold(true);
            $ews->getStyle('A5:K5')->getFont()->setBold(true);
            $ews->getStyle('A5:K5')->getAlignment()->setWrapText(true);
            $ews->getStyle('A2')->getFont()->setSize(22);
            $ews->getStyle('A3')->getFont()->setSize(18);
            $ews->getStyle('A5:K5')->getFont()->setSize(16);
            $ews->getStyle('A2:K4')->getFont()->setName('Arial');
            $ews->getColumnDimension('A')->setWidth(30);
            $ews->getColumnDimension('B')->setWidth(24);
            $ews->getColumnDimension('C')->setWidth(23);
            $ews->getColumnDimension('D')->setWidth(29);
            $ews->getColumnDimension('E')->setWidth(19);
            $ews->getColumnDimension('F')->setWidth(15);
            $ews->getColumnDimension('G')->setWidth(13);
            $ews->getColumnDimension('H')->setWidth(13);
            $ews->getColumnDimension('I')->setWidth(16);
            $ews->getColumnDimension('J')->setWidth(18);
            $ews->getColumnDimension('K')->setWidth(18);
            $ews->getRowDimension('2')->setRowHeight(44);
            $ews->getRowDimension('3')->setRowHeight(21);
            $ews->getRowDimension('4')->setRowHeight(21);
            $ews->getRowDimension('5')->setRowHeight(50);
            $ews->getRowDimension('6')->setRowHeight(24);
            $ews->getRowDimension('7')->setRowHeight(23);
            $row = 8;
            $detCC = CentroCostosDetalle::where('id_cc', $cc->id)->get();
            foreach ($detCC as $dCC) {
                $fact = FacturasRecibidas::find($dCC->id_factura);
                $ews->setCellValue("A$row", $fact->num);
                $fecha = explode(" ", $fact->fecha);
                $fecha = explode("-", $fecha[0]);
                $ews->setCellValue("B$row", $fecha[2] . "/" . $fecha[1] . "/" . $fecha[0]);
                $ews->setCellValue("C$row", $fact->concepto);
                $ews->setCellValue("D$row", $dCC->partida()->codigo);
                $ews->setCellValue("E$row", $fact->formaPago()->forma);
                $ews->setCellValue("F$row", $fact->subtotal);
                $ews->setCellValue("G$row", $fact->iva);
                $ews->setCellValue("H$row", $fact->iva_retenido);
                $ews->setCellValue("I$row", $fact->iva_retenido);
                $ews->setCellValue("J$row", $fact->otro);
                $ews->setCellValue("K$row", $fact->importe);
                $row++;
            }
            $row--;
            $ews->getStyle("F8:K$row")->getNumberFormat()->setFormatCode(\PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
            $ews->getStyle("A8:D$row")->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $ews->getStyle("A8:K$row")->getFont()->setSize(12);
            $h++;
        }
        $ea->setActiveSheetIndex(0);
        $writer = \PHPExcel_IOFactory::createWriter($ea, 'Excel2007');
        header('Content-Type: application/vnd.ms-excel; charset=utf-8');
        header('Content-Disposition: attachment;filename="Formato.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

}
