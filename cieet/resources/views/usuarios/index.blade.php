@extends('layouts.app2')
@section('title', 'Main page')
@section('content')
<div class='box box-header'> 
    <ol class="breadcrumb hidden-xs">
        <li><a href="#">Inicio</a></li>
        <li class="active">Usuarios</li>
    </ol>
    <header class="content__title">
        <h1 class="pull-left">Usuarios</h1>
        <div class='actions'>
            <a class="btn btn-dark" style="margin-top: 25px" href="{{url('usuarios/create')}}"><i class="fa fa-plus-square"></i>  Alta</a>
        </div>
    </header>
</div>
<div class="card">
    <div class="card-body">
        @if($usuarios->isEmpty())
        <div class="well text-center">No hay usuarios registrados para mostrar</div>
        @else
        @include('usuarios.table')               
        @endif
    </div>
</div>
<div class="modal fade" id="modal-small" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form method="POST" action="{{url('usuarios/change_pass')}}" accept-charset="UTF-8" class="form-horizontal" id="form_changepass" enctype="multipart/form-data">
                {{ csrf_field() }}
            <div class="modal-header">
                <h5 class="modal-title pull-left">Cambiar contraseña</h5>
            </div>
            <div class="modal-body">
                    <input id="id"  name="id" type="hidden" Class="form-control" required />
                    <div class="col-md-11 col-sm-11 col-xs-12 padd_extremos">
                        <label for="password">Contrase&ntilde;a nueva:</label>
                        <div>
                            <input id="password"  name="password" type="Password" Class="form-control" required />
                        </div>
                        <div id="strengthMessage"></div>
                    </div>
                    <div class="col-md-11 col-sm-11 col-xs-12 padd_extremos">
                        <label for="remember_token">Confirme contrase&ntilde;a:</label>
                        <div>
                            <input id="remember_pass" name="remember_pass" type="Password" Class="form-control" required/>
                        </div>
                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-link">Save changes</button>
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
