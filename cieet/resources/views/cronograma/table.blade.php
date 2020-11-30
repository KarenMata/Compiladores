<table class="table table-condensed table-bordered table-striped table-hover dataTable" role='grid' id="example1">
    <thead>
    <th>Nombre</th>
    <th>Apellido paterno</th>
    <th>Apellido materno</th>
    <th>Localidad</th>
    <th>Dependencia</th>
    <th>Categor&iacute;a</th>
    <th>Email</th>
    <th>Estatus</th>
    <th>Direcci&oacute;n oficina</th>
    <th>Extensi&oacute;n</th>
    <th>Horario</th>
    <th width="50px">Acciones</th>
</thead>
<tbody>
    @foreach($usuarios as $usuario)
    <tr>
        <td>{!! $usuario->name !!}</td>         
        <td>{!! $usuario->apellido_paterno !!}</td>         
        <td>{!! $usuario->apellido_materno !!}</td>         
        <td>{!! $usuario->localidad()->municipio !!}</td>         
        <td>{!! $usuario->institucion()->institucion !!}</td>         
        <td>{!! $usuario->categoria()->categoria !!}</td>         
        <td>{!! $usuario->email !!}</td>         
        <td>{!! $usuario->estatus() !!}</td>         
        <td>{!! $usuario->direccion_oficina !!}</td>         
        <td>{!! $usuario->extension !!}</td>         
        <td>{!! $usuario->horario !!}</td>         
        <td style="text-align: center">
            <a href="{{url('/usuarios/edit/'.$usuario->id)}}" type="button" style="cursor: pointer" title="Editar" class="btn btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
        </td>
    </tr>
    @endforeach
</tbody>
<tfoot>
</tfoot>
</table>
