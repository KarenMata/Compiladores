<div class="mt col-lg-12 col-md-12">
    <table id="pagAjax_data12" class="table table-striped table-hover dataTable no-footer"  role="grid" aria-describedby="datatable-table_info">
        <thead>
            <tr>
                <th style="text-align: center;"><b>Nombre</b></th>
                <th style="text-align: center;"><b>Comunidad</b></th>
            </tr>
        </thead>
        <tbody>
            @foreach($padron12 as $pad12)
            <tr>
                <td>{{$pad12->nombre}} {{$pad12->ap_paterno}} {{$pad12->ap_materno}}</td><td>{{$pad12->colonia}}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2" style="text-align: center">
                    <?php 
                     $render12 = str_replace('mapa?','mapa12?',$padron12->render());
                    ?>
                    {!! $render12 !!}
                </td>
            </tr>
        </tfoot>
    </table>
</div>