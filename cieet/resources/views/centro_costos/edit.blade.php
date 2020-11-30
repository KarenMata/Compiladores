@extends('layouts.app2')
@section('title', 'Main page')
@section('content')
<section id="content" class="container">
    <!-- Breadcrumb -->
    <ol class="breadcrumb hidden-xs">
        <li><a href="#">Inicio</a></li>
        <li><a href="#">Centro de Costos</a></li>
        <li class="active">Edición de factura</li>
    </ol>

    <h4 class="page-title">Editar Factura de Centro de Costos</h4>

    <div class="box box-default">

        <div class="box-header with-border">
            <h3 class="box-title">Editar registro de factura: <span style="font-size: 18px;">{!! $fac->factura !!} {!! $fac->concepto !!}</span></h3>
        </div>

        <div class="box-body">        
            {!! Form::model($fac,['route' =>['updateCCD'],'method' => 'put', 'class'=>'form-horizontal','id'=>'form']) !!}
            {{ Form::hidden('id',$id)}}
            {{ Form::hidden('cc',$cc)}}
            @include('centro_costos.fields')
            </form>
        </div>
    </div>
</section>
@endsection


