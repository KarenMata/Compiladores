@extends('layouts.app2')
@section('title', 'Main page')
@section('content')
<section id="content" class="container">
<!-- Breadcrumb -->
                <ol class="breadcrumb hidden-xs">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Library</a></li>
                    <li class="active">Data</li>
                </ol>
                
                <h4 class="page-title">REGISTRO USUARIO</h4>
                
    <div class="box-body">
    <form method="POST" action="{{url('usuarios/store')}}" accept-charset="UTF-8" class="form-horizontal" id="form-usuarios" enctype="multipart/form-data">
     {{ csrf_field() }}

        @include('usuarios.fields')

    </form>
    </div>
</section>
@endsection
