<div class="mt col-lg-12 col-md-12">
    <table id="pagAjax_data10" class="table table-striped table-hover dataTable no-footer"  role="grid" aria-describedby="datatable-table_info">
        <thead>
            <tr>
                <th style="text-align: center;"><b>Nombre</b></th>
                <th style="text-align: center;"><b>Comunidad</b></th>
            </tr>
        </thead>
        <tbody>
            @foreach($padron10 as $pad10)
            <tr>
                <td>{{$pad10->nombre}} {{$pad10->ap_paterno}} {{$pad10->ap_materno}}</td><td>{{$pad10->colonia}}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2" style="text-align: center">
                    <?php 
                     $render10 = str_replace('mapa?','mapa10?',$padron10->render());
                    ?>
                    {!! $render10 !!}
                </td>
            </tr>
        </tfoot>
    </table>
</div>