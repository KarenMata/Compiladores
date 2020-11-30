@extends('layouts.app2')
@section('title', 'Main page')
@section('content')
<section id="content" class="container">
    <!-- Breadcrumb -->
    <ol class="breadcrumb hidden-xs">
        <li><a href="#">Inicio</a></li>
        <li><a href="#">Facturas Recibidas</a></li>
        <li class="active">Edición</li>
    </ol>

    <h4 class="page-title">Edición Facturas Recibidas</h4>

    <div class="box box-default">

        <div class="box-header with-border">
            <h3 class="box-title">Editar registro de factura recibida: <span style="font-size: 18px;">{!! $fac_rec->num_fac !!} {!! $fac_rec->concepto !!}</span></h3>
        </div>

        <div class="box-body">        
            {!! Form::model($fac_rec,['route' =>['updateFR'],'method' => 'put', 'class'=>'form-horizontal','id'=>'form','files'=>'true']) !!}
            {{Form::hidden('id',null,[])}}
            @include('facturas_recibidas.fields')
            </form>
        </div>
    </div>
</section>
@endsection


