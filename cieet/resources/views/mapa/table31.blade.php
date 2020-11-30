<div class="mt col-lg-12 col-md-12">
    <table id="pagAjax_data31" class="table table-striped table-hover dataTable no-footer"  role="grid" aria-describedby="datatable-table_info">
        <thead>
            <tr>
                <th style="text-align: center;"><b>Nombre</b></th>
                <th style="text-align: center;"><b>Comunidad</b></th>
            </tr>
        </thead>
        <tbody>
            @foreach($padron31 as $pad31)
            <tr>
                <td>{{$pad31->nombre}} {{$pad31->ap_paterno}} {{$pad31->ap_materno}}</td><td>{{$pad31->colonia}}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2" style="text-align: center">
                    <?php 
                     $render31 = str_replace('mapa?','mapa31?',$padron31->render());
                    ?>
                    {!! $render31 !!}
                </td>
            </tr>
        </tfoot>
    </table>
</div>