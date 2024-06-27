@extends('layouts.app')

@section('content')
<meta name="csrf_token" content="{{ csrf_token() }}" />
<!-- Button trigger modal -->

<!-- Modal -->
<div class="container">

    <div class="modal fade" id="calendarioModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Calendario title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control" id="title" placeholder="Ingrese el nombre del evento">
                    <span id="titleError" class="text-danger"></span>
                    <label for="start_time">Hora de inicio</label>
                    <select class="form-control mb-2" id="start_time">
                        <option value="08:00">08:00</option>
                        <option value="09:00">09:00</option>
                        <option value="10:00">10:00</option>
                        <option value="11:00">11:00</option>
                        <option value="12:00">12:00</option>
                        <option value="13:00">13:00</option>
                        <option value="14:00">14:00</option>
                        <option value="15:00">15:00</option>
                        <option value="16:00">16:00</option>
                        <option value="17:00">17:00</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" id="saveBtn" class="btn btn-primary">Guardar cambios</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="text-center mt-5">Servicio de orientación</h3>
                <div class="col-md-11 offset-1 mt-5 mb-5">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
    @endsection
</div>
@push('estilo')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/locale/es.js"></script>

<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
            }
        });

        var calendario = @json($events);

        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay',

            },
            locale: 'es',
            events: calendario,
            selectable: true,
            selectHelper: true,
            select: function(start, end, allDays) {
                $('#calendarioModal').modal('toggle');

                // Deshabilitar opciones seleccionadas previamente para el día específico
                var selectedDate = moment(start).format('YYYY-MM-DD');
                $('#start_time option').prop('disabled', false); // Habilitar todas las opciones primero

                calendario.forEach(function(event) {
                    var eventStartDate = moment(event.start).format('YYYY-MM-DD');
                    var eventStartTime = moment(event.start).format('HH:mm');

                    if (eventStartDate === selectedDate) {
                        $('#start_time option[value="' + eventStartTime + '"]').prop('disabled', true);
                    }
                });

                $('#saveBtn').one('click', function() { // Use 'one' to ensure the event handler is only triggered once
                    var title = $('#title').val();
                    var start_time = $('#start_time').val();
                    var start_date = moment(start).format('YYYY-MM-DD') + ' ' + start_time;
                    var end_date = moment(start).add(1, 'hours').format('YYYY-MM-DD HH:mm'); // Assuming events are 1 hour long

                    $.ajax({
                        url: "{{ route('calendario.store') }}",
                        type: "POST",
                        dataType: 'json',
                        data: {
                            title,
                            start_date,
                            end_date
                        },
                        success: function(response) { //07 parte hora:5:47
                            $('#calendarioModal').modal('hide');
                            $('#calendar').fullCalendar('refetchEvents'); // Refetch events after adding a new event
                        },
                        error: function(error) {
                            if (error.responseJSON.errors) {
                                $('#titleError').html(error.responseJSON.errors.title);
                            }
                        },
                    });
                });
            },
            editable: true,
            eventDrop: function(event) {
                var id = event.id;
                var start_date = moment(event.start).format('YYYY-MM-DD HH:mm');
                var end_date = moment(event.end).format('YYYY-MM-DD HH:mm');

                $.ajax({
                    url: "{{ route('calendario.update', '') }}" + '/' + id,
                    type: "PATCH",
                    dataType: 'json',
                    data: {
                        start_date,
                        end_date
                    },
                    success: function(response) {
                        swal("¡Buen trabajo!", "¡Evento actualizado!", "success");
                        $('#calendar').fullCalendar('refetchEvents'); // Refetch events after updating an event
                    },
                    error: function(error) {
                        console.log(error);
                        swal("Error", "Hubo un problema al actualizar el evento", "error");
                    },
                });
            },

            eventClick: function(event) {
                var id = event.id;
                if (confirm('¿Seguro que quieres eliminar este evento?')) {
                    $.ajax({
                        url: "{{ route('calendario.destroy', '') }}" + '/' + id,
                        type: "DELETE",
                        dataType: 'json',
                        success: function(response) {
                            $('#calendar').fullCalendar('refetchEvents'); // Refetch events after deleting an event
                            swal("¡Buen trabajo!", "Evento eliminado", "success");
                        },
                        error: function(error) {
                            console.log(response);
                        },
                    });
                }
            },
            selectAllow: function(event) {
                return moment(event.start).utcOffset(false).isSame(moment(event.end).subtract(1, 'second').utcOffset(false), 'day');
            }
        });

        $("#calendarioModal").on("hidden.bs.modal", function() {
            $('#saveBtn').unbind(); // Unbind the click event when the modal is hidden
        });
    });
</script>
@endpush