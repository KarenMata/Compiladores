<div class="mt col-lg-12 col-md-12">
    <table id="pagAjax_data37" class="table table-striped table-hover dataTable no-footer"  role="grid" aria-describedby="datatable-table_info">
        <thead>
            <tr>
                <th style="text-align: center;"><b>Nombre</b></th>
                <th style="text-align: center;"><b>Comunidad</b></th>
            </tr>
        </thead>
        <tbody>
            @foreach($padron37 as $pad37)
            <tr>
                <td>{{$pad37->nombre}} {{$pad37->ap_paterno}} {{$pad37->ap_materno}}</td><td>{{$pad37->colonia}}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2" style="text-align: center">
                    <?php 
                     $render37 = str_replace('mapa?','mapa37?',$padron37->render());
                    ?>
                    {!! $render37 !!}
                </td>
            </tr>
        </tfoot>
    </table>
</div>