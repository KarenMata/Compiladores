<div class="table-responsive">
    <table class="table tile table-hover table-striped table-condensed" id="data-table">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Usuario</th>
                <th>Comentarios</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $cont = 1; ?>
            @foreach($comentarios as $com)
            <tr>
                <td>{{ date_format (new DateTime($com->fecha), 'd/m/Y') }}</td>
                <td>{{ $com->usuario()->nombreCompleto() }}</td>
                <td>{{ substr($com->comentarios,0,30) }}...</td>
                <td>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            Acción
                        </button>
                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 33px, 0px); top: 0px; left: 0px; will-change: transform; padding-top: 0px; padding-bottom: 0px">
                            <a href="{{url('/centroCostos/editComent/'.$com->id)}}" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Editar </a><br>
                            <a href="{{url('/centroCostos/showComent/'.$com->id)}}" class="btn btn-white btn-sm"><i class="fa fa-eye"></i> Ver </a><br>
                            <a onclick="borrarCom({{$com->id}})" class="btn btn-white btn-sm"><i class="fa fa-trash-o"></i> Borrar </a>
                        </div>
                    </div>
                </td>
            </tr>
            <?php $cont++; ?>
            @endforeach
        </tbody>
    </table>
</div>