<div class="table-responsive">
    <table class="table tile table-hover table-striped table-condensed" id="data-table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Fecha</th>
                <th>No. de Factura</th>
                <th>Denominación</th>
                <th>Concepto</th>
                <th>Importe</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $cont = 1; ?>
            @foreach($fac_rec as $fac)
            <tr>
                <td>{{ $fac->num }}</td>
                <td>{{ date_format (new DateTime($fac->fecha), 'd/m/Y') }}</td>
                <td>{{ $fac->num_factura }}</td>
                <td>{{ $fac->denominacion }}</td>
                <td>{{ $fac->concepto }}</td>
                <td>{{ number_format($fac->importe,2) }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            Acción
                        </button>
                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 33px, 0px); top: 0px; left: 0px; will-change: transform; padding-top: 0px; padding-bottom: 0px">
                            <a href="{{url('/facturas_recibidas/edit/'.$fac->id)}}" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Editar </a><br>
                            <a href="{{url('/facturas_recibidas/show/'.$fac->id)}}" class="btn btn-white btn-sm"><i class="fa fa-eye"></i> Ver </a><br>
                            <a onclick="borrarFR({{$fac->id}})" class="btn btn-white btn-sm"><i class="fa fa-trash-o"></i> Borrar </a>
                        </div>
                    </div>
                </td>
            </tr>
            <?php $cont++; ?>
            @endforeach
        </tbody>
    </table>
</div>