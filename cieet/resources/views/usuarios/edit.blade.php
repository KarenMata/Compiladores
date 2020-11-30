@extends('layouts.app2')
@section('title', 'Main page')
@section('content')
<section class="container">
    <div class="box box-default">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12"><h2>Editar usuario</h2></div>
            <div class="col-md-12 col-sm-12 col-xs-12" style="padding-bottom: 10px"><hr></div>
        </div>
    <div class="box-header with-border" style="padding-bottom: 20px">
        <h3 class="box-title">Usuario: <span style="font-size: 18px;">{!! $usuario->nombre !!} {!! $usuario->ap_paterno !!} {!! $usuario->ap_materno !!}</span></h3>
    </div>

    <div class="box-body">        
            {!! Form::model($usuario,['route' =>['update'],'method' => 'put', 'class'=>'form-horizontal','id'=>'form','files'=>'true']) !!}
            {{ csrf_field() }}

        @include('usuarios.fields_edit')

        </form>
    </div>
</div>
</section>
@endsection


