<div class="row" id="compras">
    <div class="col-md-4 col-sm-4 col-xs-12 padd_extremos">
        <label for="fecha_sol">Fecha de solicitud:</label>
        <div >
            {!! Form::text('fecha_sol',null,['class'=>'form-control datepicker','placeholder'=>'Ingresa fecha de solicitud']) !!}
        </div>
    </div>
    <div class="form-group col-md-4 col-sm-4 col-xs-12 padd_extremos">
        <label for="nombre_sol">Solicitante:</label>
        <div >
            {!! Form::text('nombre_sol',null,['class'=>'form-control','placeholder'=>'Nombre del solicitante','required','autofocus']) !!}
        </div>
    </div>
    <div class="col-md-4 col-sm-4 col-xs-12 padd_extremos">
        <label for="fecha_entrega">Fecha de entrega:</label>
        <div class="padd_r20">
            {!! Form::text('fecha_entrega',null,['class'=>'form-control datepicker','placeholder'=>'Ingresa fecha de solicitud']) !!}
        </div>
    </div>
        <hr class="hr_compras">
    <div class="col-md-12 col-sm-12 col-xs-12"><div class="titles_compras">PROYECTO</div></div>
    <div class="col-md-9 col-sm-9 col-xs-12 padd_extremos">
        <label for="nombre_proy">Nombre del proyecto:</label>
        <div >
            {!! Form::text('nombre_proy',null,['class'=>'form-control','placeholder'=>'Nombre del proyecto','required','autofocus']) !!}
        </div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-12 padd_extremos">
        <label for="codigo_proy">Codigo del proyecto:</label>
        <div class="padd_r20">
            {!! Form::text('codigo_proy',null,['class'=>'form-control','placeholder'=>'Codigo del proyecto','required','autofocus']) !!}
        </div>
    </div>
    <div class="col-md-8 col-sm-8 col-xs-12 padd_extremos">
        <label for="periodicidad">Periodicidad:</label>
        <div >
            <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="periodicidad" value="unica_ocacion">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">Única ocasión</span>
            </label>

            <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="periodicidad" value="eventual">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">Eventualmente</span>
            </label>
            
            <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="periodicidad" value="frecuente">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">Frecuentemenete</span>
            </label>

            <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="periodicidad" value="periodica">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">Periodicamente</span>
            </label>
        </div>
    </div>
    <div class="col-md-4 col-sm-4 col-xs-12 padd_extremos">
        <label for="metodo_pago">Metodo de pago:</label>
        <div >
            <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="metodopago" value="efectivo">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">Efectivo</span>
            </label>
            <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="metodopago" value="transferencia">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">Transferencia</span>
            </label>
            <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="metodopago" value="cheque">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">Cheque</span>
            </label>
        </div>
    </div>
    <hr class="hr_compras">

    <div class="col-md-12 col-sm-12 col-xs-12"><div class="titles_compras">SÍRVASE POR ESTE MEDIO SUMINISTRAR LOS SIGUÍENTES ARTÍCULOS</div></div>
    <div class="col-md-12 col-sm-12 col-xs-12 padd_extremos">
        <div class="padd_r20">
            <table id="t_articulos" class="table table-condensed table-bordered table-striped table-hover dataTable" role='grid' style="margin-right: 20px;margin-bottom: 0px !important;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Concepto</th>
                        <th>Cantidad</th>
                        <th>Precio unitario</th>
                        <th>Descripción de la actividad</th>
                        <th>Precio estimado</th>
                        <th>Elegible</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="width: 5%;"><input type="number" name="numero_art" id="numero_art" class="form-control"></td>
                        <td style="width: 30%;"><input type="text" name="concepto_art" id="concepto_art" class="form-control"></td>
                        <td style="width: 5%;"><input type="number" name="cantidad_art" id="cantidad_art" value="0" class="form-control"></td>
                        <td style="width: 5%;"><input type="number" name="precio_art" id="precio_art" value="0" class="form-control"></td>
                        <td style="width: 40%;"><input type="text" name="descripcion_art" id="descripcion_art" class="form-control"></td>
                        <td style="width: 10%;"><input type="text" name="total_art" id="total_art" class="form-control"></td>
                        <td><input type="text" name="elegible_art" id="elegible_art" class="form-control"></td>
                    </tr>
                </tbody>
            </table>
            <div class="col-md-12 col-sm-12 col-xs-12" style="text-align: right;">
                <div class="content__title">
                    <div class="actions">
                        <a class="btn btn-dark" onclick="agrega_articulo()"><i class="fa fa-plus-square"></i></a>
                        <a class="btn btn-dark" onclick="elimina_articulo()"><i class="fa fa-minus-square"></i></a>
                    </div>                    
                </div>
                    
            </div>

        </div>
    </div>

    <hr class="hr_compras">

    <div class="col-md-12 col-sm-12 col-xs-12"><div class="titles_compras">APROBADO COMO ELEGIBLE</div></div>
    <div class="col-md-12 col-sm-12 col-xs-12 padd_extremos">
        <div class="padd_r20">
            <table id="t_aprobados" class="table table-condensed table-bordered table-striped table-hover dataTable" role='grid' style="font-size: 9px;">
                <thead>
                    <tr>
                        <th rowspan="2" style="width: 3%;">#</th>
                        <th colspan="4" style="border-bottom: 2px solid rgba(255,255,255,.125);text-align: center;">Proveedor</th>
                        <th rowspan="2" style="width: 5%;">Partida</th>
                        <th rowspan="2" style="width: 30%;">Especificaciones para la Factura</th>
                        <th rowspan="2" style="width: 5%;">Fecha de <br>aplicación</th>
                        <th rowspan="2" style="width: 15%;">Formas de pago<br>(Anticipos, en una sola exibición etc)</th>
                        <th rowspan="2" style="width: 5%;">Precio final</th>
                    </tr>
                    <tr>    
                        <th style="width: 5%;">Cuenta clabe</th>
                        <th style="width: 5%;">Banco</th>
                        <th style="width: 10%;">RFC</th>
                        <th style="width: 15%;">Razon Social</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="number" name="numero_aprob" id="numero_aprob" class="form-control"></td>
                        <td><input type="text" name="cuenta_clabe" id="cuenta_clabe" class="form-control"></td>
                        <td><input type="text" name="banco" id="banco" class="form-control"></td>
                        <td><input type="text" name="rfc" id="rfc" class="form-control"></td>
                        <td><input type="text" name="razon_social" id="razon_social" class="form-control"></td>
                        <td><input type="text" name="partida" id="partida" class="form-control"></td>
                        <td><input type="text" name="especificaciones" id="especificaciones" class="form-control"></td>
                        <td><input type="text" name="fecha_aplicacion" id="fecha_aplicacion" class="form-control datepicker"></td>
                        <td><input type="text" name="forma_pago" id="forma_pago" class="form-control"></td>
                        <td><input type="text" name="precio_fnal" id="precio_fnal" class="form-control"></td>
                    </tr>
                </tbody>
            </table>
            <div class="col-md-12 col-sm-12 col-xs-12" style="text-align: right;">
                <a class="btn btn-dark" onclick="agrega_aprobado()"><i class="fa fa-plus-square"></i></a>
                <a class="btn btn-dark" onclick="elimina_aprobado()"><i class="fa fa-minus-square"></i></a>
            </div>
        </div>

    </div>

    
</div>

    
    





    <div class="form-group"> 
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i>  Guardar</button>
            <a class="btn btn-danger" href="{{url('/usuarios/usuarios')}}"><i class="fa fa-times"></i> Cancelar</a>
        </div>
    </div>

    <div class="form-group ">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <br>
            <br>
        </div>
    </div>

     
