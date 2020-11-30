<div class="table-responsive">
    <table class="table tile table-hover table-striped table-condensed" id="data-table">
        <thead>
            <tr>
                <th>Factura</th>
                <th>Fecha</th>
                <th>Concepto</th>
                <th>Partida</th>
                <th>Importe</th>
                <th>Avance</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $cont = 1; ?>
            @foreach($facts as $fac)
            <tr>
                <td>{{ $fac->num }}</td>
                <td>{{ date_format (new DateTime($fac->fecha), 'd/m/Y') }}</td>
                <td>{{ $fac->concepto }}</td>
                <td>{{ $fac->partida()->coddesc }}</td>
                <td>{{ $fac->importe }}</td>
                <td>{{ $fac->avance }} %</td>
                <td>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            Acción
                        </button>
                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 33px, 0px); top: 0px; left: 0px; will-change: transform; padding-top: 0px; padding-bottom: 0px">
                            <a href="{{url('/centroCostos/edit/'.$fac->id)}}" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Editar </a><br>
                            <a href="{{url('/centroCostos/show/'.$fac->id)}}" class="btn btn-white btn-sm"><i class="fa fa-eye"></i> Ver </a><br>
                            <a onclick="borrarFCC({{$fac->id}})" class="btn btn-white btn-sm"><i class="fa fa-trash-o"></i> Borrar </a>
                        </div>
                    </div>
                </td>
            </tr>
            <?php $cont++; ?>
            @endforeach
        </tbody>
    </table>
</div>