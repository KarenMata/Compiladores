<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <table class="dataTable table-borderless table-condensed table-hover" style="width: 100%">
                    <tbody>
                        <tr>
                            <th>
                                Nombre del proyecto:
                            </th>
                        </tr>                
                        <tr>
                            <td>
                                <div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::text('nombre',$catalogo_cc->nombre,['class'=>'form-control','placeholder'=>'Ingrese el contratante','disabled']) !!}<i class="form-group__bar"></i>
                                </div>
                            </td>    
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <table class="dataTable table-borderless table-condensed table-hover" style="width: 100%">
                    <tbody>
                        <tr>
                            <th>
                                Responsable:
                            </th>
                        </tr>                
                        <tr>
                            <td>
                                <div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::text('responsable',$catalogo_cc->responsable()->nombreCompleto(),['class'=>'form-control','placeholder'=>'Ingrese el contratado','disabled']) !!}<i class="form-group__bar"></i>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12">
                <table class="dataTable table-borderless table-condensed table-hover" style="width: 100%">
                    <tbody>
                        <tr>
                            <th>
                                Número de proyecto:
                            </th>
                        </tr>                
                        <tr>
                            <td>
                                <div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::number('num',$catalogo_cc->num,['class'=>'form-control','placeholder'=>'Ingrese el número de proyecto','disabled']) !!}<i class="form-group__bar"></i>
                                </div>
                            </td>    
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12">
                <table class="dataTable table-borderless table-condensed table-hover" style="width: 100%">
                    <tbody>
                        <tr>
                            <th>
                                Fecha de inicio:
                            </th>
                        </tr>                
                        <tr>
                            <td>
                                <div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::date('fecha_ini',$catalogo_cc->fecha_ini,['class'=>'form-control datepicker','disabled']) !!}<i class="form-group__bar"></i>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12">
                <table class="dataTable table-borderless table-condensed table-hover" style="width: 100%">
                    <tbody>
                        <tr>
                            <th>
                                Estatus:
                            </th>
                        </tr>                
                        <tr>
                            <td>
                                <div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::select('estatus',['1'=>'Proceso','2'=>'Terminado','3'=>'Pausado'],$catalogo_cc->estatus,['class'=>'form-control inputSlim','placeholder'=>'Selecciona el estatus del proyecto','disabled']) !!}<i class="form-group__bar"></i>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12">
                <table class="dataTable table-borderless table-condensed table-hover" style="width: 100%">
                    <tbody>
                        <tr>
                            <th>
                                Fecha de termino del proyecto:
                            </th>
                        </tr>                
                        <tr>
                            <td>
                                <div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::date('fecha_fin',$catalogo_cc->fecha_fin,['class'=>'form-control datepicker','disabled']) !!}<i class="form-group__bar"></i>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <table class="dataTable table-borderless table-condensed table-hover" style="width: 100%">
                    <tbody>
                        <tr>
                            <th>
                                Contratante:
                            </th>
                        </tr>                
                        <tr>
                            <td>
                                <div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::text('contratante',$catalogo_cc->contratante,['class'=>'form-control','placeholder'=>'Ingrese el contratante','disabled']) !!}<i class="form-group__bar"></i>
                                </div>
                            </td>    
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <table class="dataTable table-borderless table-condensed table-hover" style="width: 100%">
                    <tbody>
                        <tr>
                            <th>
                                Contratado:
                            </th>
                        </tr>                
                        <tr>
                            <td>
                                <div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::text('contratado',$catalogo_cc->contratado,['class'=>'form-control','placeholder'=>'Ingrese el contratado','disabled']) !!}<i class="form-group__bar"></i>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row" style="padding-left: 28.6px; padding-right: 28.6px;">
        <!--<div class="col-lg-6 col-md-6 col-sm-6">-->
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-center"><h4>PARTICIPANTES DEL PROYECTO</h4></div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
<!--            <a class="btn btn-sm btn-info" onclick="addRowPart()"><i class="fa fa-plus-square"></i></a>
            <a class="btn btn-sm btn-danger" onclick="deleteRowPart()"><i class="fa fa-minus-square"></i></a>-->
        </div>
        <div class="col-lg-2 col-md-2 col-sm-12">
            <table class="dataTable table-borderless table-condensed table-hover" style="width: 100%">
                <tbody>
                    <tr>
                        <th>
                            Factura:
                        </th>
                    </tr>                
                    <tr>
                        <td>
                            <div class="form-group" style="margin-bottom: 0px">
                                {!! Form::text('factura',$catalogo_cc->factura,['class'=>'form-control','placeholder'=>'Sin factura','disabled']) !!}<i class="form-group__bar"></i>
                            </div>
                        </td>    
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-12">
            <table class="dataTable table-borderless table-condensed table-hover" style="width: 100%">
                <tbody>
                    <tr>
                        <th>
                            Avance:
                        </th>
                    </tr>                
                    <tr>
                        <td>
                            <div class="form-group" style="margin-bottom: 0px">
                                {!! Form::text('avance',number_format($catalogo_cc->avance).'%',['class'=>'form-control','disabled']) !!}<i class="form-group__bar"></i>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-12">
            <table class="dataTable table-borderless table-condensed table-hover" style="width: 100%">
                <tbody>
                    <tr>
                        <th>
                            Monto factura:
                        </th>
                    </tr>                
                    <tr>
                        <td>
                            <div class="form-group" style="margin-bottom: 0px">
                                {!! Form::text('importe',number_format($catalogo_cc->monto,2),['class'=>'form-control','disabled']) !!}<i class="form-group__bar"></i>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
<!--        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><hr></div>-->
        <!--</div>-->
    </div>
    <div class="stats">
        <div class="col-lg-6 col-md-6">
            <div class="stats__item">
                <div class="stats__info">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <table class="dataTable table-condensed table-bordered table-hover" style="width: 100%" id='table_part'>
                                <thead>  
                                    <tr>
                                        <th style="text-align: center">
                                            Nombre
                                        </th>
                                    </tr>
                                </thead>  
                                <tbody>  
                                @foreach($usuarios as $usuario)
                                    <tr>
                                        <td>
                                        {{ $usuario->participante()->nombreCompleto() }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card-body">
    <div class="row"> 
        <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                <br>
        <a class="btn btn-danger" href="{{url('/catalogo_cc/index')}}"><i class="fa fa-arrow-circle-left"></i> Regresar</a>
        </div>
    </div>
</div>
</div>