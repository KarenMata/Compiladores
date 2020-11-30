@extends('layouts.app2')
@section('title', 'Bancos')
@section('content')
<section class="container">
<!-- Breadcrumb -->
    <h4 class="page-title"></h4>
                
    <div class="box-body">
    <form method="POST" action="{{url('bancos/update')}}" accept-charset="UTF-8" class="form-horizontal" id="form" enctype="multipart/form-data">
{{ csrf_field() }}

<div class="row justify-content-md-center" id="compras">
	<div class="col-md-12 col-sm-12 col-xs-12"><h2>EDIT MOVIMIENTO</h2></div>
	<div class="col-md-12 col-sm-12 col-xs-12" style="padding-bottom: 60px"><hr></div>
    <input type="hidden" name="banco" value="{{$movimientos->banco}}">
    <input type="hidden" name="id" value="{{$movimientos->id}}">
    <div class="col-md-3 col-sm-3 col-xs-12 col-md-offset-4padd_extremos" style="padding-bottom: 40px">
        <label for="tipo">Tipo:</label>
        <div>
            <select class="form-control" name="tipo" id="tipo" required onchange="tiporegistro();">
                <option>Selecciona...</option>
                @if($movimientos->tipo=='ingreso')
                    <option value="ingreso" selected>Ingreso</option>
                    <option value="egreso">Egreso</option>
                @endif
                @if($movimientos->tipo=='egreso')
                    <option value="ingreso">Ingreso</option>
                    <option value="egreso" selected>Egreso</option>
                @endif
            </select>
        </div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-12 col-md-offset-4padd_extremos" style="padding-bottom: 40px">
        <label for="tipo">Movimiento:</label>
        <div>
            <select class="form-control" name="movimiento" id="movimiento" required onchange="tipomovimiento();">
                <option>Selecciona...</option>
                @if($movimientos->tipo=='ingreso')
                    @if($movimientos->movimiento=='factura')
                    <option value="factura" selected>Factura</option>
                    <option value="deposito">Deposito</option>
                    <option value="transferencia">Transferencia</option>
                    @elseif($movimientos->movimiento=='deposito')
                    <option value="factura">Factura</option>
                    <option value="deposito" selected>Deposito</option>
                    <option value="transferencia">Transferencia</option>
                    @elseif($movimientos->movimiento=='transferencia')
                    <option value="factura">Factura</option>
                    <option value="deposito">Deposito</option>
                    <option value="transferencia" selected>Transferencia</option>
                    @endif
                @elseif($movimientos->tipo=='egreso')
                    @if($movimientos->movimiento=='factura')
                    <option value="factura" selected>Factura</option>
                    <option value="transferencia">Transferencia</option>
                    @elseif($movimientos->movimiento=='transferencia')
                    <option value="factura">Factura</option>
                    <option value="transferencia" selected>Transferencia</option>
                    @endif
                @endif
                
            </select>
        </div>
    </div>
    @if($movimientos->tipo=='ingreso')
        @if($movimientos->movimiento=='factura')
        <div class="col-md-3 col-sm-3 col-xs-12 padd_extremos" id="facturasemitidas">
            <label for="factura_emitida">Facturas:</label>
            <div>
                <select class="form-control SelectAuto" name="factura_emitida" id="factura_emitida" required onchange="getFactura(this.value);" placeholder='Selecciona la factura...'>
                    <option>Selecciona...</option>
                    <option value="{{$movimientos->factura}}" selected>{{$factura}}</option>
                    @foreach($facturasE2 as $facturas)
                        <option value="{{$facturas->id}}">{{$facturas->factura}}</option>
                    @endforeach

                </select>
            </div>
        </div>
        @else
        <div class="col-md-3 col-sm-3 col-xs-12 padd_extremos" style="display: none;" id="facturasemitidas">
            <label for="factura_emitida">Facturas:</label>
            <div >
                {!! Form::select('factura_emitida',$facturasE,null,['class'=>'form-control SelectAuto','onchange'=>'getFactura(this.value)','placeholder'=>'Selecciona la factura...','required']) !!}
            </div>
        </div>
        @endif
    @elseif($movimientos->tipo=='egreso')
        @if($movimientos->movimiento=='factura')
        <div class="col-md-3 col-sm-3 col-xs-12 padd_extremos" id="facturasrecibidas">
            <label for="factura_recibida">Facturas:</label>
            <div >
                <select class="form-control SelectAuto" name="factura_recibida" id="factura_recibida" required onchange="getFactura(this.id);" placeholder='Selecciona la factura...'>
                    <option>Selecciona...</option>
                    <option value="{{$movimientos->factura}}" selected>{{$factura}}</option>
                    @foreach($facturasR2 as $facturar)
                        <option value="{{$facturar->id}}">{{$facturar->factura}}</option>
                    @endforeach

                </select>
            </div>
        </div>
        @else
        <div class="col-md-3 col-sm-3 col-xs-12 padd_extremos" style="display: none;" id="facturasrecibidas">
            <label for="factura_recibida">Facturas:</label>
            <div >
                {!! Form::select('factura_recibida',$facturasR,null,['class'=>'form-control SelectAuto','onchange'=>'getFactura(this.id)','placeholder'=>'Selecciona la factura...','required']) !!}
            </div>
        </div>
        @endif
    @endif
    <div class="col-md-3 col-sm-3 col-xs-12 padd_extremos">
        <label for="fecha_sol">Fecha:</label>
        <div >
            {!! Form::date('fecha_reg',$movimientos->fecha,['class'=>'form-control','placeholder'=>'Ingresa fecha de registro','required']) !!}
        </div>
    </div>
    @if($movimientos->banco=='Banorte')
    <div class="col-md-3 col-sm-3 col-xs-12 col-md-offset-4padd_extremos" style="padding-bottom: 40px">
        <label for="subcuenta">Subcuenta:</label>
        <div>
            <select class="form-control" name="subcuenta" id="subcuenta" required>
                <option>Selecciona...</option>
                @foreach($banorte as $banco)
                    @if($movimientos->subcuenta==$banco->cuenta)
                        <option value="{{$banco->cuenta}}" selected>{{$banco->cuenta}}</option>
                    @else
                        <option value="{{$banco->cuenta}}">{{$banco->cuenta}}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>
    @endif
    <div class="col-md-3 col-sm-3 col-xs-12 col-md-offset-4padd_extremos" style="padding-bottom: 40px">
        <label for="fecha_sol">No. de cheque:</label>
        <div>
            {!! Form::number('no_cheque',$movimientos->no_cheque,['class'=>'form-control','placeholder'=>'Numero de cheque','autofocus']) !!}
        </div>
    </div>
    <div class="form-group col-md-4 col-sm-4 col-xs-12 padd_extremos">
        <label for="nombre">Nombre:</label>
        <div >
            {!! Form::text('nombre',$movimientos->nombre,['class'=>'form-control','placeholder'=>'Nombre de registro','required','autofocus']) !!}
        </div>
    </div>
    <div class="form-group col-md-4 col-sm-4 col-xs-12 padd_extremos">
        <label for="concepto">Concepto:</label>
        <div >
            {!! Form::text('concepto',$movimientos->concepto,['class'=>'form-control','placeholder'=>'Ingrese el concepto','required','autofocus']) !!}
        </div>
    </div>
    <div class="form-group col-md-3 col-sm-3 col-xs-12 padd_extremos">
        <label for="cantidad">Cantidad:</label>
        <div >
            @if($movimientos->cantidad<0)
            {!! Form::text('cantidad',$movimientos->cantidad*-1,['class'=>'form-control','placeholder'=>'Ingrese la cantidad','required','autofocus']) !!}
            @else
            {!! Form::text('cantidad',$movimientos->cantidad,['class'=>'form-control','placeholder'=>'Ingrese la cantidad','required','autofocus']) !!}
            @endif
        </div>
    </div>
</div>
<div class="row justify-content-md-center" id="compras">
    <div class="form-group col-md-6 col-sm-6 col-xs-12"> 
        <div style="text-align: center;padding-top: 60px;">
            <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i>  Guardar</button>
            <a class="btn btn-danger" href="{{url('/bancos/index')}}"><i class="fa fa-times"></i> Cancelar</a>
        </div>
    </div>
</div>

</form>
    </div>
</section>
@endsection