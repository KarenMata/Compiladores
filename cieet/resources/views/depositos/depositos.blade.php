@extends('layouts.app2')

@section('title', 'Main page')

@section('content')
 
<!--<div class='box box-header'>
        <a class="btn btn-default pull-right" style="margin-top: 25px" href="{{url('usuarios/create')}}"><i class="fa fa-plus-square"></i>  Alta</a>
    </div>-->


            <!-- Content -->
            <section id="content" class="container">
            
                <!-- Breadcrumb -->
                <ol class="breadcrumb hidden-xs">
                    <li><a href="#">Inicio</a></li>
                    <li class="active">Depósitos</li>
                </ol>
                
                <!--<a class="btn btn-default pull-right" style="margin-top: 25px" href="{{url('usuarios/create')}}"><i class="fa fa-plus-square"></i>  Alta</a>-->
                
                <h4 class="page-title">Depósitos</h4>
                 
                
                <div class='box box-header block-area'>
                    <a class="btn btn-default pull-right" style="margin-top: 25px" href="{{url('depositos/create')}}"><i class="fa fa-plus-square"></i>  Alta</a>
                </div>
                
                <!-- Deafult Table -->
                <div class="block-area" id="defaultStyle">
                    <h3 class="block-title">Listado</h3>
                    <table class="table tile table-hover table-striped" role='grid' id="example1">
                        <thead>
                            <tr>
                                <th>Año</th>
                                <th>Mes</th>
                                <th>Día</th>
                                <th>Total</th>
                                <th>Concepto</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $cont=1; ?>
                            @foreach($depositos as $deposito)
                            <tr>
                                <td>{{ $deposito->anio }}</td>
                                <td>{{ $deposito->mes }}</td>
                                <td>{{ $deposito->dia }}</td>
                                <td>{{ $deposito->total }}</td>
                                <td>{{ $deposito->concepto }}</td>
                                <td>
                                    <a href="{{url('/depositos/edit/'.$deposito->id)}}" type="button" style="cursor: pointer" title="Editar" class="btn btn-xs">
                                        <i class="glyphicon glyphicon-edit"></i></a>
                                </td>
                            </tr>
                            <?php $cont++; ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
            </section>
            
@endsection
           
