@extends('layouts.app2')

@section('title', 'Main page')

@section('content')
<div class='box box-header'> 
    <ol class="breadcrumb hidden-xs">
        <li><a href="#">Inicio</a></li>
        <li class="active">Depósitos</li>
    </ol>
    <header class="content__title">
        <h1 class="pull-left">Depósitos</h1>
        <div class='actions'>
            <a class="btn btn-dark" style="margin-top: 25px" href="{{url('depositos/create')}}"><i class="fa fa-plus-square"></i>  Alta</a>
        </div>
    </header>
</div>
<div class="card">
    <div class="card-body">
        @if($depositos->isEmpty())
        <div class="text-center">No hay depósitos registrados para mostrar</div>
        @else
        @include('depositos.table')               
        @endif
    </div>
</div>
@endsection