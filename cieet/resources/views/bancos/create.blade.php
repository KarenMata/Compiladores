@extends('layouts.app2')
@section('title', 'Bancos')
@section('content')
<script src="{{ asset('js/bancos.js')}}"></script> 
<section class="container">
<!-- Breadcrumb -->
    <h4 class="page-title"></h4>
                
    <div class="box-body">
    <form method="POST" action="{{url('bancos/store')}}" accept-charset="UTF-8" class="form-horizontal" id="form" enctype="multipart/form-data">
     {{ csrf_field() }}
     @if($banco=='scot')
        @include('bancos.fields_scot')
     @elseif($banco=='banorte')
     	@include('bancos.fields_banorte')
     @endif

    </form>
    </div>
</section>
@endsection