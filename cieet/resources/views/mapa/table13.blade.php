<div class="mt col-lg-12 col-md-12">
    <table id="pagAjax_data13" class="table table-striped table-hover dataTable no-footer"  role="grid" aria-describedby="datatable-table_info">
        <thead>
            <tr>
                <th style="text-align: center !important;"><b>Nombre</b></th>
                <th style="text-align: center;"><b>Comunidad</b></th>
            </tr>
        </thead>
        <tbody>
            @foreach($padron13 as $pad13)
            <tr>
                <td>{{$pad13->nombre}} {{$pad13->ap_paterno}} {{$pad13->ap_materno}}</td><td>{{$pad13->colonia}}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2" style="text-align: center">
                    <?php 
                     $render13 = str_replace('mapa?','mapa13?',$padron13->render());
                    ?>
                    {!! $render13 !!}
                </td>
            </tr>
        </tfoot>
    </table>
</div>