<div class="mt col-lg-12 col-md-12">
    <table id="pagAjax_data28" class="table table-striped table-hover dataTable no-footer"  role="grid" aria-describedby="datatable-table_info">
        <thead>
            <tr>
                <th style="text-align: center;"><b>Nombre</b></th>
                <th style="text-align: center;"><b>Comunidad</b></th>
            </tr>
        </thead>
        <tbody>
            @foreach($padron28 as $pad28)
            <tr>
                <td>{{$pad28->nombre}} {{$pad28->ap_paterno}} {{$pad28->ap_materno}}</td><td>{{$pad28->colonia}}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2" style="text-align: center">
                    <?php 
                     $render28 = str_replace('mapa?','mapa28?',$padron28->render());
                    ?>
                    {!! $render28 !!}
                </td>
            </tr>
        </tfoot>
    </table>
</div>