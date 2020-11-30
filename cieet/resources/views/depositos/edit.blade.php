@extends('layouts.app2')
@section('title', 'Main page')
@section('content')
<section id="content" class="container">
    <!-- Breadcrumb -->
    <ol class="breadcrumb hidden-xs">
        <li><a href="#">Inicio</a></li>
        <li><a href="#">Depósitos</a></li>
        <li class="active">Edición</li>
    </ol>

    <h4 class="page-title">Edición Depósitos</h4>

    <div class="box box-default">

        <div class="box-header with-border">
            <h3 class="box-title">Editar registro de depósito: <span style="font-size: 18px;">{!! $deposito->concepto !!}</span></h3>
        </div>

        <div class="box-body">        
            {!! Form::model($deposito,['route' =>['updateDep'],'method' => 'put', 'class'=>'form-horizontal','id'=>'form']) !!}
            {{Form::hidden('id',null,[])}}
            @include('depositos.fields')

            </form>
        </div>
    </div>
</section>
@endsection


