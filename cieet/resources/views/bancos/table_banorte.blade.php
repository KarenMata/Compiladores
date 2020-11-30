<h4 class="page-title">MOVIMIENTOS CTA BANORTE {{$bCuentas->cuenta}}</h4>
<div class="content__title">
    <div class="row">
        <div class="col-md-6">
        <table class="table table-condensed">
            <thead>
                <tr style="background-color: rgba(0,0,0,0.4);">
                    <th>Subcuenta</th>
                    <th>Ingresos</th>
                    <th>Egresos</th>
                    <th><b>Saldo</b></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="color: white;"><b>{{$bCuentas->cuenta}}</b></td>
                    <td style="color: #77f177;"><b>${{number_format($ingresosBan[$bCuentas->cuenta], 2, '.', ',')}}</b></td>
                    <td style="color: #f78282;"><b>${{number_format($egresosBan[$bCuentas->cuenta], 2, '.', ',')}}</b></td>
                    <td><b>${{number_format($saldoBan[$bCuentas->cuenta], 2, '.', ',')}}</b></td>
                </tr>
            </tbody>
        </table>
        </div>
    </div>
    <div class="actions">
        <a class="btn btn-dark" href="{{url('bancos/create/2')}}"><i class="fa fa-plus-square"></i>  Registro</a>
    </div>
</div>
<div class="block-area" id="defaultStyle" style="padding-bottom: 40px;">
    <div class="table-responsive">
        @if(($banorte=='')||($banorte->isEmpty()))
            <div class="well text-center">No hay registros para mostrar</div>
        @else
        
            <table class="table tile table-hover table-striped tablaBancos" role='grid' id="table_banorte{{$z}}">
                <thead>
                    <tr>
                        <th style="width: 10%;">Fecha</th>
                        <th style="width: 10%;">Subcuenta</th>
                        <th style="width: 10%;">No. Cheque</th>
                        <th style="width: 16%;">Nombre</th>
                        <th style="width: 20%;">Concepto</th>
                        <th style="width: 12%;">Cantidad</th>
                        <th style="width: 12%;">Saldo</th>
                        <th style="width: 10%;">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                
                    <?php $x=1; $bntetotal=0;$cant_anterior=0;?>
                    @foreach($banorte as $bnte)
                    @if($bCuentas->cuenta==$bnte->subcuenta)
                        @if ($x==1)
                            <?php $bntetotal=$saldoBan[$bCuentas->cuenta]; ?>
                        @endif
                        <tr>
                            <td>{{ date_format (new DateTime($bnte->fecha), 'd/m/Y') }}</td>
                            <td>{{$bnte->subcuenta}}</td>
                            <td>{{$bnte->no_cheque}}</td>
                            <td>{{$bnte->nombre}}</td>
                            <td>{{$bnte->concepto}}</td>
                            @if($bnte->cantidad<0)
                                <td style="color: #f78282;">${{number_format($bnte->cantidad, 2, '.', ',')}}</td>
                                @if ($x>1)
                                    <?php $bntetotal=$bntetotal-$cant_anterior; ?>
                                @endif
                                <?php $cant_anterior=$bnte->cantidad; ?>
                            @else
                                <td style="color: #77f177;"><b>${{number_format($bnte->cantidad, 2, '.', ',')}}</b></td>
                                @if ($x>1)
                                    <?php $bntetotal=$bntetotal-$cant_anterior; ?>
                                @endif
                                <?php $cant_anterior=$bnte->cantidad; ?>
                            @endif
                            
                            <td>${{number_format($bntetotal, 2, '.', ',')}}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        Acción
                                    </button>
                                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 33px, 0px); top: 0px; left: 0px; will-change: transform; padding-top: 0px; padding-bottom: 0px">
                                        <a href="{{ url('/bancos/edit/'.$bnte->id) }}" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Editar </a><br>
                                        <a href="{{ url('/bancos/eliminar/'.$bnte->id) }}" class="btn btn-white btn-sm"><i class="fa fa-trash-o"></i> Eliminar </a><br>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php $x=$x+1; ?>
                        @endif
                    @endforeach
                
                </tbody>
            </table>
        @endif
    </div>
</div>
