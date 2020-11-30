@extends('layouts.app2')

@section('title', 'Main page')

@section('content')
    <section class="container">
        <h4 class="page-title">COMPRAS</h4>
         <div class="content__title">
                    <div class="actions">
                        <a class="btn btn-dark" href="{{url('compras/create')}}"><i class="fa fa-plus-square"></i>  Alta</a>
                    </div>
                    </div>
                    
        <!-- Deafult Table -->
        <div class="block-area" id="defaultStyle">
            <div class="table-responsive">
                @include('compras.table')
            </div>
        </div>
        
    </section>
            
@endsection
           
