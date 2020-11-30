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
                    <li class="active">Costos</li>
                </ol>
                
                <!--<a class="btn btn-default pull-right" style="margin-top: 25px" href="{{url('usuarios/create')}}"><i class="fa fa-plus-square"></i>  Alta</a>-->
                
                <h4 class="page-title">COSTOS*</h4>
                 
                
                <div class='box box-header block-area'>
                    <a class="btn btn-default pull-right" style="margin-top: 25px" href="{{url('costos/create')}}"><i class="fa fa-plus-square"></i>  Alta</a>
                </div>
                
                <!-- Deafult Table -->
                <div class="block-area" id="defaultStyle">
                    <h3 class="block-title">Costos</h3>
                    <table class="table tile table-hover table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Clave</th>
                                <th>Proyecto</th>
                                <th>Responsable</th>
                                <th>Total</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $cont=1; ?>
                            @foreach($costos as $costo)
                            <tr>
                                <td><?php echo $cont; ?></td>
                                <td>{!! $costo->clave !!}</td>
                                <td>{!! $costo->proyecto !!}</td>
                                <td>{!! $costo->responsable !!}</td>
                                <td>{!! $costo->total !!}</td>
                                <td><a href="{{url('/costos/edit/'.$costo->id)}}" type="button" style="cursor: pointer" title="Editar" class="btn btn-xs"><i class="glyphicon glyphicon-edit"></i></a></td>
                            </tr>
                            <?php $cont++; ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
            </section>
            
@endsection
           
