<div class="row justify-content-md-center">
    
    @if(isset($usuario))<input name="id" type="hidden" value="{{$usuario->id}}"/> @endif
    <div class="col-md-3 col-sm-3 col-xs-12 padd_extremos">
        <label for="nombre">Nombre(s):</label>
        <div>
            {!! Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingrese su Nombre','required','autofocus']) !!}
        </div>
    </div>
      
    <!-- Ap Paterno Field -->
    <div class="col-md-3 col-sm-3 col-xs-12 padd_extremos">
        <label for="ap_paterno">Apellido paterno:</label>
        <div>
            {!! Form::text('ap_paterno',null,['class'=>'form-control','placeholder'=>'Ingrese su Apellido Paterno','required']) !!}
        </div>
    </div>

    <!-- Ap Materno Field -->
    <div class="col-md-3 col-sm-3 col-xs-12 padd_extremos">
        <label for="ap_materno">Apellido materno:</label>
        <div>
            {!! Form::text('ap_materno',null,['class'=>'form-control','placeholder'=>'Ingrese su Apellido Materno','required']) !!}
        </div>
    </div>

    <!-- Fecha Nacimiento -->
    <div class="col-md-3 col-sm-3 col-xs-12 padd_extremos">
        <label for="fecha_nac">Fecha de Nacimiento:</label>
        <div>
            {!! Form::date('fecha_nac',null,['class'=>'form-control','placeholder'=>'Fecha de nacimiento']) !!}
        </div>
    </div>

    <!-- Correo -->
    <div class="col-md-3 col-sm-3 col-xs-12 padd_extremos">
        <label for="correo">Correo:</label>
        <div>
            {!! Form::email('correo',null,['class'=>'form-control','placeholder'=>'Ingrese un correo electr&oacute;nico','required','onblur'=>"verificaCorreoEdit('$usuario->correo')",'id'=>'correo']) !!}
        </div>
    </div>
    <!-- Dirección -->
    <div class="col-md-3 col-sm-3 col-xs-12 padd_extremos">
        <label for="direccion">Dirección:</label>
        <div>
            {!! Form::text('direccion',null,['class'=>'form-control','placeholder'=>'Dirección','required']) !!}
        </div>
    </div>

    <!-- Horario -->
    <div class="col-md-3 col-sm-3 col-xs-12 padd_extremos">
        <label for="horario">Horario:</label>
        <div>
            {!! Form::text('horario',null,['class'=>'form-control','placeholder'=>'Ingrese un horario']) !!}
        </div>
    </div>

    <!-- Telefono -->
    <div class="col-md-3 col-sm-3 col-xs-12 padd_extremos">
        <label for="telefono">Teléfono:</label>
        <div>
            {!! Form::text('telefono',null,['class'=>'form-control','placeholder'=>'Teléfono']) !!}
        </div>
    </div>

    <!-- Telefono -->
    <div class="col-md-3 col-sm-3 col-xs-12 padd_extremos">
        <label for="puesto">Puesto:</label>
        <div>
            {!! Form::text('puesto',null,['class'=>'form-control','placeholder'=>'Puesto']) !!}
        </div>
    </div>
    <!-- Telefono -->
    <div class="col-md-3 col-sm-3 col-xs-12 padd_extremos">
        <label for="ini_contrato">Inicio contrato:</label>
        <div>
            {!! Form::date('ini_contrato',null,['class'=>'form-control','placeholder'=>'Inicio contrato']) !!}
        </div>
    </div>

    <!-- Telefono -->
    <div class="col-md-3 col-sm-3 col-xs-12 padd_extremos">
        <label for="fin_contrato">Fin contrato:</label>
        <div>
            {!! Form::date('fin_contrato',null,['class'=>'form-control','placeholder'=>'Fin contrato']) !!}
        </div>
    </div>
    <!-- Fotografía -->
    <div class="col-md-4 col-sm-4 col-xs-12 padd_extremos">
        <label for="contrato">Contrato:</label>
        <div>       
            {!! Form::file('contrato',['class'=>'form-control','autofocus','accept'=>'doc,docx,application/pdf']) !!}
        </div>
    </div>

    <!-- Fotografía -->
    <div class="col-md-4 col-sm-4 col-xs-12 padd_extremos">
        <label for="fotografia">Fotograf&iacute;a:</label>
        <div>       
            {!! Form::file('fotografia',['class'=>'form-control','autofocus','accept'=>'image/*']) !!}
        </div>
        <div class="row lightbox photos justify-content-md-center">
            <a href="{{url('img/usuarios/'.$fotografia)}}" class="col-md-10 col-4">
                <div class="lightbox__item photos__item">
                    <img src="{{url('img/usuarios/'.$fotografia)}}" alt="">
                </div>
            </a>
        </div>
    </div>
</div>
<div class="row justify-content-md-center" id="compras">
    <div class="form-group col-md-6 col-sm-6 col-xs-12"> 
        <div style="text-align: center;padding-top: 60px;">
            <button type="submit" class="btn btn-primary"><i class="zmdi zmdi-floppy"></i>  Guardar</button>
            <a class="btn btn-danger" href="{{url('/usuarios/index')}}"><i class="zmdi zmdi-close"></i> Cancelar</a>
        </div>
    </div>
</div>
     
     
