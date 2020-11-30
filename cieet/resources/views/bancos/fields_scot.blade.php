<div class="row justify-content-md-center" id="compras">
	<div class="col-md-12 col-sm-12 col-xs-12"><h2>NUEVO MOVIMIENTO EN BANCO SCOTIABANK</h2></div>
	<div class="col-md-12 col-sm-12 col-xs-12" style="padding-bottom: 60px"><hr></div>
	<input type="hidden" name="banco" value="Scotiabank">
    <div class="col-md-3 col-sm-3 col-xs-12 col-md-offset-4padd_extremos" style="padding-bottom: 40px">
        <label for="tipo">Tipo:</label>
        <div>
            <select class="form-control" name="tipo" id="tipo" required onchange="tiporegistro();">
                <option selected>Selecciona...</option>
                <option value="ingreso">Ingreso</option>
                <option value="egreso">Egreso</option>
            </select>
        </div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-12 col-md-offset-4padd_extremos" style="padding-bottom: 40px">
        <label for="tipo">Movimiento:</label>
        <div id="tipomovimiento">
            <select class="form-control" name="movimiento" id="movimiento" required onchange="tipomovimiento();">
                <option selected>Selecciona...</option>
            </select>
        </div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-12 padd_extremos" style="display: none;" id="facturasemitidas">
        <label for="factura_emitida">Facturas:</label>
        <div >
            {!! Form::select('factura_emitida',$facturasE,null,['class'=>'form-control SelectAuto','onchange'=>'getFactura(this.value)','placeholder'=>'Selecciona la factrura...']) !!}
        </div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-12 padd_extremos" style="display: none;" id="facturasrecibidas">
        <label for="factura_recibida">Facturas:</label>
        <div >
            {!! Form::select('factura_recibida',$facturasR,null,['class'=>'form-control SelectAuto','onchange'=>'getFactura(this.id)','placeholder'=>'Selecciona la factrura...']) !!}
        </div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-12 padd_extremos">
        <label for="fecha_sol">Fecha:</label>
        <div >
            {!! Form::date('fecha_reg',null,['class'=>'form-control','placeholder'=>'Ingresa fecha de registro','required']) !!}
        </div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-12 col-md-offset-4padd_extremos" style="padding-bottom: 40px">
        <label for="fecha_sol">No. de cheque:</label>
        <div class="nombre_sol">
            {!! Form::number('no_cheque',null,['class'=>'form-control','placeholder'=>'Numero de cheque','autofocus']) !!}
        </div>
    </div>
    <div class="form-group col-md-4 col-sm-4 col-xs-12 padd_extremos">
        <label for="nombre">Nombre:</label>
        <div >
            {!! Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Nombre de registro','required','autofocus','id'=>'nombre_registro']) !!}
        </div>
    </div>
    <div class="form-group col-md-4 col-sm-4 col-xs-12 padd_extremos">
        <label for="concepto">Concepto:</label>
        <div >
            {!! Form::text('concepto',null,['class'=>'form-control','placeholder'=>'Ingrese el concepto','required','autofocus','id'=>'concepto_registro']) !!}
        </div>
    </div>
    <div class="form-group col-md-4 col-sm-4 col-xs-12 padd_extremos">
        <label for="concepto">Cantidad:</label>
        <div >
            {!! Form::text('cantidad',null,['class'=>'form-control','placeholder'=>'Ingrese la cantidad','required','autofocus','id'=>'cantidad']) !!}
        </div>
    </div>
    <div class="form-group col-md-6 col-sm-6 col-xs-12"> 
        <div style="text-align: center;padding-top: 60px;">
            <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i>  Guardar</button>
            <a class="btn btn-danger" href="{{url('/bancos/index')}}"><i class="fa fa-times"></i> Cancelar</a>
        </div>
    </div>
</div>