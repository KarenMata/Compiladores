<div class="mt col-lg-12 col-md-12">
    <table id="pagAjax_data38" class="table table-striped table-hover dataTable no-footer"  role="grid" aria-describedby="datatable-table_info">
        <thead>
            <tr>
                <th style="text-align: center;"><b>Nombre</b></th>
                <th style="text-align: center;"><b>Comunidad</b></th>
            </tr>
        </thead>
        <tbody>
            @foreach($padron38 as $pad38)
            <tr>
                <td>{{$pad38->nombre}} {{$pad38->ap_paterno}} {{$pad38->ap_materno}}</td><td>{{$pad38->colonia}}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2" style="text-align: center">
                    <?php 
                     $render38 = str_replace('mapa?','mapa38?',$padron38->render());
                    ?>
                    {!! $render38 !!}
                </td>
            </tr>
        </tfoot>
    </table>
</div>