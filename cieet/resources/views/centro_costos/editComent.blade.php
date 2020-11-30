@extends('layouts.app2')
@section('title', 'Main page')
@section('content')
<section id="content" class="container">
    <!-- Breadcrumb -->
    <ol class="breadcrumb hidden-xs">
        <li><a href="#">Inicio</a></li>
        <li><a href="#">Proyectos</a></li>
        <li class="active">Edición de comentario</li>
    </ol>

    <h2 class="page-title">Centro de Costos: Comentarios</h2>

    <div class="box box-default">

        <div class="box-header with-border">
            <h4 class="box-title">Editar comentario de: <span style="font-size: 18px;">Proyecto {{$com->proyecto()->num}}</span></h4>
        </div>

        <div class="box-body">        
            {!! Form::model($com,['route' =>['updateComent'],'method' => 'put', 'class'=>'form-horizontal','id'=>'form']) !!}
            {{ Form::hidden('id',$com->id)}}
            {{ Form::hidden('cc',$com->proyecto()->id)}}
            <div class="card">
                @include('centro_costos.createComent_fields')
                <div class="card-body">
                    <div class="row"> 
                        <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                            <br>
                            <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i>  Guardar</button>
                            <a class="btn btn-danger" href="{{url('/catalogo_cc/comentarios/'.$com->proyecto()->id)}}"><i class="fa fa-arrow-circle-left"></i> Regresar</a>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</section>
@endsection


