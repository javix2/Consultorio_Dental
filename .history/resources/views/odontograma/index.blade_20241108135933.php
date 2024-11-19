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
<meta name="csrf-token" content="{{ csrf_token() }}">

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
  <!-- Formulario para buscar paciente por carnet -->
  <form action="{{ route('odontograma.buscar') }}" method="GET">
      <label for="carnet">Carnet del paciente:</label>
      <input type="text" name="carnet" id="carnet" required>
      <button type="submit">Buscar</button>
  </form>
  
  @if(session('error'))
      <div>{{ session('error') }}</div>
  @endif
  
  @if(isset($odontogramas) && $odontogramas->isNotEmpty())
      <!-- Tabla con los registros del odontograma del paciente -->
      <div class="table-responsive mt-5" style="max-height: 300px; overflow-y: auto;">
          <table class="table table-bordered">
              <thead>
                  <tr>
                      <th>Diente</th>
                      <th>Lado</th>
                      <th>Estado</th>
                  </tr>
              </thead>
              <tbody id="odontogramaTableBody">
                  @foreach($odontogramas as $odontograma)
                      <tr>
                          <td>{{ $odontograma->num_diente }}</td>
                          <td>{{ $odontograma->lado_diente }}</td>
                          <td>{{ $odontograma->estado }}</td>
                      </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
  @else
      <p class="mt-3">Seleccione un paciente para ver los registros.</p>
  @endif
  
  @if(isset($paciente))
      <!-- Formulario para agregar nuevo diente al paciente encontrado -->
      <form id="addOdontogramForm">
        <label for="num_diente">Número de Diente:</label>
        <input type="text" name="num_diente" id="num_diente" required>
    
        <label for="lado_diente">Lado del Diente:</label>
        <input type="text" name="lado_diente" id="lado_diente" required>
    
        <label for="estado">Estado:</label>
        <input type="text" name="estado" id="estado" required>
    
        <!-- Campo oculto para el carnet -->
        <input type="hidden" name="carnet" id="carnet_hidden">
    
        <button type="submit">Registrar Odontograma</button>
    </form>
    
    
  @endif
  
  {{--  document.getElementById('addToothForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(this);
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    fetch('{{ route("odontograma.registrar") }}', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    })
    .then(response => response.json().then(data => ({status: response.status, body: data})))
    .then(({status, body}) => {
        if (status === 200 && body.id) {
            const tableBody = document.getElementById('odontogramaTableBody');
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td>${body.num_diente}</td>
                <td>${body.lado_diente}</td>
                <td>${body.estado}</td>
            `;
            tableBody.appendChild(newRow);
            document.getElementById('addToothForm').reset();
        } else {
            console.error('Error en la respuesta:', body.error || 'Respuesta inesperada');
            alert('Error al registrar el diente: ' + (body.error || 'Error desconocido'));
        }
    })
    .catch(error => {
        console.error('Error de conexión o en el código:', error);
        alert('Ocurrió un error al registrar el diente');
    });
});  --}}
</main>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Recuperar el carnet del paciente desde localStorage y establecer en el campo oculto
        const savedCarnet = localStorage.getItem('carnet');
        const carnetHiddenInput = document.getElementById('carnet_hidden');
        if (savedCarnet) {
            carnetHiddenInput.value = savedCarnet;
        }
    
        // Agregar un listener al formulario de registro de odontograma
        document.getElementById('addOdontogramForm').addEventListener('submit', function(e) {
            e.preventDefault(); // Evitar recargar la página
    
            // Crear el objeto FormData para los datos del formulario
            const formData = new FormData(this);
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
            // Enviar los datos con fetch
            fetch('{{ route("odontograma.registrar") }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.id) {
                    // Actualizar la tabla con el nuevo odontograma
                    const tableBody = document.getElementById('odontogramaTableBody');
                    const newRow = document.createElement('tr');
                    newRow.innerHTML = `
                        <td>${data.num_diente}</td>
                        <td>${data.lado_diente}</td>
                        <td>${data.estado}</td>
                    `;
                    tableBody.appendChild(newRow);
    
                    // Limpiar el formulario
                    this.reset();
                    carnetHiddenInput.value = savedCarnet; // Asegurar que el carnet oculto se mantenga
                } else {
                    console.error('Error al registrar:', data.message || 'Error desconocido');
                    alert('Error al registrar el odontograma');
                }
            })
            .catch(error => {
                console.error('Error de conexión o en el código:', error);
                alert('Ocurrió un error al registrar el odontograma');
            });
        });
    });
    
</script>

<script>
    // Obtener el input del número de carnet
    const carnetInput = document.getElementById('carnet');

    // Recuperar el valor del número de carnet desde localStorage al cargar la página
    document.addEventListener('DOMContentLoaded', (event) => {
        const savedCarnet = localStorage.getItem('carnet');
        if (savedCarnet) {
            carnetInput.value = savedCarnet;
        }
    });

    // Guardar el número de carnet en localStorage cada vez que se cambie el valor del input
    carnetInput.addEventListener('input', () => {
        localStorage.setItem('carnet', carnetInput.value);
    });
</script>
document.getElementById('addToothForm').addEventListener('submit', function(e) {
    e.preventDefault();

    // Obtener datos del formulario
    const formData = new FormData(this);
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    fetch("{{ route('odontograma.registrar') }}", {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.id) {
            // Actualizar la tabla de odontogramas con el nuevo diente
            const tableBody = document.getElementById('odontogramaTableBody');
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td>${data.num_diente}</td>
                <td>${data.lado_diente}</td>
                <td>${data.estado}</td>
            `;
            tableBody.appendChild(newRow);
            
            // Limpiar el formulario
            document.getElementById('addToothForm').reset();
        } else {
            alert('Error al registrar el diente.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Ocurrió un error al registrar el diente.');
    });
});

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
{{--  <script>
    document.getElementById('addToothForm').addEventListener('submit', function(e) {
        e.preventDefault();
    
        const formData = new FormData(this);
    
        fetch('{{ route("odontograma.registrar") }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.id) {
                // Agrega el nuevo registro a la tabla
                const tableBody = document.getElementById('odontogramaTableBody');
                const newRow = document.createElement('tr');
    
                newRow.innerHTML = `
                    <td>${data.diente}</td>
                    <td>${data.lado}</td>
                    <td>${data.estado}</td>
                `;
                tableBody.appendChild(newRow);
    
                // Limpia el formulario
                document.getElementById('addToothForm').reset();
            } else {
                alert('Error al registrar el diente');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Ocurrió un error al registrar el diente');
        });
    });
    </script>  --}}
    

    
@stop