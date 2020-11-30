<div class="mt col-lg-12 col-md-12">
    <table id="pagAjax_data16" class="table table-striped table-hover dataTable no-footer"  role="grid" aria-describedby="datatable-table_info">
        <thead>
            <tr>
                <th style="text-align: center;"><b>Nombre</b></th>
                <th style="text-align: center;"><b>Comunidad</b></th>
            </tr>
        </thead>
        <tbody>
            @foreach($padron16 as $pad16)
            <tr>
                <td>{{$pad16->nombre}} {{$pad16->ap_paterno}} {{$pad16->ap_materno}}</td><td>{{$pad16->colonia}}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2" style="text-align: center">
                    <?php 
                     $render16 = str_replace('mapa?','mapa16?',$padron16->render());
                    ?>
                    {!! $render16 !!}
                </td>
            </tr>
        </tfoot>
    </table>
</div>