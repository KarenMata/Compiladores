<div class="mt col-lg-12 col-md-12">
    <table id="pagAjax_data36" class="table table-striped table-hover dataTable no-footer"  role="grid" aria-describedby="datatable-table_info">
        <thead>
            <tr>
                <th style="text-align: center;"><b>Nombre</b></th>
                <th style="text-align: center;"><b>Comunidad</b></th>
            </tr>
        </thead>
        <tbody>
            @foreach($padron36 as $pad36)
            <tr>
                <td>{{$pad36->nombre}} {{$pad36->ap_paterno}} {{$pad36->ap_materno}}</td><td>{{$pad36->colonia}}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2" style="text-align: center">
                    <?php 
                     $render36 = str_replace('mapa?','mapa36?',$padron36->render());
                    ?>
                    {!! $render36 !!}
                </td>
            </tr>
        </tfoot>
    </table>
</div>