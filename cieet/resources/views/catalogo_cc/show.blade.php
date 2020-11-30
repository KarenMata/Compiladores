@extends('layouts.app2')
@section('title', 'Main page')
@section('content')
<main id="content" role="main">
    <div class="box box-default">

        <div class="box-header with-border"><h3 class="box-title">Ver registro</h3></div>
        <hr>
        <div class="box-body">   
            <form method="POST" action="{{url('catalogo_cc/update')}}" accept-charset="UTF-8" class="form-horizontal" id="form" enctype="multipart/form-data">
                {{ csrf_field() }}

                @include('catalogo_cc.show_fields')

            </form>
        </div>
    </div>
</main>
@endsection
