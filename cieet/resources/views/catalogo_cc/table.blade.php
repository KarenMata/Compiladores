<table class="table tile table-hover table-striped dataTable" role='grid' id="data-table">
    <thead>
        <tr>
            <th>Número de Proyecto</th>
            <th>Estatus</th>
            <th>Contratante</th>
            <th>Factura</th>
            <th>Avance</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($catalogo_cc as $cc)
        <tr>
            <td>{{ $cc->num }}</td>
            <td>{{ $cc->estatus()}}</td>
            <td>{{ $cc->contratante }}</td>
            <td>{{ isset($cc->id_factura) ? $cc->factura()->num : 'Sin factura' }}</td>
            <td>
                <small>Porcentaje de Avance: {{ number_format($cc->avance) }}%</small>
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
                        <a href="{{url('/catalogo_cc/detalle/'.$cc->id)}}" class="btn btn-white btn-sm"><i class="fa fa-list-alt"></i> Detalle </a><br>
                        <a href="{{url('/catalogo_cc/comentarios/'.$cc->id)}}" class="btn btn-white btn-sm"><i class="fa fa-list-ul"></i> Comentarios </a><br>
                        <a onclick="borrarCC({{$cc->id}})" class="btn btn-white btn-sm"><i class="fa fa-trash-o"></i> Borrar </a>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>