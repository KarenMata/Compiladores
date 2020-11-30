@extends('layouts.app2')
@section('title', 'Main page')
@section('content')
<section class="container">
<!-- Breadcrumb -->
    <h4 class="page-title">REQUISICIÓN DE COMPRA</h4>
                
    <div class="box-body">
    <form method="POST" action="{{url('compras/store')}}" accept-charset="UTF-8" class="form-horizontal" id="form" enctype="multipart/form-data">
     {{ csrf_field() }}

        @include('compras.fields')

    </form>
    </div>
</section>
@endsection