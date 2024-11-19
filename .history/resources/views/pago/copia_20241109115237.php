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

@section('content')
    <h3>Listado de Pagos</h3>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="container">
      <h2>Pacientes con Tratamientos Activos</h2>
  
      <!-- Botón para seleccionar un paciente y registrar tratamiento inicial -->
      <div class="mb-3">
          <a href="" class="btn btn-primary">Registrar Tratamiento Inicial</a>
      </div>
  
      <!-- Tabla de pacientes con tratamientos activos -->
      <table class="table table-bordered">
          <thead>
              <tr>
                  <th>Nombre del Paciente</th>
                  <th>CI</th>
                  <th>Tratamiento</th>
                  <th>Monto Total</th> <!-- Monto total del tratamiento -->
                  <th>Saldo Pendiente</th>
                  <th>Acciones</th>
              </tr>
          </thead>
          <tbody>
              {{--  @foreach($tratamientosActivos as $tratamientoPaciente)
                  <tr>
                      <td>{{ $tratamientoPaciente->paciente->nombre }}</td>
                      <td>{{ $tratamientoPaciente->paciente->ci }}</td>
                      <td>{{ $tratamientoPaciente->tratamiento->descripcion }}</td>
                      <td>{{ $tratamientoPaciente->monto_total }}</td> <!-- Mostrar monto total -->
                      <td>{{ $tratamientoPaciente->saldo }}</td>
                      <td>
                          <a href="" class="btn btn-info">Registrar Pago</a>
                      </td>
                  </tr>
              @endforeach  --}}
          </tbody>
      </table>
  </div>


@endsection

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

<!-- <script>
  let installmentIndex = 1;

  function addInstallment() {
      const container = document.getElementById('installments-container');
      const newInstallment = document.createElement('div');
      newInstallment.classList.add('installment');
      newInstallment.innerHTML = `
          <label>Monto de Cuota</label>
          <input type="number" name="installments[${installmentIndex}][amount]" class="form-control" step="0.01" required>
          <label>Fecha de Vencimiento</label>
          <input type="date" name="installments[${installmentIndex}][due_date]" class="form-control" required>
      `;
      container.appendChild(newInstallment);
      installmentIndex++;
  }
</script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>

@stop