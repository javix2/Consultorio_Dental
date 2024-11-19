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
 

  @if(Session::get('success'))
      <div class="alert alert-success mt-2">
          {{ Session::get('success') }}
      </div>
  @endif

  </div>
 
  <div class="container">
    <div class="card">
      <div class="card-header text-center">
        <h3>Gestión del Odontograma</h3>
      </div>
      <div class="card-body">
        <div class="row">
          <!-- Columna de imagen y formulario de nuevo diente -->
          <div class="col-md-6">
            <div class="card">
                <img src="{{ URL::asset('/img/mapa_dental.jpg') }}" class="img-thumbnail w-100" alt="Mapa Dental">

              <div class="card-body">
                {{--  <h5 class="card-title">Agregar Nuevo Diente</h5>  --}}
  
                <!-- Formulario para agregar nuevo diente al paciente encontrado -->
                @if(isset($paciente))
                  <form action="{{ route('odontograma.registrar') }}" method="POST">
                    @csrf
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="num_diente">Número de Diente:</label>
                        {{--  <input type="number" name="num_diente" id="num_diente" class="form-control" required>  --}}
                        <select class="form-select" id="num_diente" name="num_diente">
                            <option selected>Seleccione</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="31">31</option>
                            <option value="32">32</option>
                            <option value="33">33</option>
                            <option value="34">34</option>
                            <option value="35">35</option>
                            <option value="36">36</option>
                            <option value="37">37</option>
                            <option value="38">38</option>
                            <option value="41">41</option>
                            <option value="42">42</option>
                            <option value="43">43</option>
                            <option value="44">44</option>
                            <option value="45">45</option>
                            <option value="46">46</option>
                            <option value="47">47</option>
                            <option value="48">48</option>
                            <!-- Agrega más opciones de números de dientes según sea necesario -->
                        </select>
                    </div>
                      <div class="form-group col-md-6">
                        <label for="lado_diente">Lado del Diente:</label>
                        {{--  <input type="text" name="lado_diente" id="lado_diente" class="form-control" required>  --}}
                        <select class="form-select" id="lado_diente" name="lado_diente">
                            <option selected>Seleccione</option>
                            <option value="distal">distal</option>
                            <option value="mesial">mesial</option>
                            <option value="vestibular">vestibular</option>
                            <option value="lingual">lingual</option>
                            <option value="oclusal">oclusal</option>
                        </select>
                    </div>
                    </div>
  
                    <div class="form-group">
                      <label for="estado">Estado:</label>
                      <input type="text" name="estado" id="estado" class="form-control" required>
                    </div>
  
                    <!-- Campo oculto para el carnet -->
                    <input type="hidden" name="ci" id="ci_hidden" value="{{ $paciente->ci }}">
  
                    <button type="submit" class="btn btn-success mt-2">Registrar Odontograma</button>
                  </form>
                @else
                  <p>Seleccione un paciente para agregar nuevos detalles del diente.</p>
                @endif
              </div>
            </div>
          </div>
  
          <!-- Columna de formulario de búsqueda, información del paciente y tabla -->
          <div class="col-md-6">
            <!-- Formulario de búsqueda -->
            <form action="{{ route('odontograma.buscar') }}" method="GET" class="mb-3">
              <div class="form-row align-items-end">
                <div class="form-group col-md-9">
                  <label for="carnet">Carnet del paciente:</label>
                  <input type="text" name="carnet" id="carnet" class="form-control" required>
                </div>
                <div class="form-group col-md-3">
                  <button type="submit" class="btn btn-primary w-100">Buscar</button>
                </div>
              </div>
            </form>
  
            <!-- Mensaje de error si no se encuentra el paciente -->
            @if(session('error'))
              <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
  
            <!-- Información del paciente -->
            @if(isset($paciente))
              <div class="card mt-3">
                <div class="card-body">
                  <h5 class="card-title">Información del Paciente</h5>
                  <p><strong>Nombre:</strong> {{ $paciente->nombre }}</p>
                  <p><strong>Apellido Paterno:</strong> {{ $paciente->paterno }}</p>
                  <p><strong>Apellido Materno:</strong> {{ $paciente->materno }}</p>
                  <p><strong>Dirección:</strong> {{ $paciente->direccion }}</p>
                  <p><strong>Edad:</strong> {{ $paciente->edad }}</p>
                  <p><strong>Género:</strong> {{ $paciente->genero }}</p>
                  <p><strong>Celular:</strong> {{ $paciente->celular }}</p>
                </div>
              </div>
            @endif
  
            <!-- Tabla con los registros del odontograma del paciente -->
            @if(isset($odontogramas) && $odontogramas->isNotEmpty())
              <div class="table-responsive mt-4" style="max-height: 200px; overflow-y: auto;">
                <table class="table table-bordered table-striped">
                  <thead class="thead-dark">
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
          </div>
        </div>
      </div>
    </div>
  </div>
  
  
  
  
  
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
{{--  <script>
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
    
</script>  --}}
<script>
    // Cargar el CI del paciente en el campo oculto al cargar la página
    document.addEventListener('DOMContentLoaded', () => {
        const savedCi = localStorage.getItem('carnet'); // Suponiendo que 'carnet' en localStorage es el CI
        if (savedCi) {
            document.getElementById('ci_hidden').value = savedCi;
        }
    });
</script>

{{--  <script>
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
</script>  --}}
{{--  document.getElementById('addToothForm').addEventListener('submit', function(e) {
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
});  --}}

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