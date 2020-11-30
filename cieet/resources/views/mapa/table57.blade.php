<div class="mt col-lg-12 col-md-12">
    <table id="pagAjax_data57" class="table table-striped table-hover dataTable no-footer"  role="grid" aria-describedby="datatable-table_info">
        <thead>
            <tr>
                <th style="text-align: center;"><b>Nombre</b></th>
                <th style="text-align: center;"><b>Comunidad</b></th>
            </tr>
        </thead>
        <tbody>
            @foreach($padron57 as $pad57)
            <tr>
                <td>{{$pad57->nombre}} {{$pad57->ap_paterno}} {{$pad57->ap_materno}}</td><td>{{$pad57->colonia}}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2" style="text-align: center">
                    <?php 
                     $render57 = str_replace('mapa?','mapa57?',$padron57->render());
                    ?>
                    {!! $render57 !!}
                </td>
            </tr>
        </tfoot>
    </table>
</div>