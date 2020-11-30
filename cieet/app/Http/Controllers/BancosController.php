<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bancos;
use App\Models\MovimientosBancos;
use Illuminate\Support\Facades\Session;
use App\Models\FacturasEmitidas;
use App\Models\FacturasRecibidas;
use Config;

class BancosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Config::set('app.banco','myval');
        $egresosBan[]=0;
        $ingresosBan[]=0;
        $saldoBan[]=0;
        $ingresosB=0;
        $egresosB=0;
        $egresosS=0;
        $ingresosS=0;
        $banorte=MovimientosBancos::where('banco','Banorte')->orderBy('fecha','DESC')->get();
        $scotia=MovimientosBancos::where('banco','Scotiabank')->orderBy('fecha','DESC')->get();
        $banorteCuentas=Bancos::where('banco','Banorte')->get();
        foreach ($banorteCuentas as $cuentas){
            foreach ($banorte as $bnte) {
                if ($cuentas->cuenta==$bnte->subcuenta){
                    if ($bnte->cantidad<0) {
                        $egresosB=$egresosB-$bnte->cantidad;
                    }else{
                        $ingresosB=$ingresosB+$bnte->cantidad;
                    }
                }
                
            }
            $ingresosBan[$cuentas->cuenta]=$ingresosB;
            $egresosBan[$cuentas->cuenta]=$egresosB;
            $saldoBan[$cuentas->cuenta]=$ingresosB-$egresosB;
            $ingresosB=0;
            $egresosB=0;
        }
        foreach ($scotia as $scot) {
            if ($scot->cantidad<0) {
                $egresosS=$egresosS-$scot->cantidad;
            }else{
                $ingresosS=$ingresosS+$scot->cantidad;  
            }
        }
        $saldoS=MovimientosBancos::where('banco','Scotiabank')->orderBy('id','DESC')->first();
        
        $saldos['egresosS']=$egresosS;
        $saldos['ingresosS']=$ingresosS;
        if ($saldoS) {
            $saldos['saldoS']=$ingresosS-$egresosS;
        }else{$saldos['saldoS']=0;}
        
        
        return view('bancos.index',compact('banorte','scotia','saldos','banorteCuentas','ingresosBan','egresosBan','saldoBan'));
    }

    public function datosFactura(Request $request)
    {
        $data=$request->all();
        $facturas=FacturasEmitidas::where('id',$data['id'])->first();
        return $facturas;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $banco='';
        $banorte='';
        if ($id==1) {
            $banco='scot';
        }elseif($id==2){
            $banco='banorte';
            $banorte=Bancos::where('banco','Banorte')->get();

        }
        $facturasE=FacturasEmitidas::where('mov_id',0)->orWhereNull('mov_id')->orderBy('factura','DESC')->pluck('factura','id');
        $facturasR=FacturasRecibidas::where('mov_id',0)->orWhereNull('mov_id')->orderBy('num_factura','DESC')->pluck('num','id');
        return view('bancos.create')
            ->with('banco',$banco)
            ->with('banorte',$banorte)
            ->with('facturasE',$facturasE)
            ->with('facturasR',$facturasR);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->all();
        $total=0;
        $factura_id='';
        if ($data['banco']=='Scotiabank') {
            $movimientos=MovimientosBancos::where('banco','Scotiabank')->orderBy('id', 'DESC')->first();
        }else{
            $movimientos=MovimientosBancos::where('banco','Banorte')->orderBy('id', 'DESC')->first();
        }
        if (isset($movimientos)){
            if ($data['tipo']=='ingreso') {
                $total=$movimientos->total+$data['cantidad'];
                $cantidad=$data['cantidad'];
            }elseif($data['tipo']=='egreso'){
                $total=$movimientos->total-$data['cantidad'];
                $cantidad=$data['cantidad']*(-1);
            }
            
        }else{
            if ($data['tipo']=='ingreso') {
                $total=$data['cantidad'];
                $cantidad=$data['cantidad'];
            }elseif($data['tipo']=='egreso'){
                $cantidad=$data['cantidad']*(-1);
                $total=$data['cantidad']*(-1);
            }
        }
        //dd($movimientos);
        if ($data['banco']=='Scotiabank') {
            $subcuenta='';
        }else{
            $subcuenta=$data['subcuenta'];
        }

        if (isset($data['factura_recibida'])) {
            $factura_id=$data['factura_recibida'];
        }
        if (isset($data['factura_emitida'])) {
            $factura_id=$data['factura_emitida'];
        }
        $registro=MovimientosBancos::create([
                'tipo' => $data['tipo'],
                'movimiento' => $data['movimiento'],
                'fecha' => $data['fecha_reg'],         
                'banco' => $data['banco'],                 
                'subcuenta' => $subcuenta, 
                'no_cheque' => $data['no_cheque'], 
                'nombre' => $data['nombre'],  
                'concepto' => $data['concepto'],         
                'cantidad' => $cantidad,                 
                'total' => $total,   
                'fecha_registro' => date('Y-m-d H:i:s'),
                'factura' => $factura_id
            ]);
        if ($data['tipo']=='factura') {
            $facturas= FacturasEmitidas::where('factura',$factura_id)->first();
            $facturas->mov_id=$registro->id;
            $facturas->save();
        }
        

        if($registro){            
            Session::flash('tituloMsg','Guardado exitoso!');
            Session::flash('mensaje',"Se ha guardado exitosamente el registro.");
            Session::flash('tipoMsg','success');
        }
        else{
            Session::flash('tituloMsg','Guardado fallido!');
            Session::flash('mensaje',"No se ha guardar el registro.");
            Session::flash('tipoMsg','error');
        }
        if ($data['banco']=='Banorte'){
            Session::flash('banco','Banorte');
            Session::flash('subcuenta',$subcuenta);
        }elseif($data['banco']=='Scotiabank'){
            Session::flash('banco','Scotiabank');
        }
        return redirect('bancos/index');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movimientos=MovimientosBancos::where('id', $id)->first();
        return view('bancos.show',compact('movimientos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movimientos=MovimientosBancos::where('id', $id)->first();
        $factura='';
        if ($movimientos->tipo=='ingreso') {
            if ($movimientos->movimiento=='factura') {
                $factura=FacturasEmitidas::where('id', $movimientos->factura)->first();
                $factura=$factura->factura;
            }
        }elseif ($movimientos->tipo=='egreso') {
            if ($movimientos->movimiento=='factura') {
                $factura=FacturasRecibidas::where('id', $movimientos->factura)->first();
                $factura=$factura->factura;
            }
        }
        $facturasE=FacturasEmitidas::where('mov_id',0)->orWhereNull('mov_id')->orderBy('factura','DESC')->pluck('factura','id');
        $facturasR=FacturasRecibidas::where('mov_id',0)->orWhereNull('mov_id')->orderBy('num_factura','DESC')->pluck('num_factura','id');
        $facturasE2=FacturasEmitidas::where('mov_id',0)->orWhereNull('mov_id')->orderBy('factura','DESC')->get();
        $facturasR2=FacturasRecibidas::where('mov_id',0)->orWhereNull('mov_id')->orderBy('num_factura','DESC')->get();
        $banorte=Bancos::where('banco','Banorte')->get();
        return view('bancos.edit',compact('movimientos','banorte','facturasE','facturasR','factura','facturasE2','facturasR2'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data=$request->all();
        $factura_id='';
        if (isset($data['factura_recibida'])) {
            $factura_id=$data['factura_recibida'];
        }
        if (isset($data['factura_emitida'])) {
            $factura_id=$data['factura_emitida'];
        }

        $movimientos= MovimientosBancos::where('id',$data['id'])->first();
        //Actualizacion de factura
        if ($movimientos->factura==$factura_id) {
            
        }else{
            $facturas= FacturasEmitidas::where('id',$movimientos->factura)->first();
            $facturas->mov_id='';
            $facturas->save();
            $movimientos->factura=$factura_id;
            $facturas2= FacturasEmitidas::where('id',$factura_id)->first();
            $facturas2->mov_id=$data['id'];
            $facturas2->save();
        }
        //cantidad
        if ($data['tipo']=='ingreso') {
                $cantidad=$data['cantidad'];
        }elseif($data['tipo']=='egreso'){
                $cantidad=$data['cantidad']*(-1);
        }
        if ($movimientos->banco=='Scotiabank') {
            $subcuenta='';
        }else{
            $subcuenta=$data['subcuenta'];
        }
        $movimientos->tipo = $data['tipo'];
        $movimientos->movimiento = $data['movimiento'];
        $fecha = explode('/',$data['fecha_reg']);
        $movimientos->fecha = $fecha[2].'-'.$fecha[1].'-'.$fecha[0];
        $movimientos->banco = $data['banco'];
        $movimientos->subcuenta = $subcuenta;
        $movimientos->no_cheque = $data['no_cheque'];
        $movimientos->nombre = $data['nombre'];
        $movimientos->concepto = $data['concepto'];
        $movimientos->cantidad = $cantidad;
        $movimientos->fecha_registro = date('Y-m-d H:i:s');
        $movimientos->save();
        Session::flash('banco',$data['banco']);
        return redirect('bancos/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar($id)
    {
        $movimientos= MovimientosBancos::where('id',$id)->first();
        Session::flash('banco',$movimientos->banco);
        $movimientos=MovimientosBancos::where('id', $id)->delete();
        return redirect('bancos/index')->with('banco', 'banorte');
    }
}
