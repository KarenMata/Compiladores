@extends('layouts.app2')
@section('title', 'Main page')
@section('content')
<!-- Breadcrumb -->
<header class="content__title">
    <h1>SOLICITUD DE VIÁTICOS Y/O GASOLINA</h1>
</header>

<div class="box-body">
    <form method="POST" action="{{url('solicitudVG/store')}}" accept-charset="UTF-8" class="form-horizontal" id="form-usuarios" enctype="multipart/form-data">
        {{ csrf_field() }}

        @include('solicitudVG.fields')

    </form>
</div>
@endsection
