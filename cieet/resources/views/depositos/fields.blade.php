<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
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
                                    {!! Form::select('factura',$facturas,null,['class'=>'form-control','placeholder'=>'Seleccione...','autofocus','onchange'=>'buscaFactura2()','id'=>'factura']) !!}<i class="form-group__bar"></i>
                                </div>
                            </td>    
                        </tr>
                    </tbody>
                </table>
            </div>           
            <div class="col-lg-4 col-md-4 col-sm-12">
                <table class="dataTable table-borderless table-condensed table-hover" style="width: 100%">
                    <tbody>
                        <tr>
                            <th>
                                Fecha:
                            </th>
                        </tr>                
                        <tr>
                            <td>
                                <div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::date('fecha',null,['class'=>'form-control','required','id'=>'fecha']) !!}<i class="form-group__bar"></i>
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
                                Total:
                            </th>
                        </tr>                
                        <tr>
                            <td>
                                <div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::text('total',null,['class'=>'form-control ','placeholder'=>'Total','id'=>'total']) !!}<i class="form-group__bar"></i>
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
                                Concepto:
                            </th>
                        </tr>                
                        <tr>
                            <td>
                                <div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::text('concepto',null,['class'=>'form-control','placeholder'=>'Ingrese el concepto','required','id'=>'concepto']) !!}<i class="form-group__bar"></i>
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
            <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                <br>
                <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i>  Guardar</button>
                <a class="btn btn-danger" href="{{url('/depositos/index')}}"><i class="fa fa-times"></i> Cancelar</a>
            </div>
        </div>
    </div>
</div>