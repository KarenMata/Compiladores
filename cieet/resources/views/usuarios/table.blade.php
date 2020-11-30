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
        <?php $cont = 1; ?>
        @foreach($usuarios as $usuario)
        <tr>
            <td><?php echo $cont; ?></td>
            <td>
            <div style="width: 100px">
                <img src="{{ asset(($usuario->fotografia!=null) ? 'img/usuarios/'.$usuario->fotografia : "img/usuarios/default.png") }}" alt="usuario" style="width: 40px;" data-toggle="tooltip" data-html="true" data-placement="right" title='<img src="{{ asset(($usuario->fotografia!=null) ? 'img/usuarios/'.$usuario->fotografia : 'img/usuarios/default.png') }}" alt="usuario" style="width: 150px;">'>
            </div></td>
            <td>{!! $usuario->nombre !!} - {!! $usuario->id !!}</td>
            <td>{!! $usuario->ap_paterno !!}</td>
            <td>{!! $usuario->correo !!}</td>
            <td>{!! $usuario->telefono !!}</td>
            <td>{!! $usuario->ini_contrato !!} - {!! $usuario->fin_contrato !!}</td>
            <td>
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        Acción
                    </button>
                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 33px, 0px); top: 0px; left: 0px; will-change: transform; padding-top: 0px; padding-bottom: 0px">
                        <a href="{{url('/usuarios/edit/'.$usuario->id)}}" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Editar </a><br>
                        <a href="" class="btn btn-white btn-sm" data-toggle="modal" data-target="#modal-small" onclick="add_id({{$usuario->id}});"><i class="fa fa-pencil"></i> Password </a><br>
                        <a href="{{url('/usuarios/permisos/'.$usuario->id)}}" class="btn btn-white btn-sm"><i class="fa fa-plus"></i> Permisos </a><br>
                        <a href="{{url('/usuarios/delete/'.$usuario->id)}}" class="btn btn-white btn-sm"><i class="fa fa-trash-o"></i> Borrar </a>
                    </div>
                </div>
            </td>
        </tr>
        <?php $cont++; ?>
        @endforeach
    </tbody>
</table>