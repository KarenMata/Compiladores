@extends('layouts.app2')

@section('title', 'Main page')

@section('content')

            <!-- Content -->
            <section id="content" class="container">
            
                <!-- Breadcrumb -->
                <ol class="breadcrumb hidden-xs">
                    <li><a href="#">Inicio</a></li>
                    <li class="active">Catálogo de CC</li>
                </ol>
                
                
                <h4 class="page-title">Catálogo de CC</h4>
                 
                
                <div class='box box-header block-area'>
                    <a class="btn btn-default pull-right" style="margin-top: 25px" href="{{url('catalogo_cc/create')}}"><i class="fa fa-plus-square"></i>  Alta</a>
                </div>
                
                <!-- Deafult Table -->
                <div class="block-area" id="defaultStyle">
                    <h3 class="block-title">Listado</h3>
                    <table class="table tile table-hover table-striped" role='grid' id="example1">
                        <thead>
                            <tr>
                                <th>Número de Proyecto</th>
                                <th>Estatus</th>
                                <th>Contratante</th>
                                <th>Número de Factura</th>
                                <th>Avance</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $cont=1; ?>
                            @foreach($catalogo_cc as $cc)
                            <tr>
                                <td>{{ $cc->num }}</td>
                                <td>@if($cc->estatus==1)
                                        <?php echo"Proceso"; ?>
                                    @endif
                                    @if($cc->estatus==2)
                                        <?php echo"Terminado"; ?>
                                    @endif
                                    @if($cc->estatus==3)
                                        <?php echo"Pausado"; ?>
                                    @endif
                                </td>
                                <td>{{ $cc->contratante }}</td>
                                <td>{{ $cc->num_factura }}</td>
                                <td>
                                    <small>Porcentaje de Avance: {{ $cc->avance }}%</small>
                                    <div class="progress progress-mini">
                                        <div style="width:{{ $cc->avance }}%;" class="progress-bar"></div>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            Acción
                                        </button>
                                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 33px, 0px); top: 0px; left: 0px; will-change: transform; padding-top: 0px; padding-bottom: 0px">
                                            <a href="{{url('/catalogo_cc/edit/'.$cc->id)}}" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Editar </a><br>
                                            <a href="{{url('/catalogo_cc/show/'.$cc->id)}}" class="btn btn-white btn-sm"><i class="fa fa-eye"></i> Ver </a><br>
                                            <a onclick="borrarCC({{$cc->id}})" class="btn btn-white btn-sm"><i class="fa fa-trash-o"></i> Borrar </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php $cont++; ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
            </section>
            
@endsection
           
