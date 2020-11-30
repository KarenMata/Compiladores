<div class="mt col-lg-12 col-md-12">
    <table id="pagAjax_data2" class="table table-striped table-hover dataTable no-footer"  role="grid" aria-describedby="datatable-table_info">
        <thead>
            <tr>
                <th style="text-align: center;"><b>Nombre</b></th>
                <th style="text-align: center;"><b>Comunidad</b></th>
            </tr>
        </thead>
        <tbody>
            @foreach($padron2 as $pad2)
            <tr>
                <td>{{$pad2->nombre}} {{$pad2->ap_paterno}} {{$pad2->ap_materno}}</td><td>{{$pad2->colonia}}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2" style="text-align: center">
                    <?php 
                     $render2 = str_replace('mapa?','mapa2?',$padron2->render());
                    ?>
                    {!! $render2 !!}
                </td>
            </tr>
        </tfoot>
    </table>
</div>