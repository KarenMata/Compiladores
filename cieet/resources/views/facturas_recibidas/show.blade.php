@extends('layouts.app2')
@section('title', 'Main page')
@section('content')
<section id="content" class="container">
    <!-- Breadcrumb -->
    <ol class="breadcrumb hidden-xs">
        <li><a href="#">Inicio</a></li>
        <li><a href="#">Facturas Recibidas</a></li>
        <li class="active">Detalle</li>
    </ol>

    <h4 class="page-title">Detalle Facturas Recibidas</h4>

    <div class="box box-default">

        <div class="box-header with-border">
            <h3 class="box-title">Ver registro de factura recibida: <span style="font-size: 18px;">{!! $fac_rec->num_fac !!} {!! $fac_rec->concepto !!}</span></h3>
        </div>

        <div class="box-body">        
            {!! Form::model($fac_rec,['route' =>['updateFR'],'method' => 'put', 'class'=>'form-horizontal','id'=>'form']) !!}
            @include('facturas_recibidas.show_fields')
            </form>
        </div>
    </div>
</section>
@endsection


