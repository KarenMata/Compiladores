<div class="mt col-lg-12 col-md-12">
    <table id="pagAjax_data23" class="table table-striped table-hover dataTable no-footer"  role="grid" aria-describedby="datatable-table_info">
        <thead>
            <tr>
                <th style="text-align: center;"><b>Nombre</b></th>
                <th style="text-align: center;"><b>Comunidad</b></th>
            </tr>
        </thead>
        <tbody>
            @foreach($padron23 as $pad23)
            <tr>
                <td>{{$pad23->nombre}} {{$pad23->ap_paterno}} {{$pad23->ap_materno}}</td><td>{{$pad23->colonia}}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2" style="text-align: center">
                    <?php 
                     $render23 = str_replace('mapa?','mapa23?',$padron23->render());
                    ?>
                    {!! $render23 !!}
                </td>
            </tr>
        </tfoot>
    </table>
</div>