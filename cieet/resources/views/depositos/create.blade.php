@extends('layouts.app2')
@section('title', 'Main page')
@section('content')
<section id="content" class="container">
<!-- Breadcrumb -->
                <ol class="breadcrumb hidden-xs">
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#">Depósitos</a></li>
                    <li class="active">Alta</li>
                </ol>
                
                <h4 class="page-title">Alta de Depósitos</h4>
                
    <div class="box-body">
    <form method="POST" action="{{url('depositos/store')}}" accept-charset="UTF-8" class="form-horizontal" id="form-usuarios" enctype="multipart/form-data">
     {{ csrf_field() }}

        @include('depositos.create_fields')

    </form>
    </div>
</section>
@endsection
