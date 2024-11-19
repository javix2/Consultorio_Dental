@extends('adminlte::page')

@section('title', 'Moident')

@section('content_header')
<!--h1>Dashboard</h1-->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/12da147e45.js" crossorigin="anonymous"></script>

@stop

@section ('content')

<main>
  {{--  <div class="container">
    <div class="d-flex justify-content-between align-items-center">
      <h3>Crear Odontograma</h3>
      <a href="{{ route('odontograma.index') }}" class="btn btn-primary">
          <i class="bi bi-plus-circle"></i> Regresar
      </a>
  </div>  --}}

  @if(Session::get('success'))
      <div class="alert alert-success mt-2">
          {{ Session::get('success') }}
      </div>
  @endif

  </div>


  <form action="{{ route('odontograma.buscar') }}" method="GET">
    <label for="carnet">Carnet del paciente:</label>
    <input type="text" name="carnet" id="carnet" required>
    <button type="submit">Buscar</button>
</form>

@if(isset($odontogramas) && $odontogramas->isNotEmpty())
    <!-- Tabla con scroll vertical -->
    <div class="table-responsive mt-5" style="max-height: 300px; overflow-y: auto;">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Diente</th>
                    <th>Lado</th>
                    <th>Estado</th>
                    <th>Opción</th>
                </tr>
            </thead>
            <tbody id="odontogramaTableBody">
                @foreach($odontogramas as $odontograma)
                    <tr>
                        <td>{{ $odontograma->num_diente }}</td>
                        <td>{{ $odontograma->lado_diente }}</td>
                        <td>{{ $odontograma->estado }}</td>
                        <td>
                            <form action="{{ route('pago.destroy', $odontograma->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sidebar btn-sm" onclick="return confirm('¿Estás seguro de eliminar este registro?')"><i class="fa-regular fa-trash-can"></i></button>
                            </form>            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <p class="mt-3">Seleccione un paciente para ver los registros.</p>
@endif

</main>


@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<script>

var res = function(){
  var not = confirm("¿Estas seguro de eliminar este registro?");
  return not;
}
</script>

{{--  <!-- Script para la búsqueda al presionar Enter -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#searchDNI').on('keydown', function(event) {
            if (event.key === "Enter") { // Verifica si la tecla presionada es Enter
                event.preventDefault(); // Prevenir el envío del formulario
                var ci = $(this).val();

                if(ci.length >= 5) { // Realizar búsqueda cuando hay al menos 5 caracteres
                    $.ajax({
                        url: "{{ route('buscar.paciente') }}", // Ruta del endpoint de búsqueda
                        method: "GET",
                        data: { ci: ci },
                        success: function(data) {
                            if(data) {
                                $('#nombrePaciente').text(data.nombre + ' ' + data.paterno + ' ' + data.materno);
                                $('#celularPaciente').text(data.celular);
                                $('#generoPaciente').text(data.genero);
                                $('#edadPaciente').text(data.edad);
                                $('#direccionPaciente').text(data.direccion);
                                
                                // Establecer el ID del paciente en el campo oculto
                                $('#paciente_id').val(data.id);

                                $('#pacienteInfo').show();
                            } else {
                                $('#pacienteInfo').hide();
                            }
                        }
                    });
                } else {
                    $('#pacienteInfo').hide();
                }
            }
        });
    });
</script>  --}}
{{--  <!-- jQuery (asegúrate de tener jQuery en tu proyecto) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#pacienteSelect').on('change', function() {
            var pacienteId = $(this).val();

            if (pacienteId) {
                $.ajax({
                    url: '/obtener-odontograma/' + pacienteId,
                    method: 'GET',
                    success: function(data) {
                        var tableBody = $('#odontogramaTableBody');
                        tableBody.empty();

                        if (data.length > 0) {
                            data.forEach(function(odontograma) {
                                var row = `
                                    <tr>
                                        <td>${odontograma.num_diente}</td>
                                        <td>${odontograma.lado_diente}</td>
                                        <td>${odontograma.estado}</td>
                                    </tr>
                                `;
                                tableBody.append(row);
                            });
                        } else {
                            tableBody.append('<tr><td colspan="3" class="text-center">No hay registros de odontograma para este paciente.</td></tr>');
                        }
                    }
                });
            } else {
                $('#odontogramaTableBody').html('<tr><td colspan="3" class="text-center">Seleccione un paciente para ver los registros</td></tr>');
            }
        });
    });
</script>  --}}
@stop