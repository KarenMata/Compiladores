<?php

use App\Models\Comunidades;
use App\Models\Municipios;
use App\Models\Resultados2015;
use App\Models\Resultados2018;
?>
@foreach($municipios as $mun)
<div id="myModal{{$mun}}" class="modal fade" role="dialog">
    <?php
    $etnia = '<ul>';
    $municipio = Municipios::find($mun);
    $etnias = Comunidades::where('id_municipio', $mun)->groupby('pueblo_indigena')->wherenotnull('pueblo_indigena')->pluck('pueblo_indigena');
    foreach ($etnias as $et) {
        $etnia .= "<li>" . $et . "</li>";
    } $etnia .= '</ul>';
    $comunidad = '';
    $comunidades = Comunidades::select('nombre', 'suma_pob', 'id_seccion')->where('id_municipio', $mun)->orderby('suma_pob', 'desc')->groupby('nombre', 'suma_pob', 'id_seccion')->get();
    foreach ($comunidades as $com) {
        $comunidad .= "<tr><td>" . $com->nombre . "</td><td>" . number_format($com->suma_pob) . "</td>" . $com->resultado($com->id_seccion) . "</tr>";
    }
    $liderazgo = '<ul>';
    $liderazgos = Comunidades::select('regimen_tenencia')->where('id_municipio', $mun)->wherenotnull('regimen_tenencia')->groupby('regimen_tenencia')->get();
    foreach ($liderazgos as $lid) {
        $liderazgo .= "<li>" . $lid->regimen_tenencia . "</li>";
    } $liderazgo .= '</ul>';
    $poblacion = Comunidades::where('id_municipio', $mun)->sum('poblacion_total');
    $secciones = Comunidades::where('id_municipio', $mun)->pluck('id_seccion');
//    dd($secciones);
    $cas15p = Resultados2015::whereIn('seccion', $secciones)->where('resultado', 'PERDIDA')->where('anio', 2015)->count();
    $cas15g = Resultados2015::whereIn('seccion', $secciones)->where('resultado', 'GANADA')->where('anio', 2015)->count();
    $cas18p = Resultados2018::whereIn('id_seccion', $secciones)->where('resultado', 'PERDIDA')->count();
    $cas18g = Resultados2018::whereIn('id_seccion', $secciones)->where('resultado', 'GANADA')->count();
    ?>
    <div class="modal-dialog modal-lg modal-notify modal-success" >

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background-color: #5baf39; ">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="color: white">Municipio: {{$municipio->municipio}}</h4>
            </div>
            <div class="modal-body">
                <!----------->
                <div class="row">
                    <div class="col-3 text-center">
                        <img src="img/escudos/{{$mun}}.png" class="img-fluid z-depth-1-half rounded-circle" style="width: 160px">
                    </div>
                    <div class="col-9">
                        <ul style="text-align: left;">
                            <li><b>Etnias:</b> {!!$etnia!!}</li>
                            <li><b>Comunidades:</b> 
                                <table class="col-md-12 col-sm-12 col-xs-12 table table-condensed table-bordered table-striped table-hover dataTable" >
                                    <tr>
                                        <td><b>Comunidad</b></td><td><b>Población</b></td><td><b>2015</b></td><td><b>2018</b></td>
                                    </tr>
                                    {!!$comunidad!!}
                                </table></li>
                            <li><b>Influencias:</b> 
                                <table class="col-md-12 col-sm-12 col-xs-12 table table-condensed table-bordered table-striped table-hover dataTable">
                                    <tr>
                                        <td style="text-align: center;"><b>2015</b></td>
                                        <td style="text-align: center;"><b>2018</b></td>
                                    </tr>
                                    <tr>
                                        <td>{{$municipio->partido_politico}}</td><td>{{$municipio->ganador_2018}}</td>
                                    </tr>
                                </table>
                            <li><b>Casillas:</b> 
                                <table class="col-md-12 col-sm-12 col-xs-12 table table-condensed table-bordered table-striped table-hover dataTable">
                                    <tr>
                                        <td colspan="2" style="text-align: center;"><b>2015</b></td>
                                        <td colspan="2"  style="text-align: center;"><b>2018</b></td>
                                    </tr>
                                    <tr>
                                        <td>GAN: {{$cas15g}}</td>
                                        <td>PERD: {{$cas15p}}</td>
                                        <td>GAN: {{$cas18g}}</td>
                                        <td>PERD: {{$cas18p}}</td>
                                    </tr>
                                </table>
                            <li><b>Liderazgos:</b> {!!($liderazgo!="<ul></ul>") ? $liderazgo : 'SIN DEFINIR'!!}</li>
                            <li><b>Población:</b> Indígena: {!!($poblacion==0) ? 'SIN DEFINIR' : number_format($poblacion)!!} - Municipio: {{number_format($municipio->poblacion)}}
                                {{($poblacion==0) ? '' : " - (".round($poblacion/$municipio->poblacion,2)."%)"}}</li>
                        </ul>
                    </div>
                </div>

                <!----------->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>

    </div>
</div>
@endforeach