@extends('layouts.app2')

@section('title', 'Main page')

@section('content')
    <div class="box box-default">
    
    <div class='box box-header'>
        <h1 class="pull-left">Costos</h1>
        <a class="btn btn-default pull-right" style="margin-top: 25px" href="{{url('costos/create')}}"><i class="fa fa-plus-square"></i>  Alta</a>
    </div>
    <div class="row">
    </div>
    <div class='box-body'>
            @if($usuarios->isEmpty())
                <div class="well text-center">No hay registros para mostrar</div>
            @else
            <div class="table-responsive">
                    @include('costos.costos')
                </div>                
            @endif
        </div>
    </div>
@endsection