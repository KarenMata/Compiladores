<div class="mt col-lg-12 col-md-12">
    <table id="pagAjax_data29" class="table table-striped table-hover dataTable no-footer"  role="grid" aria-describedby="datatable-table_info">
        <thead>
            <tr>
                <th style="text-align: center;"><b>Nombre</b></th>
                <th style="text-align: center;"><b>Comunidad</b></th>
            </tr>
        </thead>
        <tbody>
            @foreach($padron29 as $pad29)
            <tr>
                <td>{{$pad29->nombre}} {{$pad29->ap_paterno}} {{$pad29->ap_materno}}</td><td>{{$pad29->colonia}}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2" style="text-align: center">
                    <?php 
                     $render29 = str_replace('mapa?','mapa29?',$padron29->render());
                    ?>
                    {!! $render29 !!}
                </td>
            </tr>
        </tfoot>
    </table>
</div>