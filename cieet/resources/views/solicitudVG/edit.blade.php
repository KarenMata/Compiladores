@extends('layouts.app2')
@section('title', 'Main page')
@section('content')

<div class="box box-default">
    
    <div class="box-header with-border">
        <h3 class="box-title">Editar solicitud de viáticos y/o gasolina</h3>
    </div>
 
    <div class="box-body">        
            {!! Form::model($solVG,['route' =>['updateSVG'],'method' => 'put', 'class'=>'form-horizontal','id'=>'form','files'=>'true']) !!}
            {{ csrf_field() }}
            {{ Form::hidden('id',$solVG->id)}}
        @include('solicitudVG.edit_fields')

        </form>
    </div>
</div>

@endsection