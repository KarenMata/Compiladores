<div class="card-body">
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12">
            <table class="dataTable table-borderless table-condensed table-hover" style="width: 100%">
                <tbody>
                    <tr>
                        <th>
                            Usuario:
                        </th>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group" style="margin-bottom: 0px">
                                {!! Form::text('usuario',\Auth::User()->nombreCompleto(),['class'=>'form-control form-control-sm','readonly']) !!}<i class="form-group__bar"></i>
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
                                {!! Form::text('fecha',date('d/m/Y'),['class'=>'form-control form-control-sm','readonly']) !!}<i class="form-group__bar"></i>
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
                            Comentarios:
                        </th>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group" style="margin-bottom: 0px">
                                {!! Form::textArea('comentarios',null,['class'=>'form-control form-control-sm','readonly','rows'=>'5']) !!}<i class="form-group__bar"></i>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>