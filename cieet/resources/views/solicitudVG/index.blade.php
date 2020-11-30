@extends('layouts.app2')

@section('title', 'Main page')

@section('content')
<div class='box box-header'>
    <ol class="breadcrumb hidden-xs">
        <li><a href="#">Inicio</a></li>
        <li class="active">Solicitudes de viáticos y/o gasolina</li>
    </ol>
    <header class="content__title">
        <h1 class="pull-left">Solicitudes de viáticos y/o gasolina</h1>
        <div class='actions'>
            <a class="btn btn-dark" style="margin-top: 25px" href="{{url('solicitudVG/create')}}"><i class="fa fa-plus-square"></i>  Alta</a>
        </div>
    </header>
</div>
<div class="card">
    <div class="card-body">
        @if($solVG->isEmpty())
        <div class="text-center">No hay registros para mostrar</div>
        @else
        <div class="table-responsive">
            @include('solicitudVG.table')
        </div>                
        @endif
    </div>
</div>
@endsection