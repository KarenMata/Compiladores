<table class="table table-condensed table-striped table-hover dataTable" role='grid' id="data-table">
    <thead>
        <tr>
            <th>Año</th>
            <th>Mes</th>
            <th>Día</th>
            <th>Total</th>
            <th>Concepto</th>
            <th width="50px">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($depositos as $deposito)
        <tr>
            <td>{{ $deposito->anio }}</td>
            <td>{{ $deposito->mes() }}</td>
            <td>{{ $deposito->dia }}</td>
            <td>{{ $deposito->total }}</td>
            <td>{{ $deposito->concepto }}</td>
            <td>
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        Acción
                    </button>
                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 33px, 0px); top: 0px; left: 0px; will-change: transform; padding-top: 0px; padding-bottom: 0px">
                        <a href="{{url('/depositos/edit/'.$deposito->id)}}" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Editar </a><br>
                        <a href="{{url('/depositos/show/'.$deposito->id)}}" class="btn btn-white btn-sm"><i class="fa fa-eye"></i> Ver </a><br>
                        <a onclick="borrarDep({{$deposito->id}})" class="btn btn-white btn-sm"><i class="fa fa-trash-o"></i> Borrar </a>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
    </tfoot>
</table>
