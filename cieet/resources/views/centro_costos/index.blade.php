@extends('layouts.app2')
@section('title', 'Main page')
@section('content')
<div class='box box-header'> 
    <ol class="breadcrumb hidden-xs">
        <li><a href="#">Inicio</a></li>
        <li class="active">Detalle Centro de Costos</li>
    </ol>
    <header class="content__title">
        <h1 class="pull-left">Centro de Costos: Proyecto {{$cc->num}}</h1>
        <div class='actions'>
            <a class="btn btn-dark" style="margin-top: 25px" href="{{url('centroCostos/create/'.$cc->id)}}"><i class="fa fa-plus-square"></i>  Alta</a>
        </div>
    </header>
</div>
<div class="card">
    <div class="card-body">
        @if($facts->isEmpty())
        <div class="text-center">No hay facturas registradas para mostrar</div>
        @else
        @include('centro_costos.table')               
        @endif
    </div>
    <div class="card-body text-center">
        <a class="btn btn-danger" href="{{url('catalogo_cc/index')}}"><i class="fa fa-arrow-left"></i> Regresar</a>
    </div>
</div>
@endsection
