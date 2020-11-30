<div class="mt col-lg-12 col-md-12">
    <table id="pagAjax_data54" class="table table-striped table-hover dataTable no-footer"  role="grid" aria-describedby="datatable-table_info">
        <thead>
            <tr>
                <th style="text-align: center;"><b>Nombre</b></th>
                <th style="text-align: center;"><b>Comunidad</b></th>
            </tr>
        </thead>
        <tbody>
            @foreach($padron54 as $pad54)
            <tr>
                <td>{{$pad54->nombre}} {{$pad54->ap_paterno}} {{$pad54->ap_materno}}</td><td>{{$pad54->colonia}}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2" style="text-align: center">
                    <?php 
                     $render54 = str_replace('mapa?','mapa54?',$padron54->render());
                    ?>
                    {!! $render54 !!}
                </td>
            </tr>
        </tfoot>
    </table>
</div>