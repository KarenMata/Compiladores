@extends('layouts.app2')
@section('title', 'Main page')
@section('content')
<section id="content" class="container">
<!-- Breadcrumb -->
                <ol class="breadcrumb hidden-xs">
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#">Depósitos</a></li>
                    <li class="active">Detalle</li>
                </ol>
                
                <h4 class="page-title">Detalle de Depósitos</h4>
                
<div class="box box-default">
    
    <div class="box-header with-border">
        <h3 class="box-title">Detalle de registro de depósito: <span style="font-size: 18px;">{!! $deposito->concepto !!}</span></h3>
    </div>

    <div class="box-body">        
            {!! Form::model($deposito,['route' =>['update'],'method' => 'put', 'class'=>'form-horizontal','id'=>'form']) !!}
            {{ csrf_field() }}

        @include('depositos.show_fields')

        </form>
    </div>
</div>
</section>
@endsection


