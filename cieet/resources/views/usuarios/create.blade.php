@extends('layouts.app2')
@section('title', 'Usuarios')
@section('content')
<section class="container">
	<div class="box-body">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12"><h2>Regirtro nuevo usuario</h2></div>
    		<div class="col-md-12 col-sm-12 col-xs-12" style="padding-bottom: 60px"><hr></div>
		</div>	
		<form method="POST" action="{{url('usuarios/store')}}" accept-charset="UTF-8" class="form-horizontal" id="form_users" enctype="multipart/form-data">
     	{{ csrf_field() }}

        	@include('usuarios.fields')

    	</form>
    </div>
</section>
@endsection
