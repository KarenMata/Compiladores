@extends('layouts.app3')

@section('title', 'Main page')

@section('content')
<?php use App\Http\Controllers\SistemaController; ?>
<script type="text/javascript">
            $(document).ready(function() {
                var date = new Date();
                var d = date.getDate();
                var m = date.getMonth();
                var y = date.getFullYear();
                $('#calendar').fullCalendar({
                    header: {
                         center: 'title',
                         left: 'prev, next',
                         right: ''
                    },

                    selectable: true,
                    selectHelper: true,
                    editable: true,
                    <?php echo $events ?>
                     
                    //On Day Select
                    select: function(start, end, allDay) {
                        $('#addNew-event').modal('show');   
                        $('#addNew-event input:text').val('');
                        $('#getStart').val(start);
                        $('#getEnd').val(end);
                        $('#eventFI').val(convertDate2(start));
                    }
                });
                function convertDate(inputFormat) {
                    function pad(s) { return (s < 10) ? '0' + s : s; }
                    var d = new Date(inputFormat);
                    return [d.getFullYear(), pad(d.getMonth()+1), pad(d.getDate())].join('-');
                  }
                function convertDate2(inputFormat) {
                    function pad(s) { return (s < 10) ? '0' + s : s; }
                    var d = new Date(inputFormat);
                    return [pad(d.getDate()), pad(d.getMonth()+1), d.getFullYear()].join('/');
                  }
                $('body').on('click', '#addEvent', function(){
                     var eventForm =  $(this).closest('.modal').find('.form-validation');
                     eventForm.validationEngine('validate');
                     
                     if (!(eventForm).find('.formErrorContent')[0]) {
                          
                          //Event Name
                          var eventName = $('#eventName').val();

                          //Render Event
                          $('#calendar').fullCalendar('renderEvent',{
                               title: eventName,
                               start: $('#getStart').val(),
                               end:  $('#getEnd').val(),
                               allDay: true,
                          },true ); //Stick the event
                          
                          $('#addNew-event form')[0].reset()
                          $('#addNew-event').modal('hide');
                          
                     } 
                });   
            });    
            
            //Calendar views
            $('body').on('click', '.calendar-actions > li > a', function(e){
                e.preventDefault();
                var dataView = $(this).attr('data-view');
                $('#calendar').fullCalendar('changeView', dataView);
                
                //Custom scrollbar
                var overflowRegular, overflowInvisible = false;
                overflowRegular = $('.overflow').niceScroll();     
            });                    
            
       </script>
            <!-- Content -->
            <section id="content" class="container" style="margin-left: 0px">
                
                <h4 class="page-title">CALENDARIO</h4>
                
                <div class="col-md-8 clearfix">
                    
                    <div id="calendar" class="p-relative p-10 m-b-20">
                        <!-- Calendar Views -->
                        <ul class="calendar-actions list-inline clearfix">
                            <li class="p-r-0">
                                <a data-view="month" href="#" class="tooltips" title="Mes">
                                    <i class="sa-list-month"></i>
                                </a>
                            </li>
                            <li class="p-r-0">
                                <a data-view="agendaWeek" href="#" class="tooltips" title="Semana">
                                    <i class="sa-list-week"></i>
                                </a>
                            </li>
                            <li class="p-r-0">
                                <a data-view="agendaDay" href="#" class="tooltips" title="Día">
                                    <i class="sa-list-day"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <h4 class="m-l-5">Próximos eventos</h4>
                    <div class="listview narrow">
                        @foreach($eventos as $evs)
                        <div class="media p-l-5">
                            <div class="media-body">
                                <small class="text-muted">{{SistemaController::dateShow($evs->fecha_inicio)}} - {{SistemaController::dateShow($evs->fecha_fin)}}</small><br>
                                <a class="t-overflow" style="cursor: pointer" onclick="borrarFE({{$evs->id}})">{{$evs->nombre}}</a>
                            </div>
                        </div>
                        @endforeach                       
                    </div>
                </div>

                <!-- Add event -->
<!--                <div class="modal fade" id="addNew-event">
                     <div class="modal-dialog">
                          <div class="modal-content">
                               <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">Agregar un evento</h4>
                               </div>
                               <div class="modal-body">
                                    <form class="form-validation" role="form">
                                         <div class="form-group">
                                              <label for="eventName">Nombre del evento</label>
                                              <input type="text" class="input-sm form-control validate[required]" id="eventName" placeholder="...">
                                         </div>
                                         
                                         <input type="hidden" id="getStart" name='getStart'/>
                                         <input type="hidden" id="getEnd" name='getEnd'/>
                                    </form>
                               </div>
                               
                               <div class="modal-footer">
                                    <input type="submit" class="btn btn-info btn-sm" id="addEvent" value="Agregar evento">
                                    <button type="button" class="btn btn-info btn-sm" data-dismiss="modal">Cerrar</button>
                               </div>
                          </div>
                     </div>
                </div>-->
                <div class="modal fade" id="addNew-event">
                    <div class="modal-dialog">
                         <div class="modal-content">
                              <div class="modal-header">
                                   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                   <h4 class="modal-title">Agregar un evento</h4>
                              </div>
                              <div class="modal-body">
                                   <form class="form-validation form-horizontal" role="form">
                                        <div class="">
                                             <label for="eventName">Nombre del evento</label>
                                             <input type="text" class="input-sm form-control validate[required]" id="eventName" placeholder="...">
                                        </div>
                                        <div class="">
                                             <label for="eventDesc">Descripción del evento</label>
                                             {{Form::textarea('eventDesc',null,['class'=>'form-control validate[required]','id'=>'eventDesc','placeholder'=>'...','size'=>'50x5'])}}
                                        </div>
                                       <div class="form-group">
                                            <div class="col-lg-6 col-md-6">
                                                <label for="eventFI">Fecha inicio</label>
                                                <input type="text" class="input-sm form-control" id="eventFI" readonly>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <label for="eventFF">Fecha fin</label>
                                                <input type="text" class="input-sm form-control datetimepickershort validate[required]" id="eventFF" placeholder="...">
                                            </div>
                                        </div>

                                        <input type="hidden" id="getStart" name='getStart'/>
                                        <input type="hidden" id="getEnd" name='getEnd'/>
                                   </form>
                              </div>

                              <div class="modal-footer">
                                  <input type="submit" class="btn btn-info btn-sm" id="addEvent" value="Agregar evento" onclick="guardaEvento()">
                                   <button type="button" class="btn btn-info btn-sm" data-dismiss="modal">Cerrar</button>
                              </div>
                         </div>
                    </div>
                </div>
                <!-- Modal Resize alert -->
                <div class="modal fade" id="editEvent">
                     <div class="modal-dialog">
                         <div class="modal-content">
                              <div class="modal-header">
                                   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                   <h4 class="modal-title">Ver evento</h4>
                              </div>
                              <div class="modal-body">
                                   <form class="form-validation form-horizontal" role="form">
                                        <div class="">
                                             <label for="eventName">Nombre del evento</label>
                                             <input type="text" class="input-sm form-control validate[required]" id="eventNamev" placeholder="...">
                                        </div>
                                        <div class="">
                                             <label for="eventDesc">Descripción del evento</label>
                                             {{Form::textarea('eventDescv',null,['class'=>'form-control validate[required]','id'=>'eventDescv','placeholder'=>'...','size'=>'50x5'])}}
                                        </div>
                                       <div class="form-group">
                                            <div class="col-lg-6 col-md-6">
                                                <label for="eventFI">Fecha inicio</label>
                                                <input type="text" class="input-sm form-control datetimepickershort validate[required]" id="eventFIv">
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <label for="eventFF">Fecha fin</label>
                                                <input type="text" class="input-sm form-control datetimepickershort validate[required]" id="eventFFv">
                                            </div>
                                        </div>
                                        <input type="hidden" id="idEvento"/>
                                   </form>
                              </div>
                              <div class="modal-footer">
                                  <input type="submit" class="btn btn-info btn-sm" id="addEventv" value="Editar evento" onclick="editaEvento()">
                                   <button type="button" class="btn btn-info btn-sm" data-dismiss="modal">Cerrar</button>
                              </div>
                         </div>
                    </div>
                </div>
                <div class="modal fade" id="verEvent">
                    <div class="modal-dialog">
                         <div class="modal-content">
                              <div class="modal-header">
                                   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                   <h4 class="modal-title">Agregar un evento</h4>
                              </div>
                              <div class="modal-body">
                                   <form class="form-validation form-horizontal" role="form">
                                        <div class="">
                                             <label for="eventName">Nombre del evento</label>
                                             <input type="text" class="input-sm form-control validate[required]" id="eventName" placeholder="...">
                                        </div>
                                        <div class="">
                                             <label for="eventDesc">Descripción del evento</label>
                                             {{Form::textarea('eventDesc',null,['class'=>'form-control validate[required]','id'=>'eventDesc','placeholder'=>'...','size'=>'50x5'])}}
                                        </div>
                                       <div class="form-group">
                                            <div class="col-lg-6 col-md-6">
                                                <label for="eventFI">Fecha inicio</label>
                                                <input type="text" class="input-sm form-control" id="eventFI" readonly>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <label for="eventFF">Fecha fin</label>
                                                <input type="text" class="input-sm form-control datetimepickershort validate[required]" id="eventFF" placeholder="...">
                                            </div>
                                        </div>

                                        <input type="hidden" id="getStart" name='getStart'/>
                                        <input type="hidden" id="getEnd" name='getEnd'/>
                                   </form>
                              </div>

                              <div class="modal-footer">
                                  <input type="submit" class="btn btn-info btn-sm" id="addEvent" value="Agregar evento" onclick="guardaEvento()">
                                   <button type="button" class="btn btn-info btn-sm" data-dismiss="modal">Cerrar</button>
                              </div>
                         </div>
                    </div>
                </div>
                <br/><br/>
            </section>

@endsection