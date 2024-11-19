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
                <h5>Crear Odontograma</h5>
            </div>

            <!-- Cuerpo de la card -->
            <div class="card-body">
                <div class="row">
                    <!-- Columna de Imagen y Paciente -->
                    <div class="col-md-8">
                        <!-- Imagen -->
                        <div class="text-center mb-3">
                            <img src="{{ URL::asset('/img/mapa_dental.jpg') }}" class="img-thumbnail w-100" alt="Mapa Dental">
                        </div>
                        <!-- Selección de Paciente -->
                        <div>
                            <label for="inputState" class="form-label">Paciente</label>
                            <select id="inputState" class="form-select fst-italic" name="paciente_id">
                                <option selected>Seleccione</option>
                                @foreach($pacientes as $pac)
                                    <option value="{{ $pac->id }}">{{ $pac->nombre }} {{ $pac->paterno }} {{ $pac->materno }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Columna de Número de Diente y Estado -->
                    <div class="col-md-4">
                        <!-- Número de Diente -->
                        <div class="mb-3">
                            <label for="inputAddress" class="form-label">Número de Diente</label>
                            <input type="text" class="form-control" id="inputAddress" name="numero_diente">
                        </div>
                        <!-- Estado -->
                        <div>
                            <label for="floatingTextarea" class="form-label">Estado</label>
                            <textarea class="form-control" id="floatingTextarea" name="estado" rows="4"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pie de la card con los botones de acción -->
            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-check"></i> Guardar</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-regular fa-circle-xmark"></i> Cancelar</button>
            </div>
        </div>
    </div>
</form>


</div>

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