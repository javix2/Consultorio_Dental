@extends('adminlte::page')

@section('title', 'Moident')

@section('content_header')
<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{asset('vendor/almasaeed2010/adminlte/plugins/fontawesome-free/css/all.min.css')}}">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet"
  href="{{asset('vendor/almasaeed2010/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<!-- iCheck -->
<link rel="stylesheet"
  href="{{asset('vendor/almasaeed2010/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
<!-- JQVMap -->
<link rel="stylesheet" href="{{asset('vendor/almasaeed2010/adminlte/plugins/jqvmap/jqvmap.min.css')}}">
<!-- Theme style -->
<link rel="stylesheet" href="{{asset('vendor/almasaeed2010/adminlte/dist/css/adminlte.min.css')}}">
<!-- overlayScrollbars -->
<link rel="stylesheet"
  href="{{asset('vendor/almasaeed2010/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
<!-- Daterange picker -->
<link rel="stylesheet" href="{{asset('vendor/almasaeed2010/adminlte/plugins/daterangepicker/daterangepicker.css')}}">
<!-- summernote -->
<link rel="stylesheet" href="{{asset('vendor/almasaeed2010/adminlte/plugins/summernote/summernote-bs4.min.css')}}">
{{--  icons  --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<!-- fullCalendar -->
  {{--  <link rel="stylesheet" href="{{asset('plugins/fullcalendar/main.css')}}">  --}}
  <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
  {{--  <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>  --}}
  <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>


</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">


    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="{{ asset('img/image.png') }}" alt="AdminLTELo" height="60" width="60">
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/12da147e45.js" crossorigin="anonymous"></script>

  
    @stop

    @section('content')
    <h1>Escritorio</h1>
  <div class="px-3 py-2">
    <section class="content m-1 mx-0">
      <div class="container-fluid">

        {{--  <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info" style="--bs-text-opacity: .5;">
              <div class="inner">
                <h4>Agendar Cita</h4>
                <p>+</p>
              </div>
              <div class="icon">
                <i class="fa-regular fa-calendar-check"></i>
              </div>
              <a href='cita' class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h4>Pagar</h4>
                <p>+</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-money-bill-wave"></i>
              </div>
              <a href="pago" class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-secondary">
              <div class="inner">
                <h4>Agregar Paciente</h4>
                <p>+</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-people-group"></i>
              </div>
              <a href='paciente' class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">

            <div class="small-box bg-primary">
              <div class="inner">
                <h4>Agregar Tratamiento</h4>
                <p>+</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-user-clock"></i>
              </div>
              <a href="historialtratam" class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>  --}}
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h4>Agenda</h4>
                <p>Historial de citas</p>
              </div>
              <div class="icon">
                <i class="ion ion-calendar"></i>
              </div>
              <a href="cita" class="small-box-footer">Mas información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h4>Pagos<sup style="font-size: 20px"></sup></h4>
                <p>BOB</p>
              </div>
              <div class="icon">
                <i class="ion ion-cash"></i>
              </div>
              <a href="pago" class="small-box-footer">Mas información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h4>Pacientes</h4>
                <p>Gestion de pacientes</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="paciente" class="small-box-footer">Mas información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <h4>Tratamientos</h4>
                <p>Gestion de trataminetos</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-medical"></i>
              </div>
              <a href="historialtratam" class="small-box-footer">Mas información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                  <div class="card-body p-0">
                    <!-- THE CALENDAR -->
                    <div id="calendar" class="full-calendar"></div>
                  </div>
              </div>
            </div>
            
            {{--  <!-- Modal para visualizar un eventos -->  --}}
            <div class="modal fade" id="citaModal" tabindex="-1" >
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="citaModalLabel">Detalles de la Cita</h5>
                          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                              {{--  <span aria-hidden="true">&times;</span>  --}}
                          </button>
                      </div>
                      <div class="modal-body">
                          <p><strong>Título:</strong> <span id="citaTitulo"></span></p>
                          <p><strong>Descripción:</strong> <span id="citaDescripcion"></span></p>
                          <p><strong>Fecha:</strong> <span id="citaFecha"></span></p>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                      </div>
                  </div>
              </div>
          </div>
            
            {{--  Modal para agendar una cita  --}}
            <div class="modal fade" id="agenda_modal" tabindex="-1">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Agendar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>  
                  <form id="formulario_agenda">
                    @csrf
                    <div class="modal-body mx-2 my-1">
                      
                        <div class="row">
                          <div class="col-6">
                            <div class="form-group">
                              <label for="">Fecha</label>
                              <input type="date" class="form-control" id="fecha" name="fecha">
                            </div>
                          </div>
                          <div class="col-3">
                            <div class="form-group">
                              <label for="">hora inicial</label>
                              <input type="time" class="form-control" id="horaInicial" name="horaInicial" required>
                            </div>
                          </div>
                          <div class="col-3">
                            <div class="form-group">
                              <label for="">Tiempo(min)</label>
                              <input type="number" class="form-control" id="tiempo" name="tiempo" required>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label for="paciente">Paciente</label>
                              <select class="form-control" id="paciente" name="paciente">                                
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-6">
                            <div class="form-group">
                              <label for="doctor">Doctor</label>
                              <select name="doctor" id="doctor" class="form-control">
                              </select>
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="form-group">
                              <label for="tratamiento">tratamiento</label>
                              <select name="tratamiento" id="tratamiento" class="form-control">
                              </select>
                            </div>
                          </div>
                        </div>
                        
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label for="">nota</label>
                              <textarea class="form-control" name="motivo" id="motivo" cols="20" rows=""></textarea>
                            </div>
                          </div>
                        </div>
                      
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                      <button onclick="guardar()" type="button" class="btn btn-primary">Guardar</button>
                      
                    </div>
                  </form>
                </div>
              </div>
            </div>

          <!-- View Event Modal -->
          <div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header mx-3">
                          <h5 class="modal-title" id="">Detalles de la Cita</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body mx-4">
                          <p id="eventTitle"></p>
                          <p id="eventDescription"></p>
                          <p id="eventTime"></p>
                          <p id="eventEstado"></p>
                          <p id="eventTratamiento"></p>
                          <p id="eventDoctor"></p>
                      </div>
                      
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" id="deleteEventButton">Eliminar</button>
                        <button type="button" class="btn btn-primary" id="editEventButton">Editar</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

                      </div>
                  </div>
              </div>
          </div>
          {{--  Modal para editar una cita  --}}
          <div class="modal fade" id="editEventModal" tabindex="-1" role="dialog" aria-labelledby="editEventModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Editar Cita</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>  
                <form id="editEventForm">
                  @csrf
                  <div class="modal-body mx-2 my-1">
                      <div class="row">
                        <div class="col-6">
                          <div class="form-group">
                            <label for="editEventFecha">Fecha</label>
                            <input type="date" class="form-control" id="editEventFecha" name="">
                          </div>
                        </div>
                        <div class="col-3">
                          <div class="form-group">
                            <label for="editEventHoraInicio">hora inicial</label>
                            <input type="time" class="form-control" id="editEventHoraInicio" name="" required>
                          </div>
                        </div>
                        <div class="col-3">
                          <div class="form-group">
                            <label for="editEventTiempo">Tiempo(min)</label>
                            <input type="number" class="form-control" id="editEventTiempo" name="" required>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                          <div class="form-group">
                            <label for="editEventPaciente">Paciente</label>
                            <input class="form-control" id="editEventPaciente">                                
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-6">
                          <div class="form-group">
                            <label for="editEventDoctor">Doctor</label>
                            <input class="form-control" id="editEventDoctor">
                            </select>
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="form-group">
                            <label for="editEventTratamiento">tratamiento</label>
                            <input class="form-control" id="editEventTratamiento">
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                          <div class="col-8">
                            <div class="form-group">
                              <label for="editEventMotivo">nota</label>
                              <textarea class="form-control" id="editEventMotivo" cols="20" rows=""></textarea>
                            </div>
                          </div>
                        <div class="col-4">
                            <div class="form-group">
                              <label for="editEventEstado">estado</label>
                              {{--  <select class="form-control" id="editEventEstado" cols="20" rows=""></select>  --}}
                              <select class="form-select" id="editEventEstado">
                                <option value="" selected disabled>Seleccione el estado</option>
                                <option value="atendido">Atendido</option>
                                <option value="no-atendido">Por atender</option>
                                
                              </select>
                            </div>
                        </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="saveChangesButton">Guardar</button>
                    
                  </div>
                </form>
              </div>
            </div>
          </div>

          <!-- Edit Event Modal -->
          <div class="modal fade" id="editEventModal_a" tabindex="-1" role="dialog" aria-labelledby="editEventModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="editEventModalLabel">Editar Evento</h5>
                          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <form id="editEventForm">
                              <input type="hidden" id="editEventId">
                              <div class="form-group">
                                  <label for="editEventTitle">Paciente</label>
                                  <input type="text" class="form-control" id="editEventTitle">
                              </div>
                              <div class="form-group">
                                  <label for="editEventTratamiento">Tratamiento</label>
                                  <input type="text" class="form-control" id="editEventTratamiento">
                              </div>
                              <div class="form-group">
                                  <label for="editEventDoctor">Doctor</label>
                                  <input type="text" class="form-control" id="editEventDoctor">
                              </div>
                              <div class="form-group">
                                  <label for="editEventStart">Inicio</label>
                                  <input type="text" class="form-control" id="editEventStart">
                              </div>
                              <div class="form-group">
                                  <label for="editEventEnd">Fin</label>
                                  <input type="text" class="form-control" id="editEventEnd">
                              </div>
                          </form>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                          <button type="button" class="btn btn-primary" id="saveEventButton">Guardar Cambios</button>
                      </div>
                  </div>
              </div>
          </div>

          </div>
        </section>
      </div>
    </section>
  </div>
    @stop

    @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    @stop

    @section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>


    <!-- fullCalendar -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/locales-all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment/min/moment.min.js"></script>


    
    {{--  <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>  --}}

    {{--  <script src="{{asset('../plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('../plugins/fullcalendar/locales.all.js')}}"></script>  --}}
    {{--  <script src="{{asset('../plugins/fullcalendar/locales/es.js')}}"></script>  --}}

    {{--  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>  --}}
    
    <script>
      var calendar = null;
      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        calendar = new FullCalendar.Calendar(calendarEl, {
          locale: 'es',
          editable: true,
          initialView: 'dayGridMonth',
          headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay',
          },
          navLinks: true, 
          selectable: true,
          selectMirror: true,
          
          select: function(arg){
            //console.log(arg);
            var fechaSeleccionada = arg.startStr; // Formato ISO 8601: "2022-01-01T00:00:00"
            // Establecer el valor del input fecha
            $('#fecha').val(fechaSeleccionada);
            // Mostrar el modal 
            $('#agenda_modal').modal('show');    
            // Cargar doctores
            cargadoctor();
          /*
            $.ajax({
              type: 'GET',
              url: '{{ route("doctor.list") }}',
              success: function(response) {
                // Limpiar select de doctores
                $('#doctor').empty();
                $('#doctor').append('<option value="">Seleccione...</option>');
                // Agregar opciones de doctores
                $.each(response, function(key, value) {
                  $('#doctor').append('<option value="' + value.id + '">' + value.nombre  +" "+ value.paterno +" "+ value.materno +'</option>');
                });
              },
              error: function(xhr, status, error) {
                // Manejar errores
                console.error(xhr.responseText);
              }
            });
            */
            // Cargar tratamientos
            $.ajax({
              type: 'GET',
              url: '{{ route("tratamiento.list") }}',
              success: function(response) {
                // Limpiar select de tratamientos
                $('#tratamiento').empty();
                
                // Agregar opciones de tratamientos
                $.each(response, function(key, value) {
                  $('#tratamiento').append('<option value="">Seleccione...</option>');
                  $('#tratamiento').append('<option value="' + value.id + '">' + value.nombre + '</option>');
                });
              },
              error: function(xhr, status, error) {
                // Manejar errores
                console.error(xhr.responseText);
              }
            });
            // Cargar pacientes
            $.ajax({
              type: 'GET',
              url: '{{ route("paciente.list") }}',
              success: function(response) {
                // Limpiar select de pacientes
                $('#paciente').empty();
                $('#paciente').append('<option value="">Seleccione...</option>');
                // Agregar opciones de pacientes
                $.each(response, function(key, value) {
                  $('#paciente').append('<option value="' + value.id + '">' + value.nombre +" "+ value.paterno +" "+ value.materno + '</option>');
                });
              },
              error: function(xhr, status, error) {
                // Manejar errores
                console.error(xhr.responseText);
              }
            });
            calendar.unselect()
          },
          events: "{{url('/home/show')}}",

          eventClick: function(info) {
            var eventId = info.event.id;
            /*
            alert(eventId);
            alert(info.event.title + " " + "identificador: " + info.event.extendedProps.id);
            alert('hora final: ' + info.event.end);
            alert('tratamiento: ' + info.event.extendedProps.tratamiento);
            alert(info.event.extendedProps.doctor + " " );
            */

            //  $('#eventModal').modal('show');

            $.ajax({
              url: '{{ url("/event") }}/' + eventId,
              method: 'GET',
              success: function(response) {
                  $('#eventModalLabel').text(response.title);
                  $('#eventTitle').text('Paciente: ' + response.title);
                  $('#eventDescription').text('Descripción: ' + (response.description || 'No disponible'));
                  $('#eventTime').text('Hora: ' + response.start);
                  $('#eventTratamiento').text('Tratamiento: ' + (response.tratamiento || 'No disponible'));
                  $('#eventDoctor').text('Doctor: ' + (response.doctor || 'No disponible'));
          
                  var estadoElement = $('#eventEstado');
                  estadoElement.text('Estado: ' + response.estado);
          
                            // Remover las clases existentes
                  estadoElement.removeClass('badge-warning badge-danger');

                  // Añadir la clase apropiada basada en el estado
                  if (response.estado === 'Atendido') {
                      estadoElement.addClass('badge badge-warning'); // amarillo
                  } else if (response.estado === 'Por atender') {
                      estadoElement.addClass('badge badge-danger'); // rojo
                  }

                  $('#editEventButton').data('event', info.event); // Guardar el evento en el botón de editar
                  $('#eventModal').modal('show');
                  },
                  error: function(xhr, status, error) {
                      console.error(xhr.responseText);
                  }
            });
          
          }
        
        });
        calendar.render();

        // modal para la  edicion de datos de la cita
        $('#editEventButton').click(function() {
          var event = $(this).data('event');

          $('#editEventId').val(event.id);
          $('#editEventFecha').val(event.extendedProps.fecha);
          $('#editEventHoraInicio').val(event.extendedProps.hora_inicial);
          $('#editEventTiempo').val(event.extendedProps.tiempo);
          $('#editEventPaciente').val(event.title);
          $('#editEventTratamiento').val(event.extendedProps.tratamiento);
          $('#editEventDoctor').val(event.extendedProps.doctor);
          $('#editEventMotivo').val(event.extendedProps.motivo);
          $('#editEventEstado').val(event.extendedProps.estado);

          //$('#editEventStart').val(event.start.toISOString().slice(0, 16));
          //$('#editEventEnd').val(event.end ? event.end.toISOString().slice(0, 16) : '');

          // Mostrar el modal de edición
          $('#eventModal').modal('hide');
          $('#editEventModal').modal('show');

          // Limpiar los selects antes de llenarlos
          $('#editEventDoctor').empty();
          $('#editEventPaciente').empty();
          $('#editEventTratamiento').empty();
          // Agregar la opción "Seleccione" a los selects
          $('#editEventTratamiento').append(new Option('Seleccione', ''));
          $('#editEventDoctor').append(new Option('Seleccione', ''));
          $('#editEventPaciente').append(new Option('Seleccione', ''));
          // Solicitud AJAX para obtener datos de la base de datos
          /*
          $.ajax({
            type: 'GET',
            url: '{{ route("event.datos") }}',
            //url: '{{url("/get-data")}}',
            method: 'GET',
            success: function(response) {
              console.log(response); // Verifica la estructura de la respuesta
  
              // Poblar select de doctores
              response.doctores.forEach(function(doctor) {
                  $('#editEventDoctor').append(new Option(doctor.nombre, doctor.id));
              });
              $('#editEventDoctor').val(event.extendedProps.doctor); // Seleccionar el valor actual
  
              // Poblar select de pacientes
              response.pacientes.forEach(function(paciente) {
                  $('#editEventPaciente').append(new Option(paciente.nombre, paciente.id));
              });
              $('#editEventPaciente').val(event.extendedProps.paciente); // Seleccionar el valor actual
  
              // Poblar select de tratamientos
              response.tratamientos.forEach(function(tratamiento) {
                  $('#editEventTratamiento').append(new Option(tratamiento.nombre, tratamiento.id));
              });
              $('#editEventTratamiento').val(event.extendedProps.tratamiento); // Seleccionar el valor actual
  
              // Mostrar el modal de edición
              $('#eventModal').modal('hide');
              $('#editEventModal').modal('show');
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
          
          });
            */
        });
        
        // Manejar el guardado de los cambios
    $('#saveChangesButton').click(function() {
      var eventId = $('#editEventId').val();
      var fecha = $('#editEventFecha').val();
      var horaInicio = $('#editEventHoraInicio').val();
      var tiempo = $('#editEventTiempo').val();
      var paciente = $('#editEventPaciente').val();
      var tratamiento = $('#editEventTratamiento').val();
      var doctor = $('#editEventDoctor').val();
      var motivo = $('#editEventMotivo').val();
      var estado = $('#editEventEstado').val();

      var alertMessage = "ID: " + eventId + "\n" +
                   "Fecha: " + fecha + "\n" +
                   "Hora de inicio: " + horaInicio + "\n" +
                   "Tiempo: " + tiempo + "\n" +
                   "Paciente: " + paciente + "\n" +
                   "Tratamiento: " + tratamiento + "\n" +
                   "Doctor: " + doctor + "\n" +
                   "Motivo: " + motivo + "\n" +
                   "Estado: " + estado;

// Mostrar la cadena en un alert
alert(alertMessage);

      $.ajax({
          url: '{{ url("/event2") }}/' + eventId,
          method: 'PUT',
          data: {
              _token: '{{ csrf_token() }}',
              fecha: fecha,
              hora_inicial: horaInicio,
              tiempo: tiempo,
              paciente: paciente,
              tratamiento: tratamiento,
              doctor: doctor,
              motivo: motivo,
              estado: estado
          },
          success: function(response) {
              $('#editEventModal').modal('hide');
              // Aquí puedes actualizar el evento en el calendario si es necesario
              // Por ejemplo, actualiza el evento en FullCalendar
              var event = calendar.getEventById(eventId);
              event.setProp('title', paciente);
              event.setStart(fecha + 'T' + horaInicio);
              event.setEnd(fecha + 'T' + response.hora_final); // Asumiendo que la respuesta contiene la hora final actualizada
              event.setExtendedProp('tratamiento', tratamiento);
              event.setExtendedProp('doctor', doctor);
              event.setExtendedProp('motivo', motivo);
              event.setExtendedProp('estado', estado);

              alert('Evento actualizado exitosamente.');
          },
          error: function(xhr, status, error) {
              console.error(xhr.responseText);
              alert('Ocurrió un error al intentar actualizar el evento.');
          }
        });
  
        });

        //eliminar un evento
        $('#deleteEventButton').click(function() {
          var event = $('#editEventButton').data('event');
          var eventId = event.id;
  
          if (confirm('¿Estás seguro de que deseas eliminar este evento?')) {
              $.ajax({
                  url: '{{ url("/event") }}/' + eventId,
                  method: 'DELETE',
                  data: {
                      _token: '{{ csrf_token() }}'
                  },
                  success: function(response) {
                      // Ocultar el modal de edición
                      $('#editEventModal').modal('hide');
  
                      // Eliminar el evento del calendario
                      event.remove();
  
                      alert('Evento eliminado exitosamente.');
                  },
                  error: function(xhr, status, error) {
                      console.error(xhr.responseText);
                      alert('Ocurrió un error al intentar eliminar el evento.');
                  }
              });
          }
      });

        
      });
      /*
      function guardar() {
        var fd = new FormData(document.getElementById("formulario_agenda"));
        
        let fecha = $("#fecha").val();
        let hora = $("#horaInicial").val();
        let tiempo = $("#tiempo").val();
        let hora_inicial = moment(fecha + " "+ hora).format('HH:mm:ss');
        let hora_final = moment(fecha + " "+ hora).add(tiempo,  'minutes').format('HH:mm:ss');

        fd.append("horaInicial", hora_inicial);
        fd.append("horaFinal", hora_final);
        console.log(fd);

    
        $.ajax({
            url: "{{ route('home.guardar') }}",
            type: "POST",
            data: fd,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
          }).done(function(respuesta){
            //success: function(respuesta) {
                if (respuesta && respuesta.ok) {
                    alert("Se registró la agenda");
                    limpiar();
                    $('#calendar').fullCalendar('refetchEvents'); // Actualizar el calendario
                } else {
                    alert("La agenda ya tiene la fecha y hora seleccionada");
                }
            }),
            /*
            error: function(xhr, textStatus, errorThrown) {
                alert("Error al guardar la agenda");
                console.log(xhr.responseText);
            }
        
      }
      */
      function cargadoctor(){
        $.ajax({
          type: 'GET',
          url: '{{ route("doctor.list") }}',
          success: function(response) {
            // Limpiar select de doctores
            $('#doctor').empty();
            $('#doctor').append('<option value="">Seleccione...</option>');
            // Agregar opciones de doctores
            $.each(response, function(key, value) {
              $('#doctor').append('<option value="' + value.id + '">' + value.nombre  +" "+ value.paterno +" "+ value.materno +'</option>');
            });
          },
          error: function(xhr, status, error) {
            // Manejar errores
            console.error(xhr.responseText);
          }
        });
      }
      function guardar() {
        var fd = new FormData(document.getElementById("formulario_agenda"));
        
        let fecha = $("#fecha").val();
        let hora = $("#horaInicial").val();
        let tiempo = $("#tiempo").val();
        let hora_inicial = moment(fecha + " " + hora).format('HH:mm:ss');
        let hora_final = moment(fecha + " " + hora).add(tiempo, 'minutes').format('HH:mm:ss');
    
        fd.append("horaInicial", hora_inicial);
        fd.append("horaFinal", hora_final);
    
        $.ajax({
            url: "{{ route('home.guardar') }}",
            type: "POST",
            data: fd,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(respuesta) {
                if (respuesta && respuesta.ok) {
                    calendar.refetchEvents();
                    alert("Se registró la agenda");
                    limpiar();
                    //$('#calendar').FullCalendar('refetchEvents'); // Actualizar el calendario
                } else {
                    alert("La agenda ya tiene la fecha y hora seleccionada");
                }
            },
            error: function(xhr, status, error) {
                console.error("Error al guardar la agenda:", xhr.responseText);
                alert("Ocurrió un error al registrar la agenda. Por favor, inténtalo de nuevo.");
            }
        });
      }
      function limpiar(){
        $('#agenda_modal').modal('hide');    
        $("#fecha").val("");
        $("#horaInicial").val("");
        $("#tiempo").val("");
        $("#motivo").val("");
      }

    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
  </script>
    <!-- jQuery -->
    <script src="{{asset('vendor/almasaeed2010/adminlte/plugins/jquery/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('vendor/almasaeed2010/adminlte/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script>

    

    <!-- Bootstrap 4 -->
    <script src="{{asset('vendor/almasaeed2010/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- ChartJS -->
    <script src="{{asset('vendor/almasaeed2010/adminlte/plugins/chart.js/Chart.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{asset('vendor/almasaeed2010/adminlte/plugins/sparklines/sparkline.js')}}"></script>
    <!-- JQVMap -->
    <script src="{{asset('vendor/almasaeed2010/adminlte/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('vendor/almasaeed2010/adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{asset('vendor/almasaeed2010/adminlte/plugins/jquery-knob/jquery.knob.min.')}}"></script>
    <!-- daterangepicker -->
    <script src="{{asset('vendor/almasaeed2010/adminlte/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('vendor/almasaeed2010/adminlte/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script
      src="{{asset('vendor/almasaeed2010/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}">
    </script>
    <!-- Summernote -->
    <script src="{{asset('vendor/almasaeed2010/adminlte/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <!-- overlayScrollbars -->
    <script
      src="{{asset('vendor/almasaeed2010/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}">
    </script>
    <!-- AdminLTE App -->
    <script src="{{asset('vendor/almasaeed2010/adminlte/dist/js/adminlte.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('vendor/almasaeed2010/adminlte/dist/js/demo.js')}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{asset('vendor/almasaeed2010/adminlte/dist/js/pages/dashboard.js')}}"></script>
    @stop