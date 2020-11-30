<div class="mt col-lg-12 col-md-12">
    <table id="pagAjax_data39" class="table table-striped table-hover dataTable no-footer"  role="grid" aria-describedby="datatable-table_info">
        <thead>
            <tr>
                <th style="text-align: center;"><b>Nombre</b></th>
                <th style="text-align: center;"><b>Comunidad</b></th>
            </tr>
        </thead>
        <tbody>
            @foreach($padron39 as $pad39)
            <tr>
                <td>{{$pad39->nombre}} {{$pad39->ap_paterno}} {{$pad39->ap_materno}}</td><td>{{$pad39->colonia}}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2" style="text-align: center">
                    <?php 
                     $render39 = str_replace('mapa?','mapa39?',$padron39->render());
                    ?>
                    {!! $render39 !!}
                </td>
            </tr>
        </tfoot>
    </table>
</div>