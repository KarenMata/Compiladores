<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <table class="dataTable table-borderless table-condensed table-hover" style="width: 100%">
                    <tbody>
                        <tr>
                            <th>
                                Quién solicita:
                            </th>
                        </tr>                
                        <tr>
                            <td>
                                <div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::text('solicitante',null,['class'=>'form-control form-control-sm']) !!}<i class="form-group__bar"></i>
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
                                Fecha de solicitud:
                            </th>
                        </tr>                
                        <tr>
                            <td>
                                <div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::date('fechaSol',date('Y-m-d'),['class'=>'form-control form-control-sm']) !!}<i class="form-group__bar"></i>
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
                                Fecha de salida
                            </th>
                        </tr>                
                        <tr>
                            <td>
                                <div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::date('fechaSal',date('Y-m-d'),['class'=>'form-control form-control-sm']) !!}<i class="form-group__bar"></i>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 text-center">
    <h4>OBJETIVO</h4><hr>
</div>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <table class="dataTable table-borderless table-condensed table-hover" style="width: 100%">
                    <tbody>
                        <tr>
                            <th colspan="4">
                                Proyecto:
                            </th>
                        </tr> 
                        <tr>
                            <td colspan="4">
                                <div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::text('proyecto',null,['class'=>'form-control form-control-sm']) !!}<i class="form-group__bar"></i>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th colspan="4">
                                Actividades:
                            </th>
                        </tr> 
                        <tr>
                            <td colspan="4">
                                <div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::text('actividades',null,['class'=>'form-control form-control-sm']) !!}<i class="form-group__bar"></i>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th colspan="4">
                                Objetivo general:
                            </th>
                        </tr> 
                        <tr>
                            <td colspan="4">
                                <div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::text('objetivo',null,['class'=>'form-control form-control-sm']) !!}<i class="form-group__bar"></i>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th colspan="4">
                                Destino:
                            </th>
                        </tr> 
                        <tr>
                            <td colspan="4">
                                <div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::text('destino',null,['class'=>'form-control form-control-sm']) !!}<i class="form-group__bar"></i>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th colspan="4">
                                Solicitud de:
                            </th>
                        </tr> 
                        <tr>
                            <td><div class="listview__attrs" style="margin: 0">
                                    <span style="margin: 0;padding-top: 5px;padding-bottom: 3px;">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id='gasolina' name='gasolina'>
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Gasolina</span>
                                        </label>
                                    </span>
                                </div>
                            </td>
                            <td>
                                <div class="listview__attrs" style="margin: 0">
                                    <span style="margin: 0;padding-top: 5px;padding-bottom: 3px;">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id='alimentos' name='alimentos'>
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Alimentos</span>
                                        </label>
                                    </span>
                                </div>
                            </td>
                            <td>
                                <div class="listview__attrs" style="margin: 0">
                                    <span style="margin: 0;padding-top: 5px;padding-bottom: 3px;">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id='hospedaje' name='hospedaje'>
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Hospedaje</span>
                                        </label>
                                    </span>
                                </div>
                            </td>
                            <td>
                                <div class="listview__attrs" style="margin: 0">
                                    <span style="margin: 0;padding-top: 5px;padding-bottom: 3px;">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id='otroSol' name='otroSol'>
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Otro</span>
                                        </label>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th colspan="4">
                                Entrega de recursos:
                            </th>
                        </tr> 
                        <tr>
                            <td>
                                <div class="listview__attrs" style="margin: 0">
                                    <span style="margin: 0;padding-top: 5px;padding-bottom: 3px;">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id='tarjEden' name='tarjEden'>
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Tarjeta Edenred</span>
                                        </label>
                                    </span>
                                </div>
                            </td>
                            <td>
                                <div class="listview__attrs" style="margin: 0">
                                    <span style="margin: 0;padding-top: 5px;padding-bottom: 3px;">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id='tarjDeb' name='tarjDeb'>
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Tarjeta de débito</span>
                                        </label>
                                    </span>
                                </div>
                            </td>
                            <td>
                                <div class="listview__attrs" style="margin: 0">
                                    <span style="margin: 0;padding-top: 5px;padding-bottom: 3px;">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id='efectivoER' name='efectivoER'>
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Efectivo</span>
                                        </label>
                                    </span>
                                </div>
                            </td>
                            <td>
                                <div class="listview__attrs" style="margin: 0">
                                    <span style="margin: 0;padding-top: 5px;padding-bottom: 3px;">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id='otroEnt' name='otroEnt'>
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Otro</span>
                                        </label>
                                    </span>
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
                            <th colspan="2">
                                Vehículo:
                            </th>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::text('vehiculo',null,['class'=>'form-control form-control-sm']) !!}<i class="form-group__bar"></i>
                                </div>
                            </td>
                        </tr> 
                        <tr>
                            <th colspan="2">
                                Destino Municipio/Estado
                            </th>
                        </tr>
                        <tr>                
                            <td colspan="2"><div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::text('destinoME',null,['class'=>'form-control form-control-sm']) !!}<i class="form-group__bar"></i>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th colspan="2">
                                Kilometraje de inicio
                            </th>
                        </tr>
                        <tr>                
                            <td colspan="2">
                                <div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::number('kmIni',null,['class'=>'form-control form-control-sm']) !!}<i class="form-group__bar"></i>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th colspan="2">
                                Kilometraje final
                            </th>
                        </tr>
                        <tr>                
                            <td colspan="2">
                                <div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::number('kmFin',null,['class'=>'form-control form-control-sm']) !!}<i class="form-group__bar"></i>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th colspan="2">
                                Recibe/Entrega:
                            </th>
                        </tr>
                        <tr>
                            <td>
                                <div class="listview__attrs" style="margin: 0">
                                    <span style="margin: 0;padding-top: 5px;padding-bottom: 3px;">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id='recibe' name='recibe'>
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Recibe</span>
                                        </label>
                                    </span>
                                </div>
                            </td>
                            <td>
                                <div class="listview__attrs" style="margin: 0">
                                    <span style="margin: 0;padding-top: 5px;padding-bottom: 3px;">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id='entrega' name='entrega'>
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Entrega</span>
                                        </label>
                                    </span>
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
                                Hora aproximada de salida:
                            </th>  
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::time('hrApSal',date("H:i",strtotime ( '-5 hour' , strtotime ( date("H:i")) )),['class'=>'form-control form-control-sm']) !!}<i class="form-group__bar"></i>
                                </div>
                            <td>
                        </tr>
                        <tr>
                            <th>
                                Hora aproximada de llegada:
                            </th>
                        </tr>
                        <tr>
                            <td><div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::time('hrApLle',date("H:i",strtotime ( '-5 hour' , strtotime ( date("H:i")) )),['class'=>'form-control form-control-sm']) !!}<i class="form-group__bar"></i>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Hora real de salida
                            </th>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::time('hrReSal',date("H:i",strtotime ( '-5 hour' , strtotime ( date("H:i")) )),['class'=>'form-control form-control-sm']) !!}<i class="form-group__bar"></i>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Hora real de llegada
                            </th>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::time('hrReLle',date("H:i",strtotime ( '-5 hour' , strtotime ( date("H:i")) )),['class'=>'form-control form-control-sm']) !!}<i class="form-group__bar"></i>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Fecha de llegada
                            </th>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::date('fechaLle',date("Y-m-d"),['class'=>'form-control form-control-sm']) !!}<i class="form-group__bar"></i>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 text-center">
    <h4>DATOS DE RECURSOS ENTREGADOS (No responder)</h4><hr>
</div>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <table class="dataTable table-borderless table-condensed table-hover" style="width: 100%">
                    <tbody>
                        <tr>
                            <th>
                                Tarjeta EDENRED:
                            </th>
                        </tr>                
                        <tr>
                            <td>
                                <div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::text('edenred',null,['class'=>'form-control form-control-sm']) !!}<i class="form-group__bar"></i>
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
                                Tarjeta de débito:
                            </th>
                        </tr>                
                        <tr>
                            <td>
                                <div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::text('debito',null,['class'=>'form-control form-control-sm']) !!}<i class="form-group__bar"></i>
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
                                Monto inicial EDENRED:
                            </th>
                        </tr>                
                        <tr>
                            <td>
                                <div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::text('miEden',null,['class'=>'form-control form-control-sm']) !!}<i class="form-group__bar"></i>
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
                                Monto final EDENRED:
                            </th>
                        </tr>                
                        <tr>
                            <td>
                                <div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::text('mfEden',null,['class'=>'form-control form-control-sm']) !!}<i class="form-group__bar"></i>
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
                                Monto inicial débito:
                            </th>
                        </tr>                
                        <tr>
                            <td>
                                <div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::text('miDeb',null,['class'=>'form-control form-control-sm']) !!}<i class="form-group__bar"></i>
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
                                Monto final débito:
                            </th>
                        </tr>                
                        <tr>
                            <td>
                                <div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::text('mfDeb',null,['class'=>'form-control form-control-sm']) !!}<i class="form-group__bar"></i>
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
                                Efectivo:
                            </th>
                        </tr>                
                        <tr>
                            <td>
                                <div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::text('efectivo',null,['class'=>'form-control form-control-sm']) !!}<i class="form-group__bar"></i>
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
                                Otro medio:
                            </th>
                        </tr>                
                        <tr>
                            <td>
                                <div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::text('otroMed',null,['class'=>'form-control form-control-sm']) !!}<i class="form-group__bar"></i>
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
                                Nombre de responsable
                            </th>
                        </tr>                
                        <tr>
                            <td>
                                <div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::text('responsable',null,['class'=>'form-control form-control-sm']) !!}<i class="form-group__bar"></i>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"></div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-center"><h4>COMITIVA</h4></div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
        <a class="btn btn-sm btn-info" onclick="addRowCom()"><i class="fa fa-plus-square"></i></a>
        <a class="btn btn-sm btn-danger" onclick="deleteRowCom()"><i class="fa fa-minus-square"></i></a>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><hr></div>
</div>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12">
                <table class="dataTable table-borderless table-condensed table-hover" style="width: 100%" id='table_nom'>
                    <tbody>
                        <tr>
                            <th style="padding-bottom: 17px; text-align: center">
                                Nombre
                            </th>
                        </tr>                
                        <tr>
                            <td>
                                <div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::text('nomb[]',null,['class'=>'form-control form-control-sm']) !!}<i class="form-group__bar"></i>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12">
                <table class="dataTable table-borderless table-condensed table-hover" style="width: 100%" id='table_act'>
                    <tbody>
                        <tr>
                            <th style="padding-bottom: 17px; text-align: center">
                                Actividad
                            </th>
                        </tr>                
                        <tr>
                            <td>
                                <div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::text('act[]',null,['class'=>'form-control form-control-sm']) !!}<i class="form-group__bar"></i>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-12">
                <table class="dataTable table-borderless table-condensed table-hover" style="width: 100%" id='table_asis'>
                    <tbody>
                        <tr>
                            <th colspan="2" style="padding-bottom: 0px; text-align: center">
                                Asistencia
                            </th>
                        </tr>                
                        <tr>
                            <th style="padding-top: 0px; padding-bottom: 0px; text-align: center">
                                Si
                            </th>
                            <th style="padding-top: 0px; padding-bottom: 0px; text-align: center">
                                No
                            </th>
                        </tr>                
                        <tr>
                            <td>
                                <div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::text('as_si[]',null,['class'=>'form-control form-control-sm']) !!}<i class="form-group__bar"></i>
                                </div>
                            </td>
                            <td>
                                <div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::text('as_no[]',null,['class'=>'form-control form-control-sm']) !!}<i class="form-group__bar"></i>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-12">
                <table class="dataTable table-borderless table-condensed table-hover" style="width: 100%" id='table_obj'>
                    <tbody>
                        <tr>
                            <th style="padding-bottom: 17px; text-align: center">
                                Objetivo
                            </th>
                        </tr>                
                        <tr>
                            <td>
                                <div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::text('obj[]',null,['class'=>'form-control form-control-sm']) !!}<i class="form-group__bar"></i>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12">
                <table class="dataTable table-borderless table-condensed table-hover" style="width: 100%" id='table_obs'>
                    <tbody>
                        <tr>
                            <th style="padding-bottom: 17px; text-align: center">
                                Observaciones
                            </th>
                        </tr>                
                        <tr>
                            <td>
                                <div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::text('obs[]',null,['class'=>'form-control form-control-sm']) !!}<i class="form-group__bar"></i>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 text-center">
    <h4>OBSERVACIONES</h4><hr>
</div>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <table class="dataTable table-borderless table-condensed table-hover" style="width: 100%">
                    <tbody>                
                        <tr>
                            <td>
                                <div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::textarea('observaciones',null,['class'=>'form-control form-control-sm','rows'=>'5']) !!}<i class="form-group__bar"></i>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <!--<div class="col-lg-6 col-md-6 col-sm-6">-->
    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 text-center"><h4>RELACIÓN DE COMPROBANTES EFECTUADOS</h4></div>
    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
        <a class="btn btn-sm btn-info" onclick="addRowRCE()"><i class="fa fa-plus-square"></i></a>
        <a class="btn btn-sm btn-danger" onclick="deleteRowRCE()"><i class="fa fa-minus-square"></i></a>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"></div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><hr></div>
    <!--</div>-->
</div>
<div class="stats">
    <div class="col-lg-6 col-md-6">
        <div class="stats__item">
            <div class="stats__info">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <table class="dataTable table-borderless table-condensed table-hover" style="width: 100%" id='table_conc'>
                            <tbody>  
                                <tr>
                                    <th style="text-align: center">
                                        Concepto
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="margin-bottom: 0px">
                                            {!! Form::text('concepto[]',null,['class'=>'form-control form-control-sm']) !!}<i class="form-group__bar"></i>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <table class="dataTable table-borderless table-condensed table-hover" style="width: 100%" id='table_mont'>
                            <tbody>  
                                <tr>
                                    <th style="text-align: center">
                                        Monto
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="margin-bottom: 0px">
                                            {!! Form::text('monto[]',null,['class'=>'form-control form-control-sm']) !!}<i class="form-group__bar"></i>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-5 col-md-5">
                        <table class="dataTable table-borderless table-condensed table-hover" style="width: 100%" id='table_rfna'>
                            <tbody>  
                                <tr>
                                    <th style="text-align: center">
                                        Recibo/Factura/No aplica
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="margin-bottom: 0px">
                                            {!! Form::text('rfna[]',null,['class'=>'form-control form-control-sm']) !!}<i class="form-group__bar"></i>
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
    <!--- Submit Field --->
    <div class="row"> 
        <div class="col-md-12 col-sm-12 col-xs-12 text-center">
            <br>
            <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i>  Guardar</button>
            <a class="btn btn-danger" href="{{url('/costos')}}"><i class="fa fa-times"></i> Cancelar</a>
        </div>
    </div>

    <div class="form-group ">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <br>
            <br>
        </div>
    </div>

</div>


