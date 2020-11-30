<div class="mt col-lg-12 col-md-12">
    <table id="pagAjax_data40" class="table table-striped table-hover dataTable no-footer"  role="grid" aria-describedby="datatable-table_info">
        <thead>
            <tr>
                <th style="text-align: center;"><b>Nombre</b></th>
                <th style="text-align: center;"><b>Comunidad</b></th>
            </tr>
        </thead>
        <tbody>
            @foreach($padron40 as $pad40)
            <tr>
                <td>{{$pad40->nombre}} {{$pad40->ap_paterno}} {{$pad40->ap_materno}}</td><td>{{$pad40->colonia}}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2" style="text-align: center">
                    <?php 
                     $render40 = str_replace('mapa?','mapa40?',$padron40->render());
                    ?>
                    {!! $render40 !!}
                </td>
            </tr>
        </tfoot>
    </table>
</div>