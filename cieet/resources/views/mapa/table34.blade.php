<div class="mt col-lg-12 col-md-12">
    <table id="pagAjax_data34" class="table table-striped table-hover dataTable no-footer"  role="grid" aria-describedby="datatable-table_info">
        <thead>
            <tr>
                <th style="text-align: center;"><b>Nombre</b></th>
                <th style="text-align: center;"><b>Comunidad</b></th>
            </tr>
        </thead>
        <tbody>
            @foreach($padron34 as $pad34)
            <tr>
                <td>{{$pad34->nombre}} {{$pad34->ap_paterno}} {{$pad34->ap_materno}}</td><td>{{$pad34->colonia}}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2" style="text-align: center">
                    <?php 
                     $render34 = str_replace('mapa?','mapa34?',$padron34->render());
                    ?>
                    {!! $render34 !!}
                </td>
            </tr>
        </tfoot>
    </table>
</div>