@extends('layouts.app2')
@section('title', 'Main page')
@section('content')
<section id="content" class="container">
    <!-- Breadcrumb -->
    <ol class="breadcrumb hidden-xs">
        <li><a href="#">Inicio</a></li>
        <li><a href="#">Facturas Recibidas</a></li>
        <li class="active">Alta</li>
    </ol>

    <h4 class="page-title">Alta de Factura Recibida</h4>

    <div class="box-body">
        <form method="POST" action="{{url('facturas_recibidas/store')}}" accept-charset="UTF-8" class="form-horizontal" id="form" enctype="multipart/form-data">
            {{ csrf_field() }}
            @include('facturas_recibidas.fields')
        </form>
    </div>
</section>
@endsection
