<div class="mt col-lg-12 col-md-12">
    <table id="pagAjax_data53" class="table table-striped table-hover dataTable no-footer"  role="grid" aria-describedby="datatable-table_info">
        <thead>
            <tr>
                <th style="text-align: center;"><b>Nombre</b></th>
                <th style="text-align: center;"><b>Comunidad</b></th>
            </tr>
        </thead>
        <tbody>
            @foreach($padron53 as $pad53)
            <tr>
                <td>{{$pad53->nombre}} {{$pad53->ap_paterno}} {{$pad53->ap_materno}}</td><td>{{$pad53->colonia}}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2" style="text-align: center">
                    <?php 
                     $render53 = str_replace('mapa?','mapa53?',$padron53->render());
                    ?>
                    {!! $render53 !!}
                </td>
            </tr>
        </tfoot>
    </table>
</div>