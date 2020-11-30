<div class="mt col-lg-12 col-md-12">
    <table id="pagAjax_data26" class="table table-striped table-hover dataTable no-footer"  role="grid" aria-describedby="datatable-table_info">
        <thead>
            <tr>
                <th style="text-align: center;"><b>Nombre</b></th>
                <th style="text-align: center;"><b>Comunidad</b></th>
            </tr>
        </thead>
        <tbody>
            @foreach($padron26 as $pad26)
            <tr>
                <td>{{$pad26->nombre}} {{$pad26->ap_paterno}} {{$pad26->ap_materno}}</td><td>{{$pad26->colonia}}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2" style="text-align: center">
                    <?php 
                     $render26 = str_replace('mapa?','mapa26?',$padron26->render());
                    ?>
                    {!! $render26 !!}
                </td>
            </tr>
        </tfoot>
    </table>
</div>