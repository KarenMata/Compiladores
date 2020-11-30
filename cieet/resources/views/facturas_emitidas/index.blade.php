@extends('layouts.app2')

@section('title', 'Main page')

@section('content')
<div class='box box-header'> 
    <ol class="breadcrumb hidden-xs">
        <li><a href="#">Inicio</a></li>
        <li class="active">Facturas Emitidas</li>
    </ol>
    <header class="content__title">
        <h1 class="pull-left">Facturas Emitidas</h1>
        <div class='actions'>
            <a class="btn btn-dark" style="margin-top: 25px" href="{{url('facturasEmitidas/create')}}"><i class="fa fa-plus-square"></i>  Alta</a>
        </div>
    </header>
</div>
<div class="card">
    <div class="card-body">
        @if($facts->isEmpty())
        <div class="text-center">No hay facturas registradas para mostrar</div>
        @else
        @include('facturas_emitidas.table')               
        @endif
    </div>
</div>
@endsection