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
  <form action="{{ route('odontograma.store') }}" method="POST">
    @csrf
    <div class="container py-1">
        <!-- Card contenedor -->
        <div class="card">
            <!-- Encabezado de la card -->
            <div class="card-header text-center">
                <h4>Crear Odontograma</h4>
            </div>

            <!-- Cuerpo de la card -->
            <div class="card-body">
                <div class="row">
                    <!-- Columna de Imagen, Número de Diente y Estado -->
                    <div class="col-md-7">
                        <!-- Imagen -->
                        <div class="text-center mb-3">
                            <img src="{{ URL::asset('/img/mapa_dental.jpg') }}" class="img-thumbnail w-100" alt="Mapa Dental">
                        </div>

                        <!-- Fila con Número de Diente y Car -->
                        <div class="row mb-3">
                            <!-- Número de Diente -->
                            <div class="col-md-6">
                                <label for="numero_diente" class="form-label">Número de Diente</label>
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

                            <!-- lado -->
                            <div class="col-md-6">
                                <label for="car" class="form-label">Lado(C)</label>
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


                        <!-- Estado -->
                        <div class="mb-3 row align-items-center">
                            <label for="estado" class="form-label col-auto">Estado</label>
                            <div class="col">
                                <input type="text" class="form-control" id="estado" name="estado">
                            </div>
                        </div>
                        <!-- Campo oculto para ID del paciente -->
                        <input type="hidden" id="paciente_id" name="paciente_id">

                        <!-- Botones de acción -->
                        <div class="d-flex justify-content-end mb-3">
                            <button type="submit" class="btn btn-primary me-2"><i class="fa-solid fa-check"></i> Agregar</button>
                        </div>
                    </div>

                    <!-- Columna de Búsqueda de Paciente y Tabla -->
                    <div class="col-md-5">
                        <!-- Búsqueda de Paciente -->
                        <div class="mb-3">
                            <label for="pacienteSelect" class="form-label">Seleccionar Paciente</label>
                            <input type="text" class="form-control" id="" name="cedula">
                            
                            {{--  <select id="pacienteSelect" class="form-select" name="paciente_id">
                                <option value="">Seleccione un paciente</option>
                                @foreach($pacientes as $paciente)
                                    <option value="{{ $paciente->id }}">{{ $paciente->nombre }} {{ $paciente->paterno }} {{ $paciente->materno }}</option>
                                @endforeach
                            </select>  --}}
                        </div>

                        <!-- Mostrar datos del paciente -->
                        <div id="pacienteInfo" style="display: none;" class="my-4">
                            <p><strong>Nombre:</strong> <span id="nombrePaciente"></span></p>                            
                            <!-- Fila para Género y Edad -->
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>Género:</strong> <span id="generoPaciente"></span></p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Edad:</strong> <span id="edadPaciente"></span></p>
                                </div>
                            </div>

                            <p><strong>Celular:</strong> <span id="celularPaciente"></span></p>
                            <p><strong>Dirección:</strong> <span id="direccionPaciente"></span></p>
                        </div>


                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<form action="{{ route('odontograma.buscar') }}" method="GET">
    <label for="carnet">Carnet del paciente:</label>
    <input type="text" name="carnet" id="carnet" required>
    <button type="submit">Buscar</button>

    <!-- Tabla con scroll vertical -->
    <div class="table-responsive mt-5" style="max-height: 300px; overflow-y: auto;">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Diente</th>
                    <th>Lado</th>
                    <th>Estado</th>
                    <th>opcion</th>
                </tr>
            </thead>
            <tbody id="odontogramaTableBody">
                {{--  <tr><td colspan="3" class="text-center">Seleccione un paciente para ver los registros</td></tr>  --}}
                @foreach($odontogramas  as $odontograma)
                <tr>
                    {{--  <td>{{ $odontogramas->firstItem() + $loop->index }}</td>  --}}
                    {{--  <td>{{ $pago->paciente->nombre}} {{ $pago->paciente->paterno }}  {{ $pago->paciente->materno }}</td>
                    <td>{{ $pago->tratamiento->nombre }}</td>  --}}
                    <td>{{ $odontograma->num_diente}}</td>
                    <td>{{ $odontograma->lado_diente }}</td>
                    <td>{{ $odontograma->estado}}</td>

                    {{--  <td>
                        <form action="{{ route('pago.destroy', $odontograma->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este registro?')">Eliminar</button>
                        </form>            
                    </td>  --}}
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</form>
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