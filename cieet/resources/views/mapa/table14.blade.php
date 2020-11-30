<div class="mt col-lg-12 col-md-12">
    <table id="pagAjax_data14" class="table table-striped table-hover dataTable no-footer"  role="grid" aria-describedby="datatable-table_info">
        <thead>
            <tr>
                <th style="text-align: center;"><b>Nombre</b></th>
                <th style="text-align: center;"><b>Comunidad</b></th>
            </tr>
        </thead>
        <tbody>
            @foreach($padron14 as $pad14)
            <tr>
                <td>{{$pad14->nombre}} {{$pad14->ap_paterno}} {{$pad14->ap_materno}}</td><td>{{$pad14->colonia}}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2" style="text-align: center">
                    <?php 
                     $render14 = str_replace('mapa?','mapa14?',$padron14->render());
                    ?>
                    {!! $render14 !!}
                </td>
            </tr>
        </tfoot>
    </table>
</div>