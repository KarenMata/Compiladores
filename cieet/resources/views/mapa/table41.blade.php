<div class="mt col-lg-12 col-md-12">
    <table id="pagAjax_data41" class="table table-striped table-hover dataTable no-footer"  role="grid" aria-describedby="datatable-table_info">
        <thead>
            <tr>
                <th style="text-align: center;"><b>Nombre</b></th>
                <th style="text-align: center;"><b>Comunidad</b></th>
            </tr>
        </thead>
        <tbody>
            @foreach($padron41 as $pad41)
            <tr>
                <td>{{$pad41->nombre}} {{$pad41->ap_paterno}} {{$pad41->ap_materno}}</td><td>{{$pad41->colonia}}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2" style="text-align: center">
                    <?php 
                     $render41 = str_replace('mapa?','mapa41?',$padron41->render());
                    ?>
                    {!! $render41 !!}
                </td>
            </tr>
        </tfoot>
    </table>
</div>