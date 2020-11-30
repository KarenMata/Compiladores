@extends('layouts.app2')
@section('title', 'Main page')
@section('content')
<div class='box box-header'> 
    <ol class="breadcrumb hidden-xs">
        <li><a href="#">Inicio</a></li>
        <li class="active">Catálogo de CC</li>
    </ol>
    <header class="content__title">
        <h1 class="pull-left">Catálogo de CC</h1>
        <div class='actions'>
            <a class="btn btn-dark" style="margin-top: 25px" href="{{url('catalogo_cc/create')}}"><i class="fa fa-plus-square"></i>  Alta</a>
        </div>
    </header>
</div>
<div class="card">
    <div class="card-body">
        @if($catalogo_cc->isEmpty())
        <div class="text-center">No hay centro de costos registrados para mostrar</div>
        @else
        @include('catalogo_cc.table')               
        @endif
    </div>
</div>
@endsection
