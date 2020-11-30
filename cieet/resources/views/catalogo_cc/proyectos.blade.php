@extends('layouts.app2')
@section('title', 'Main page')
@section('content')
<?php use App\Models\ParticipantesCC; ?>
<script src="{{asset('vendors/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js')}}"></script>
<script src="{{asset('demo/js/other-charts.js')}}"></script>
<div class='box box-header'> 
    <ol class="breadcrumb hidden-xs">
        <li><a href="#">Inicio</a></li>
        <li class="active">Proyectos</li>
    </ol>
    <header class="content__title">
        <h1 class="pull-left">Proyectos</h1>

    </header>
</div>

@if($catalogo_cc->isEmpty())
<div class="card">
    <div class="card-body">
        <div class="text-center">No hay centro de costos registrados para mostrar</div>
    </div>
</div>
@else
<?php $c = 0;?>
@foreach($catalogo_cc as $cc) 
<?php 
    $usuarios = ParticipantesCC::where('id_cc',$cc->id)->get(); 
    $colors = ['#007bff','#28a745','#17a2b8','#ffc107','#dc3545'];
?>
<div class="card">
    <div class="card-body">
        <div class="text-center" style="font-size: 20px"><b>Proyecto {{$cc->num}}</b></div><hr style="height: 1px; border-top: 1px solid  {{$colors[$c]}}">
        <div class="row notes">
            <div class="col-md-3 col-lg-3 notes__item">
                <table>
                    <tr><th style="font-size: 18px;">Nombre</th></tr>
                    <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$cc->nombre}}</td></tr>
                    <tr><th style="font-size: 18px;">Responsable</th></tr>
                    <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$cc->responsable()->nombreCompleto()}}</td></tr>
                    <tr><th style="font-size: 18px;">Estatus</th></tr>
                    <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$cc->estatus()}}</td></tr>
                    <tr><th style="font-size: 18px;">Inicio</th></tr>
                    <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{date_format (new DateTime($cc->fecha_ini), 'd/m/Y')}}</td></tr>
                    <tr><th style="font-size: 18px;">Término</th></tr>
                    <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{date_format (new DateTime($cc->fecha_fin), 'd/m/Y')}}</td></tr>
                </table>
            </div>
            <div class="col-md-3 col-lg-3 notes__item notes__item">
                <table>
                    <tr><th style="font-size: 18px;">Contratante</th></tr>
                    <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$cc->contratante}}</td></tr>
                    <tr><th style="font-size: 18px;">Contratado</th></tr>
                    <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$cc->contratado}}</td></tr>
                    <tr><th style="font-size: 18px;">Factura</th></tr>
                    <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ isset($cc->id_factura) ? $cc->factura()->num : 'Sin factura' }}</td></tr>                    
                    <tr><th style="font-size: 18px;">Monto factura</th></tr>
                    <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;${{isset($cc->id_factura) ? number_format($cc->factura()->importe,2) : '0.00'}}</td></tr>
                </table>
            </div>
            <div class="col-md-3 col-lg-3 notes__item notes__item text-center">
                <div style="font-size: 18px"><b>Avance</b></div>
                <div class="easy-pie-chart" data-percent="{{$cc->avance}}" data-size="200" data-track-color="rgba(0,0,0,0.5)" data-bar-color="{{$colors[$c]}}"
                     data-line-width="7" data-animate="4500">
                    <span class="easy-pie-chart__value">{{$cc->avance}}</span>
                </div>
            </div>
            <div class="col-md-3 col-lg-3 notes__item notes__item">
                <table class="dataTable table-condensed table-bordered table-hover" style="width: 100%" id='table_part'>
                    <thead>  
                        <tr>
                            <th style="text-align: center; font-size: 18px">
                                Participantes
                            </th>
                        </tr>
                    </thead>  
                    <tbody>  
                        @if($usuarios->isEmpty())
                        <tr>
                            <td style="text-align: center">
                                Sin participantes
                            </td>
                        </tr>
                        @else
                        @foreach($usuarios as $usuario)
                        <tr>
                            <td style="text-align: center; cursor: default" data-toggle="tooltip" data-html="true" data-placement="right" title='<img src="{{ asset(($usuario->participante()->fotografia!=null) ? 'img/usuarios/'.$usuario->participante()->fotografia : 'img/usuarios/default.png') }}" alt="usuario" style="width: 100px;">'>
                                {{ $usuario->participante()->nombreCompleto() }}
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $c++; if($c>4) $c = 0;?>
@endforeach
@endif
@endsection
