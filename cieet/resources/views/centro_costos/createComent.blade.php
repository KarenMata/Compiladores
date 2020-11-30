@extends('layouts.app2')
@section('title', 'Main page')
@section('content')

<div class="box box-default">

    <div class="box-header with-border">
        <h3 class="box-title">Centro de Costos: Nuevo comentario para Proyecto {{$cc->num}}</h3>
    </div>

    <div class="box-body">
        <form method="POST" action="{{url('centroCostos/storeComent')}}" accept-charset="UTF-8" class="form-horizontal" id="form" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ Form::hidden('id_proyecto',$cc->id)}}            
            <div class="card">
                @include('centro_costos.createComent_fields')
                <div class="card-body">
                    <div class="row"> 
                        <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                            <br>
                            <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i>  Guardar</button>
                            <a class="btn btn-danger" href="{{url('/catalogo_cc/comentarios/'.$cc->id)}}"><i class="fa fa-times"></i> Cancelar</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection