<div class="table-responsive">
    <table class="table tile table-hover table-striped table-condensed" id="data-table">
        <thead>
            <tr>
                <th>Solicitante</th>
                <th>Fecha solicitud</th>
                <th>Fecha salida</th>
                <th>Proyecto</th>
                <th width="50px">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($solVG as $sol)
            <tr>
                <td>{{ $sol->solicitante }}</td>
                <td>{{ date_format (new DateTime($sol->fechaSol), 'd/m/Y') }}</td>
                <td>{{ date_format (new DateTime($sol->fechaSal), 'd/m/Y') }}</td>
                <td>{{ $sol->proyecto }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            Acción
                        </button>
                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 33px, 0px); top: 0px; left: 0px; will-change: transform; padding-top: 0px; padding-bottom: 0px">
                            <a href="{{url('/solicitudVG/edit/'.$sol->id)}}" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Editar </a><br>
                            <a href="{{url('/solicitudVG/edit/'.$sol->id)}}" class="btn btn-white btn-sm"><i class="fa fa-eye"></i> Ver </a><br>
                            <a onclick="borrarSVG({{$sol->id}})" class="btn btn-white btn-sm"><i class="fa fa-trash-o"></i> Borrar </a>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>