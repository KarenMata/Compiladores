
    

<div class="form-group ">
    <label for="nombre" class="control-label col-md-3 col-sm-3 col-xs-12">Nombre(s):</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingrese su Nombre','required','autofocus']) !!}
    </div>
</div>
  
<!--- Ap Paterno Field --->
<div class="form-group ">
    <label for="ap_paterno" class="control-label col-md-3 col-sm-3 col-xs-12">Apellido paterno:</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('ap_paterno',null,['class'=>'form-control','placeholder'=>'Ingrese su Apellido Paterno','required']) !!}
    </div>
</div>

<!--- Ap Materno Field --->
<div class="form-group ">
    <label for="ap_materno" class="control-label col-md-3 col-sm-3 col-xs-12">Apellido materno:</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('ap_materno',null,['class'=>'form-control','placeholder'=>'Ingrese su Apellido Materno','required']) !!}
    </div>
</div>

<!--- Fecha Nacimiento -->
<div class="form-group ">
    <label for="fecha_nac" class="control-label col-md-3 col-sm-3 col-xs-12">Fecha de Nacimiento:</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('fecha_nac',null,['class'=>'form-control datepicker','placeholder'=>'Fecha de nacimiento']) !!}
    </div>
</div>

<!--- Correo --->
<div class="form-group ">
    <label for="correo" class="control-label col-md-3 col-sm-3 col-xs-12">Correo:</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::email('correo',null,['class'=>'form-control','placeholder'=>'Ingrese un correo electr&oacute;nico','required']) !!}
    </div>
</div>

<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    <label for="password" class="control-label col-md-3 col-sm-3 col-xs-12">Contrase&ntilde;a:</label>
    <div class="col-md-6">
        {!! Form::password('password',['class'=>'form-control','placeholder'=>'Ingrese contrase&ntilde;a','required']) !!}
        @if ($errors->has('password'))
        <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
        @endif
    </div>
</div>

<div class="form-group">
    <label for="remember_token" class="control-label col-md-3 col-sm-3 col-xs-12">Confirme contrase&ntilde;a:</label>
    <div class="col-md-6">
        {!! Form::password('remember_token',['class'=>'form-control','placeholder'=>'Confirme contrase&ntilde;a','required','name'=>'remember_token']) !!}
    </div>
</div>

<!--- Dirección -->
<div class="form-group ">
    <label for="direccion" class="control-label col-md-3 col-sm-3 col-xs-12">Dirección:</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('direccion',null,['class'=>'form-control','placeholder'=>'Dirección','required']) !!}
    </div>
</div>

<!--- Fotografía --->
<div class="form-group ">
    <label for="fotografia" class="control-label col-md-3 col-sm-3 col-xs-12">Fotograf&iacute;a:</label>
    <div class="col-md-6 col-sm-6 col-xs-3">       
        {!! Form::file('fotografia',['class'=>'form-control','autofocus','accept'=>'image/*']) !!}
    </div>
</div>

<!--- Horario --->
<div class="form-group ">
    <label for="horario" class="control-label col-md-3 col-sm-3 col-xs-12">Horario:</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('horario',null,['class'=>'form-control','placeholder'=>'Ingrese un horario']) !!}
    </div>
</div>

<!--- Telefono -->
<div class="form-group ">
    <label for="telefono" class="control-label col-md-3 col-sm-3 col-xs-12">Teléfono:</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('telefono',null,['class'=>'form-control','placeholder'=>'Teléfono']) !!}
    </div>
</div>

<!--- Telefono -->
<div class="form-group ">
    <label for="puesto" class="control-label col-md-3 col-sm-3 col-xs-12">Puesto:</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('puesto',null,['class'=>'form-control','placeholder'=>'Puesto']) !!}
    </div>
</div>

<!--- Telefono -->
<div class="form-group ">
    <label for="ini_contrato" class="control-label col-md-3 col-sm-3 col-xs-12">Inicio contrato:</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('ini_contrato',null,['class'=>'form-control','placeholder'=>'Inicio contrato']) !!}
    </div>
</div>

<!--- Telefono -->
<div class="form-group ">
    <label for="fin_contrato" class="control-label col-md-3 col-sm-3 col-xs-12">Fin contrato:</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('fin_contrato',null,['class'=>'form-control','placeholder'=>'Fin contrato']) !!}
    </div>
</div>

<!--- Fotografía --->
<div class="form-group ">
    <label for="contrato" class="control-label col-md-3 col-sm-3 col-xs-12">Contrato:</label>
    <div class="col-md-6 col-sm-6 col-xs-3">       
        {!! Form::file('contrato',['class'=>'form-control','autofocus','accept'=>'jpg/*']) !!}
    </div>
</div>





<!--- Submit Field --->
<div class="form-group"> 
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i>  Guardar</button>
        <a class="btn btn-danger" href="{{url('/usuarios/usuarios')}}"><i class="fa fa-times"></i> Cancelar</a>
    </div>
</div>

<div class="form-group ">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <br>
        <br>
    </div>
</div>

</div>
     
     
