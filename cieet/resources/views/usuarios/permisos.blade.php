@extends('layouts.app2')
@section('title', 'Main page')
@section('content')
<section class="container">
<h4 class="page-title">PERMISOS DE {{$reportes->nombre}}</h4>
                
    <div class="box-body">
    	<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12" style="padding-bottom: 10px"><hr></div>
		</div>
    <form method="POST" action="{{url('usuarios/updatepermisos')}}" accept-charset="UTF-8" class="form-horizontal" id="form-usuarios" enctype="multipart/form-data">
     {{ csrf_field() }}

       <div class="row justify-content-md-center">
		    <input name="id" type="hidden" value="{{$reportes->id}}"
		    <div class="col-md-12 col-sm-12 col-xs-12 padd_extremos">
		        <label for="nombre">Permisos:</label>
		        <div>
		            <label class="custom-control custom-radio">
                        <input type="radio" name="permisosusuario" class="custom-control-input" value="administrador">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">Administrador</span>
                    </label>
                    <div class="clearfix mb-2"></div>
                    <label class="custom-control custom-radio">
                        <input type="radio" name="permisosusuario" class="custom-control-input" value="general">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">General</span>
                    </label>
                    <div class="clearfix mb-2"></div>
                    <label class="custom-control custom-radio">
                        <input type="radio" name="permisosusuario" class="custom-control-input" value="consulta">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">Consulta</span>
                    </label>
		        </div>
		    </div>
		</div>
		<div class="row" id="compras">
		    <div class="form-group col-md-6 col-sm-6 col-xs-12"> 
		        <div style="padding-top: 60px;">
		            <button type="submit" class="btn btn-primary"><i class="zmdi zmdi-floppy"></i>  Guardar</button>
		            <a class="btn btn-danger" href="{{url('/usuarios/index')}}"><i class="zmdi zmdi-close"></i> Cancelar</a>
		        </div>
		    </div>
		</div>

    </form>
    </div>
</section>
@endsection