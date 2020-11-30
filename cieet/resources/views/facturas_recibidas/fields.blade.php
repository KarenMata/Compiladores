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
                                    <a class="btn btn-info btn-sm" onclick="cargaXMLFR()"><i class="fa fa-arrow-up"></i> Cargar</a>
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
            <div class="col-lg-2 col-md-2 col-sm-12">
                <table class="dataTable table-borderless table-condensed table-hover" style="width: 100%">
                    <tbody>
                        <tr>
                            <th>
                                Número:
                            </th>
                        </tr>                
                        <tr>
                            <td>
                                <div class="form-group" style="margin-bottom: 0px">                          
                                    {!! Form::number('num',null,['class'=>'form-control','placeholder'=>'Ingrese el número','required','autofocus','id'=>'num']) !!}<i class="form-group__bar"></i>
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
            <div class="col-lg-2 col-md-2 col-sm-12">
                <table class="dataTable table-borderless table-condensed table-hover" style="width: 100%">
                    <tbody>
                        <tr>
                            <th>
                                Número de factura:
                            </th>
                        </tr>                
                        <tr>
                            <td>
                                <div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::text('num_factura',null,['class'=>'form-control','placeholder'=>'Ingrese el número de factura','required','id'=>'num_factura']) !!}<i class="form-group__bar"></i>
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
                                RFC:
                            </th>
                        </tr>                
                        <tr>
                            <td>
                                <div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::text('rfc',null,['class'=>'form-control ','placeholder'=>'RFC','id'=>'rfc','required']) !!}<i class="form-group__bar"></i>
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
            <div class="col-lg-6 col-md-6 col-sm-12">
                <table class="dataTable table-borderless table-condensed table-hover" style="width: 100%">
                    <tbody>
                        <tr>
                            <th>
                                Denominación:
                            </th>
                        </tr>                
                        <tr>
                            <td>
                                <div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::text('denominacion',null,['class'=>'form-control','placeholder'=>'Ingrese la denominación','required','id'=>'denominacion']) !!}<i class="form-group__bar"></i>
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
                                    {!! Form::text('concepto',null,['class'=>'form-control','placeholder'=>'Concepto','required']) !!}<i class="form-group__bar"></i>
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
            <div class="col-lg-6 col-md-6 col-sm-12">
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
            <div class="col-lg-2 col-md-2 col-sm-12">
                <table class="dataTable table-borderless table-condensed table-hover" style="width: 100%">
                    <tbody>
                        <tr>
                            <th>
                                Subtotal:
                            </th>
                        </tr>                
                        <tr>
                            <td>
                                <div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::number('subtotal',null,['class'=>'form-control','placeholder'=>'Subtotal','id'=>'subtotal','required']) !!}<i class="form-group__bar"></i>
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
                                IVA:
                            </th>
                        </tr>                
                        <tr>
                            <td>
                                <div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::number('iva',null,['class'=>'form-control','placeholder'=>'IVA','required','id'=>'iva']) !!}<i class="form-group__bar"></i>
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
                                ISR Retenido:
                            </th>
                        </tr>                
                        <tr>
                            <td>
                                <div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::number('isr_retenido',null,['class'=>'form-control','placeholder'=>'ISR Retenido']) !!}<i class="form-group__bar"></i>
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
            <div class="col-lg-2 col-md-2 col-sm-12">
                <table class="dataTable table-borderless table-condensed table-hover" style="width: 100%">
                    <tbody>
                        <tr>
                            <th>
                                Otro:
                            </th>
                        </tr>                
                        <tr>
                            <td>
                                <div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::number('otro',null,['class'=>'form-control','placeholder'=>'Otro']) !!}<i class="form-group__bar"></i>
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
                                IVA Retenido:
                            </th>
                        </tr>                
                        <tr>
                            <td>
                                <div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::number('iva_retenido',null,['class'=>'form-control','placeholder'=>'IVA Retenido']) !!}<i class="form-group__bar"></i>
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
                                Importe:
                            </th>
                        </tr>                
                        <tr>
                            <td>
                                <div class="form-group" style="margin-bottom: 0px">
                                    {!! Form::number('importe',null,['class'=>'form-control','placeholder'=>'Importe','id'=>'importe','required']) !!}<i class="form-group__bar"></i>
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
                                    @if(isset($fac_rec) && $fac_rec->archivo)
                                    <label><a href="{{asset('pdfFR/'.$fac_rec->archivo)}}" target="_blank">{{$fac_rec->archivo}}</a></label>
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
</div>



<!--- Submit Field --->
<div class="row"> 
    <div class="col-md-12 col-sm-12 col-xs-12 text-center">
        <br>
        <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i>  Guardar</button>
        <a class="btn btn-danger" href="{{url('/facturas_recibidas/index')}}"><i class="fa fa-times"></i> Cancelar</a>
    </div>
</div>

<div class="form-group ">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <br>
        <br>
    </div>
</div>

</div>


