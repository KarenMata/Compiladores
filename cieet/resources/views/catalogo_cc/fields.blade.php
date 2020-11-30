@if(isset($catalogo_cc))<input name="id" type="hidden" value="{{$catalogo_cc->id}}"/> @endif


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
                                    {!! Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre del proyecto','required']) !!}<i class="form-group__bar"></i>
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
                                    {!! Form::select('responsable',$usuarios,null,['class'=>'form-control','placeholder'=>'Seleccione el responsable del proyecto...','required']) !!}<i class="form-group__bar"></i>
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
                                    {!! Form::number('num',null,['class'=>'form-control','placeholder'=>'Ingrese el número de proyecto','required','autofocus']) !!}<i class="form-group__bar"></i>
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
                                    {!! Form::date('fecha_ini',date('Y-m-d'),['class'=>'form-control form-control-sm','required']) !!}<i class="form-group__bar"></i>
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
                                    {!! Form::select('estatus',['1'=>'Proceso','2'=>'Terminado','3'=>'Pausado'],null,['class'=>'form-control inputSlim','placeholder'=>'Seleccione el estatus del proyecto','required']) !!}<i class="form-group__bar"></i>
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
                                    {!! Form::date('fecha_fin',date('Y-m-d'),['class'=>'form-control']) !!}<i class="form-group__bar"></i>
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
                                    {!! Form::text('contratante',null,['class'=>'form-control','placeholder'=>'Ingrese el contratante','required']) !!}<i class="form-group__bar"></i>
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
                                    {!! Form::text('contratado',null,['class'=>'form-control','placeholder'=>'Ingrese el contratado','required']) !!}<i class="form-group__bar"></i>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row" style="padding-left: 28.6px; padding-right: 28.6px; height: 50px">
        <!--<div class="col-lg-6 col-md-6 col-sm-6">-->
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-center"><h4>PARTICIPANTES DEL PROYECTO</h4></div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <a class="btn btn-sm btn-info" onclick="addRowPart()"><i class="fa fa-plus-square"></i></a>
            <a class="btn btn-sm btn-danger" onclick="deleteRowPart()"><i class="fa fa-minus-square"></i></a>
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
                                {!! Form::select('id_factura',$facturas,null,['class'=>'form-control','placeholder'=>'Seleccione la factura','onchange'=>'obtenMonto()','id'=>'factura']) !!}<i class="form-group__bar"></i>
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
                                {!! Form::number('avance',null,['class'=>'form-control','placeholder'=>'Ingrese el avance']) !!}<i class="form-group__bar"></i>
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
                                {!! Form::text('monto',null,['class'=>'form-control','placeholder'=>'Ingrese el avance','readonly','id'=>'monto']) !!}<i class="form-group__bar"></i>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!--<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><hr></div>-->
        <!--</div>-->
    </div>
    <div class="stats">
        <div class="col-lg-6 col-md-6">
            <div class="stats__item" style="padding-top: 0px">
                <div class="stats__info">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <table class="dataTable table-borderless table-condensed table-hover" style="width: 100%" id='table_part'>
                                <tbody>  
                                    <tr>
                                        <th style="text-align: center">
                                            Nombre
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-group" style="margin-bottom: 0px">
                                                {!! Form::select('participante[]',$usuarios,null,['class'=>'form-control form-control-sm','placeholder'=>'Seleccione participante...']) !!}<i class="form-group__bar"></i>
                                            </div>
                                        </td>
                                    </tr>
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
                <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i>  Guardar</button>
                <a class="btn btn-danger" href="{{url('/catalogo_cc/index')}}"><i class="fa fa-times"></i> Cancelar</a>
            </div>
        </div>
        <div class="row" style="display:none" id='part'> 
            {!! Form::select('participante[]',$usuarios,null,['class'=>'form-control form-control-sm','placeholder'=>'Seleccione participante...']) !!}<i class="form-group__bar"></i>
        </div>
    </div>    
</div>