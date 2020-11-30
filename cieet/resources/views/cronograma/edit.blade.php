@extends('layouts.app2')
@section('title', 'Main page')
@section('content')

<div class="box box-default">
    
    <div class="box-header with-border">
        <h3 class="box-title">Editar registro de usuario: <small><b>{!! $user->nombre()!!}</b></small></h3>
    </div>

    <div class="box-body">        
            {!! Form::model($user,['route' =>['user_update'],'method' => 'put', 'class'=>'form-horizontal','id'=>'form','files'=>'true']) !!}
            {{ csrf_field() }}

        @include('usuarios.fields')

        </form>
    </div>
</div>

@endsection
