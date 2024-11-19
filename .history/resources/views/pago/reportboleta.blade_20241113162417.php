<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    
    <link rel="shortcut icon" href="{{ asset('favicons/images.png') }}"/>
    
    <title></title>
    <style>
      body{
        font-size: .8rem;
      }
      h6{
        text-align: center
      }
      th,td{
        font-size:70%
      }
    </style>
  </head>
  
  <body>
    <div> 
      <img src="{{URL::asset('/img/const.jpg')}}" class="img-thumbnail" alt="..." width="250px">
    </div>
    
    <div class="modal-body px-2">
        <p class="text-center mb-1"><strong>Detalles de Pago</strong></p>
        <p class="mb-0"><strong>Nombre:</strong> {{ $pago->paciente->nombre }} {{ $pago->paciente->paterno }} {{ $pago->paciente->materno }}</p>
        <p class="mb-0"><strong>Tratamiento:</strong> {{ $pago->tratamiento->nombre }}</p>
        <p class="mb-0"><strong>Costo Tratamiento:</strong> {{ $pago->tratamiento->costo }}</p>
        <p class="mb-0"><strong>Total Pagado:</strong> {{ $pago->monto_total }}</p>
        <p class="mb-0"><strong>Saldo pendiente:</strong> {{ $pago->saldo }}</p>
        <p class="mb-0"><strong>Estado:</strong> 
            @if($pago->saldo==0)
                <span class="badge bg-success">Pagado</span>
            @else
                <span class="badge bg-warning">Pendiente</span>
            @endif
        </p>
        
        <!-- Lista de pagos realizados -->
        <div class="mt-2">
            @if($pago->pagos->isNotEmpty())
                <p class="mt-2 mb-1"><strong>Pagos Realizados:</strong></p>
                <ul class="list-group list-group-flush" style="max-height: 150px; overflow-y: auto;">
                    @foreach($pago->pagos as $pago)
                        <li class="list-group-item d-flex justify-content-between align-items-center p-1">
                            <div class="d-flex w-100 justify-content-between">
                                <div class="text-muted small">
                                    <strong>Fecha:</strong> {{ $pago->created_at->format('d/m/Y H:i') }} <strong>Monto:</strong>{{  $pago->monto }} {{"Bs."}}
                                </div>
                                <div class="text-muted small">
                                    <strong>Monto:</strong> {{ $pago->monto }} {{"Bs."}}
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <p>No se han registrado pagos aún.</p>
            @endif
        </div>
    </div>  
</body>


</html>