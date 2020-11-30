<div class="mt col-lg-12 col-md-12">
    <table id="pagAjax_data3" class="table table-striped table-hover dataTable no-footer"  role="grid" aria-describedby="datatable-table_info">
        <thead>
            <tr>
                <th style="text-align: center;"><b>Nombre</b></th>
                <th style="text-align: center;"><b>Comunidad</b></th>
            </tr>
        </thead>
        <tbody>
            @foreach($padron3 as $pad3)
            <tr>
                <td>{{$pad3->nombre}} {{$pad3->ap_paterno}} {{$pad3->ap_materno}}</td><td>{{$pad3->colonia}}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2" style="text-align: center">
                    <?php 
                     $render3 = str_replace('mapa?','mapa3?',$padron3->render());
                    ?>
                    {!! $render3 !!}
                </td>
            </tr>
        </tfoot>
    </table>
</div>