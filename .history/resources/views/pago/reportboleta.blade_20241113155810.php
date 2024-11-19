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
    
              <div class="modal-body px-2 ">
                
                  <h5 class="text-center">Detalles de Pago</h5>
                  {{--  <p><strong>ID:</strong> {{ $pago->id }}</p>  --}}
                  <p><strong>Nombre:</strong> {{ $pago->paciente->nombre }} {{ $pago->paciente->paterno }} {{ $pago->paciente->materno }}</p>
                  <p><strong>Tratamiento:</strong> {{ $pago->tratamiento->nombre }}</p>
                  <p><strong>Costo Tratamiento:</strong> {{ $pago->tratamiento->costo }}</p>
                  <p><strong>Total Pagado:</strong> {{ $pago->monto_total }}</p>
                  <p><strong>Saldo pendiente:</strong> {{ $pago->saldo }}</p>
                  <p><strong>Estado:</strong> 
                    
                      @if($pago->saldo==0)
                          <span class="badge bg-success">Pagado</span>
                      @else
                          <span class="badge bg-warning">Pendiente</span>
                      @endif
                  
                  </p>
                  {{--  <p><strong>Ultima fecha de pago:</strong> {{ $pago->fecha_pago }}</p>   --}}
                  
                  <!-- Tabla de pagos realizados -->
                
                <div class="modal-body">
                    @if($pago->pagos->isNotEmpty())
                    <h5 class="mt-2">Pagos Realizados</h5>
                        <div style="max-height: 150px; overflow-y: auto;">
                            <!-- Ajustar el ancho de la tabla con una clase personalizada o de Bootstrap -->
                            <table class="table table-bordered table-sm mt-2 w-75 mx-auto">
                                <thead>
                                    <tr>
                                        <th>Fecha de Pago</th>
                                        <th>Monto</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pago->pagos as $pago)
                                        <tr>
                                            <td>{{ $pago->created_at->format('d/m/Y H:i') }}</td>
                                            <td>{{ $pago->monto }}</td>
                                            <td>
                                                <!-- Botones de Editar y Eliminar -->
                                                <div class="d-flex justify-content-around">
                                                    <a href="" class="btn btn-sm"><i class="fa-solid fa-pen" style="color: #67b9fc;"></i></a>
                                                    <form action="" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este pago?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm"><i class="fa-regular fa-square-minus" style="color: #ff1c1c;"></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p>No se han registrado pagos aún.</p>
                    @endif
                </div>
              </div>  
  
  </body>
</html>