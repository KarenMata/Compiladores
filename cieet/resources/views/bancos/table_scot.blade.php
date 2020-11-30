<h4 class="page-title">MOVIMIENTOS CTA SCOTIABANK</h4>
<div class="content__title">
    <div class="row">
        <div class="col-md-6">
        <table class="table table-condensed">
            <thead>
                <tr style="background-color: rgba(0,0,0,0.4);">
                    <th>Ingresos</th>
                    <th>Egresos</th>
                    <th><b>Saldo</b></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="color: #77f177;"><b>${{number_format($saldos['ingresosS'], 2, '.', ',')}}</b></td>
                    <td style="color: #f78282;"><b>${{number_format($saldos['egresosS'], 2, '.', ',')}}</b></td>
                    <td><b>${{number_format($saldos['saldoS'], 2, '.', ',')}}</b></td>
                </tr>
            </tbody>
        </table>
        </div>
    </div>
    <div class="actions">
        <a class="btn btn-dark" href="{{url('bancos/create/1')}}"><i class="fa fa-plus-square"></i>  Registro</a>
    </div>
</div>
<div class="block-area" id="defaultStyle">
    <div class="table-responsive">
        @if(($scotia=='')||($scotia->isEmpty()))
            <div class="well text-center">No hay registros para mostrar</div>
        @else
            <table class="table tile table-hover table-striped tablaBancos" role='grid' id="table_scot">
                <thead>
                    <tr>
                        <th style="width: 10%;">Fecha</th>
                        <th style="width: 10%;">No. Cheque</th>
                        <th style="width: 20%;">Nombre</th>
                        <th style="width: 22%;">Concepto</th>
                        <th style="width: 14%;">Cantidad</th>
                        <th style="width: 14%;">Saldo</th>
                        <th style="width: 10%;">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $x=1; $scottotal=0;$cant_anterior=0;?>
                    @foreach($scotia as $scot)
                        @if ($x==1)
                            <?php $scottotal=$saldos['saldoS']; ?>
                        @endif
                        <tr>
                            <td>{{ date_format (new DateTime($scot->fecha), 'd/m/Y') }}</td>
                            <td>{{$scot->no_cheque}}</td>
                            <td>{{$scot->nombre}}</td>
                            <td>{{$scot->concepto}}</td>
                            @if($scot->cantidad<0)
                                <td style="color: #f78282;">${{number_format($scot->cantidad, 2, '.', ',')}}</td>
                                 @if ($x>1)
                                    <?php $scottotal=$scottotal-$cant_anterior; ?>
                                @endif
                                <?php $cant_anterior=$scot->cantidad; ?>
                            @else
                                <td style="color: #77f177;"><b>${{number_format($scot->cantidad, 2, '.', ',')}}</b></td>
                                @if ($x>1)
                                    <?php $scottotal=$scottotal-$cant_anterior; ?>
                                @endif
                                <?php $cant_anterior=$scot->cantidad; ?>
                            @endif
                            <td>${{number_format($scottotal, 2, '.', ',')}}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        Acción
                                    </button>
                                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 33px, 0px); top: 0px; left: 0px; will-change: transform; padding-top: 0px; padding-bottom: 0px">
                                        <a href="{{ url('/bancos/edit/'.$scot->id) }}" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Editar </a><br>
                                        <a href="{{ url('/bancos/eliminar/'.$scot->id) }}" class="btn btn-white btn-sm"><i class="fa fa-trash-o"></i> Eliminar </a><br>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php $x=$x+1; ?>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>