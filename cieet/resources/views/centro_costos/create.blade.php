@extends('layouts.app2')
@section('title', 'Main page')
@section('content')

<div class="box box-default">

    <div class="box-header with-border">
        <h3 class="box-title">Centro de Costos: Proyecto {{$cc->num}}</h3>
    </div>

    <div class="box-body">
        <form method="POST" action="{{url('centroCostos/store')}}" accept-charset="UTF-8" class="form-horizontal" id="form" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ Form::hidden('id',$cc->id)}}
            @include('centro_costos.create_fields')
        </form>
    </div>
</div>

@endsection