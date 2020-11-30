<div class="card">
    <div class="card-body" style="padding-bottom: 0px">
        <div class="row">            
            <div class="col-lg-8 col-md-8 col-sm-8">
                <table class="dataTable table-borderless table-condensed table-hover" style="width: 100%">
                    <tbody>
                        <tr>
                            <th>
                                Carga desde archivo XML:
                            </th>
                        </tr>                
                        <tr>
                            <td>
                                <div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::file('xml',['class'=>'form-control','accept'=>'.xml,.XML','id'=>'xml']) !!}<i class="form-group__bar"></i>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <table class="dataTable table-borderless table-condensed table-hover" style="width: 100%">
                    <tbody>             
                        <tr>
                            <td>
                                
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group" style="margin-bottom: 0px">
                                    <a class="btn btn-info btn-sm" onclick="cargaXMLFE()"><i class="fa fa-arrow-up"></i> Cargar</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card-body" style="padding-bottom: 0px">
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
                                    {!! Form::text('factura',null,['class'=>'form-control form-control-sm','required','id'=>'factura']) !!}<i class="form-group__bar"></i>
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
                                Fecha de factura:
                            </th>
                        </tr>                
                        <tr>
                            <td>
                                <div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::date('fecha',null,['class'=>'form-control form-control-sm','required','id'=>'fecha']) !!}<i class="form-group__bar"></i>
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
                                RFC:
                            </th>
                        </tr>                
                        <tr>
                            <td>
                                <div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::text('rfc',null,['class'=>'form-control form-control-sm','required','id'=>'rfc']) !!}<i class="form-group__bar"></i>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card-body" style="padding-bottom: 0px">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <table class="dataTable table-borderless table-condensed table-hover" style="width: 100%">
                    <tbody>
                        <tr>
                            <th>
                                Nombre:
                            </th>
                        </tr>                
                        <tr>
                            <td>
                                <div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::text('nombre',null,['class'=>'form-control form-control-sm','required','id'=>'nombre']) !!}<i class="form-group__bar"></i>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card-body" style="padding-bottom: 0px">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
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
                                    {!! Form::text('concepto',null,['class'=>'form-control form-control-sm','required']) !!}<i class="form-group__bar"></i>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card-body" style="padding-bottom: 0px">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <table class="dataTable table-borderless table-condensed table-hover" style="width: 100%">
                    <tbody>
                        <tr>
                            <th>
                                Forma de pago:
                            </th>
                        </tr>                
                        <tr>
                            <td>
                                <div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::select('forma_pago',$formaPago,null,['class'=>'form-control form-control-sm','placeholder'=>'Seleccione...','required']) !!}<i class="form-group__bar"></i>
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
                                Modo de pago:
                            </th>
                        </tr>                
                        <tr>
                            <td>
                                <div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::select('modo_pago',$modoPago,null,['class'=>'form-control form-control-sm','placeholder'=>'Seleccione...','required']) !!}<i class="form-group__bar"></i>
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
                                Estatus:
                            </th>
                        </tr>                
                        <tr>
                            <td>
                                <div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::select('estatus',$estatusFact,null,['class'=>'form-control form-control-sm','placeholder'=>'Seleccione...','required']) !!}<i class="form-group__bar"></i>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card-body" style="padding-bottom: 0px">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <table class="dataTable table-borderless table-condensed table-hover" style="width: 100%">
                    <tbody>
                        <tr>
                            <th>
                                Sub-total:
                            </th>
                        </tr>                
                        <tr>
                            <td>
                                <div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::number('subtotal',null,['class'=>'form-control form-control-sm','required','id'=>'subtotal']) !!}<i class="form-group__bar"></i>
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
                                IVA:
                            </th>
                        </tr>                
                        <tr>
                            <td>
                                <div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::number('iva',null,['class'=>'form-control form-control-sm','required','id'=>'iva']) !!}<i class="form-group__bar"></i>
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
                                Total:
                            </th>
                        </tr>                
                        <tr>
                            <td>
                                <div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::number('total',null,['class'=>'form-control form-control-sm','required','id'=>'total']) !!}<i class="form-group__bar"></i>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card-body" style="padding-bottom: 0px">
        <div class="row">            
            <div class="col-lg-12 col-md-12 col-sm-12">
                <table class="dataTable table-borderless table-condensed table-hover" style="width: 100%">
                    <tbody>
                        <tr>
                            <th>
                                Adjuntar factura en PDF:
                            </th>
                        </tr>                
                        <tr>
                            <td>
                                <div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::file('pdf',['class'=>'form-control','accept'=>'.pdf,.PDF','id'=>'pdf']) !!}<i class="form-group__bar"></i>
                                    @if($fac->archivo)
                                    <label><a href="{{asset('pdfFE/'.$fac->archivo)}}" target="_blank">{{$fac->archivo}}</a></label>
                                    @else
                                    Sin archivo adjunto
                                    @endif
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
                <a class="btn btn-danger" href="{{url('/facturasEmitidas/index')}}"><i class="fa fa-times"></i> Cancelar</a>
            </div>
        </div>
    </div>
</div>