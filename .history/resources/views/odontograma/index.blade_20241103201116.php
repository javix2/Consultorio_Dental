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
  <div class="container">
    <div class="d-flex justify-content-between align-items-center">
      <h3>Crear Odontograma</h3>
      <a href="{{ route('odontograma.index') }}" class="btn btn-primary">
          <i class="bi bi-plus-circle"></i> Regresar
      </a>
  </div>

  @if(Session::get('success'))
      <div class="alert alert-success mt-2">
          {{ Session::get('success') }}
      </div>
  @endif

  </div>
  <form action="{{ route('odontograma.store') }}" method="POST">
    @csrf
    <div class="container py-3">
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
                    <div class="col-md-6">
                        <!-- Imagen -->
                        <div class="text-center mb-3">
                            <img src="{{ URL::asset('/img/mapa_dental.jpg') }}" class="img-thumbnail w-100" alt="Mapa Dental">
                        </div>

                        <!-- Fila con Número de Diente y Car -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="inputAddress" class="form-label">Número de Diente</label>
                                <input type="text" class="form-control" id="inputAddress" name="numero_diente">
                            </div>
                            <div class="col-md-6">
                                <label for="inputCar" class="form-label">Car</label>
                                <input type="text" class="form-control" id="inputCar" name="car">
                            </div>
                        </div>
                        <div class="mb-3 row align-items-center">
                            <label for="numero_diente" class="form-label col-auto">Número de Diente</label>
                            <div class="col">
                                <select class="form-select" id="numero_diente" name="numero_diente">
                                    <option selected>Seleccione</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <!-- Agrega más opciones según sea necesario -->
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

                        <!-- Botones de acción -->
                        <div class="d-flex justify-content-end mb-3">
                            <button type="submit" class="btn btn-primary me-2"><i class="fa-solid fa-check"></i> Guardar</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-regular fa-circle-xmark"></i> Cancelar</button>
                        </div>
                    </div>

                    <!-- Columna de Búsqueda de Paciente y Tabla -->
                    <div class="col-md-6">
                        <!-- Búsqueda de Paciente -->
                        <div class="mb-3">
                            <label for="searchPaciente" class="form-label">Buscar Paciente</label>
                            <input type="text" class="form-control" id="searchPaciente" placeholder="Ingrese nombre del paciente">
                        </div>

                        <!-- Mostrar datos del paciente -->
                        <div id="pacienteInfo" style="display: none;">
                            <h6>Datos del Paciente:</h6>
                            <p><strong>Nombre:</strong> <span id="nombrePaciente"></span></p>
                            <p><strong>Apellido:</strong> <span id="apellidoPaciente"></span></p>
                            <p><strong>Teléfono:</strong> <span id="telefonoPaciente"></span></p>
                            <!-- Agrega otros campos necesarios -->
                        </div>

                        <!-- Tabla con scroll vertical -->
                        <div class="table-responsive" style="max-height: 200px; overflow-y: auto;">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Número de Diente</th>
                                        <th>Car</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Filas dinámicas de ejemplo -->
                                    <tr>
                                        <td>1</td>
                                        <td>0</td>
                                        <td>Saludable</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>1</td>
                                        <td>Con Caries</td>
                                    </tr>
                                    <tr>
                                      <td>2</td>
                                      <td>1</td>
                                      <td>Con Caries</td>
                                  </tr>
                                  <tr>
                                    <td>2</td>
                                    <td>1</td>
                                    <td>Con Caries</td>
                                </tr>
                                <tr>
                                  <td>2</td>
                                  <td>1</td>
                                  <td>Con Caries</td>
                              </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

<script>
  console.log('Hi!');
</script>

@stop