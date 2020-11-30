@extends('layouts.app2')

@section('title', 'Main page')

@section('content')
<div class='box box-header'> 
    <ol class="breadcrumb hidden-xs">
        <li><a href="#">Inicio</a></li>
        <li class="active">Facturas Recibidas</li>
    </ol>
    <header class="content__title">
        <h1 class="pull-left">Facturas Recibidas</h1>
        <div class='actions'>
            <a class="btn btn-dark" style="margin-top: 25px" href="{{url('facturas_recibidas/create')}}"><i class="fa fa-plus-square"></i>  Alta</a>
        </div>
    </header>
</div>
<div class="card">
    <div class="card-body">
        @if($fac_rec->isEmpty())
        <div class="text-center">No hay facturas registradas para mostrar</div>
        @else
        @include('facturas_recibidas.facturas_recibidas')               
        @endif
    </div>
</div>
@endsection