
    

<div class="form-group ">
    <label for="clave" class="control-label col-md-3 col-sm-3 col-xs-12">Clave:</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('clave',null,['class'=>'form-control','placeholder'=>'Clave','required','autofocus']) !!}
    </div>
</div>
  
<!--- Ap Paterno Field --->
<div class="form-group ">
    <label for="proyecto" class="control-label col-md-3 col-sm-3 col-xs-12">Proyecto:</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('proyecto',null,['class'=>'form-control','placeholder'=>'Nombre del proyecto','required']) !!}
    </div>
</div>

<!--- Ap Materno Field --->
<div class="form-group ">
    <label for="responsable" class="control-label col-md-3 col-sm-3 col-xs-12">Responsable:</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('responsable',null,['class'=>'form-control','placeholder'=>'Nombre del responsable','required']) !!}
    </div>
</div>

<!--- Fecha Nacimiento -->
<div class="form-group ">
    <label for="costo_directo" class="control-label col-md-3 col-sm-3 col-xs-12">Costo directo:</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('costo_directo',null,['class'=>'form-control','placeholder'=>'Costo directo']) !!}
    </div>
</div>

<!--- Correo --->
<div class="form-group ">
    <label for="hospedaje" class="control-label col-md-3 col-sm-3 col-xs-12">Hospedaje:</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('hospedaje',null,['class'=>'form-control','placeholder'=>'Hospedaje','required']) !!}
    </div>
</div>

<!--- Correo --->
<div class="form-group ">
    <label for="transporte" class="control-label col-md-3 col-sm-3 col-xs-12">Transporte:</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('transporte',null,['class'=>'form-control','placeholder'=>'Requiere transporte','required']) !!}
    </div>
</div>


<!--- Correo --->
<div class="form-group ">
    <label for="total_directo" class="control-label col-md-3 col-sm-3 col-xs-12">Total Directo:</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('total_directo',null,['class'=>'form-control','placeholder'=>'Total directo','required']) !!}
    </div>
</div>


<!--- Correo --->
<div class="form-group ">
    <label for="adquisiciones" class="control-label col-md-3 col-sm-3 col-xs-12">Adquisiciones:</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('adquisiciones',null,['class'=>'form-control','placeholder'=>'Adquisiciones','required']) !!}
    </div>
</div>


<!--- Correo --->
<div class="form-group ">
    <label for="total_estado" class="control-label col-md-3 col-sm-3 col-xs-12">Total por estado:</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('total_estado',null,['class'=>'form-control','placeholder'=>'Total por estado','required']) !!}
    </div>
</div>


<!--- Correo --->
<div class="form-group ">
    <label for="total" class="control-label col-md-3 col-sm-3 col-xs-12">Total:</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('total',null,['class'=>'form-control','placeholder'=>'Total','required']) !!}
    </div>
</div>




<!--- Submit Field --->
<div class="form-group"> 
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i>  Guardar</button>
        <a class="btn btn-danger" href="{{url('/costos')}}"><i class="fa fa-times"></i> Cancelar</a>
    </div>
</div>

<div class="form-group ">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <br>
        <br>
    </div>
</div>

</div>
     
     
