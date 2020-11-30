@extends('layouts.app2')
@section('title', 'Main page')
@section('content')
<section id="content" class="container">
<!-- Breadcrumb -->
                <ol class="breadcrumb hidden-xs">
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#">Catálogo de CC</a></li>
                    <li class="active">Edición</li>
                </ol>
                
                <h4 class="page-title">Edición Catálogo de Centro de Costos</h4>
                
<div class="box box-default">
    
    <div class="box-header with-border">
        <h3 class="box-title">Editar registro de centro de costos: <span style="font-size: 18px;">{!! $catalogo_cc->num !!} {!! $catalogo_cc->contratante !!}</span></h3>
    </div>

    <div class="box-body">        
            {!! Form::model($catalogo_cc,['route' =>['updateCC'],'method' => 'put', 'class'=>'form-horizontal','id'=>'form']) !!}
            {{ csrf_field() }}

        @include('catalogo_cc.editfields')

        </form>
    </div>
</div>
</section>
@endsection


