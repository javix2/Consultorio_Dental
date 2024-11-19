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
      <h2>Registrar Pago</h2>
  
      <form action="" method="POST">
          @csrf
          <div class="mb-3">
              <label for="patient_id" class="form-label">ID del Paciente</label>
              <input type="number" name="patient_id" id="patient_id" class="form-control" required>
          </div>
  
          <div class="mb-3">
              <label for="total_amount" class="form-label">Monto Total</label>
              <input type="number" name="total_amount" id="total_amount" class="form-control" step="0.01" required>
          </div>
  
          <h4>Cuotas</h4>
          <div id="installments-container">
              <div class="installment">
                  <label>Monto de Cuota</label>
                  <input type="number" name="installments[0][amount]" class="form-control" step="0.01" required>
  
                  <label>Fecha de Vencimiento</label>
                  <input type="date" name="installments[0][due_date]" class="form-control" required>
              </div>
          </div>
  
          <button type="button" onclick="addInstallment()">Agregar otra cuota</button>
          <button type="submit" class="btn btn-primary">Registrar Pago</button>
      </form>
  </div>

  <div class="container">
    <h2>Lista de Pagos</h2>
    
    <table class="table">
        <thead>
            <tr>
                <th>Paciente</th>
                <th>Monto Total</th>
                <th>Cuotas</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $payment)
            <tr>
                <td>{{ $payment->patient->name }}</td>
                <td>{{ $payment->total_amount }}</td>
                <td>
                    <ul>
                        @foreach($payment->installments as $installment)
                        <li>
                            Monto: {{ $installment->amount }} - Fecha: {{ $installment->due_date }} - Pagado: {{ $installment->is_paid ? 'Sí' : 'No' }}
                        </li>
                        @endforeach
                    </ul>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

<script>
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
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>

@stop