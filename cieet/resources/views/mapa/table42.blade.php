<div class="mt col-lg-12 col-md-12">
    <table id="pagAjax_data42" class="table table-striped table-hover dataTable no-footer"  role="grid" aria-describedby="datatable-table_info">
        <thead>
            <tr>
                <th style="text-align: center;"><b>Nombre</b></th>
                <th style="text-align: center;"><b>Comunidad</b></th>
            </tr>
        </thead>
        <tbody>
            @foreach($padron42 as $pad42)
            <tr>
                <td>{{$pad42->nombre}} {{$pad42->ap_paterno}} {{$pad42->ap_materno}}</td><td>{{$pad42->colonia}}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2" style="text-align: center">
                    <?php 
                     $render42 = str_replace('mapa?','mapa42?',$padron42->render());
                    ?>
                    {!! $render42 !!}
                </td>
            </tr>
        </tfoot>
    </table>
</div>