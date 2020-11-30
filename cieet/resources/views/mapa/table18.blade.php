<div class="mt col-lg-12 col-md-12">
    <table id="pagAjax_data1" class="table table-striped table-hover dataTable no-footer"  role="grid" aria-describedby="datatable-table_info">
        <thead>
            <tr>
                <th style="text-align: center;"><b>Nombre</b></th>
                <th style="text-align: center;"><b>Comunidad</b></th>
            </tr>
        </thead>
        <tbody>
            @foreach($padron18 as $pad18)
            <tr>
                <td>{{$pad18->nombre}} {{$pad18->ap_paterno}} {{$pad18->ap_materno}}</td><td>{{$pad18->colonia}}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2" style="text-align: center">
                    <?php 
                     $render18 = str_replace('mapa?','mapa18?',$padron18->render());
                    ?>
                    {!! $render18 !!}
                </td>
            </tr>
        </tfoot>
    </table>
</div>