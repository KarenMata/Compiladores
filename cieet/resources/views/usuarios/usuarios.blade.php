@extends('layouts.app2')

@section('title', 'Main page')

@section('content')
<section class="container">
    <h4 class="page-title">USUARIOS</h4>
    <div class="block-area" id="defaultStyle">
        <div class="content__title">
            <div class="actions">
                <a class="btn btn-dark" href="{{url('usuarios/create')}}"><i class="fa fa-plus-square"></i>  Alta</a>
            </div>
        </div>
        <table class="table tile table-hover table-striped" role='grid' id="data-table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Fotografía</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Vigencia<br>Contrato</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $cont=1; ?>
                @foreach($usuarios as $usuario)
                <tr>
                    <td><?php echo $cont; ?></td>
                    <td><img width="40" height="auto" src="{{ url('img/usuarios/'.$usuario->fotografia) }}" alt=""></td>
                    <td>{!! $usuario->nombre !!} - {!! $usuario->id !!}</td>
                    <td>{!! $usuario->ap_paterno !!}</td>
                    <td>{!! $usuario->correo !!}</td>
                    <td>{!! $usuario->telefono !!}</td>
                    <td>{!! $usuario->ini_contrato !!} - {!! $usuario->fin_contrato !!}</td>
                    <td>
                        <a href="{{url('/usuarios/edit/'.$usuario->id)}}" style="cursor: pointer" title="Editar" class="btn btn-xs btn-dark userIcons"><i class="fa fa-edit"></i></a> 
                        <a href="{{url('/usuarios/permisos/'.$usuario->id)}}" style="cursor: pointer" title="Permisos" class="btn btn-xs btn-dark userIcons"><i class="fa fa-plus"></i></a> 
                        <a href="{{url('/usuarios/delete/'.$usuario->id)}}" style="cursor: pointer" title="Eliminar" class="btn btn-xs btn-dark userIcons"><i class="fa fa-times"></i></a>
                    </td>
                </tr>
                <?php $cont++; ?>
                @endforeach
            </tbody>
        </table>
    </div>
                
</section>
            
@endsection
           
