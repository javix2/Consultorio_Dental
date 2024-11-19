<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    

    {{--  <link rel="icon" href="{{ asset('/img/dentimage.png') }} ">  --}}

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    
    {{--  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">  --}}
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
    
              <div class="modal-body px-2 py-2">
                {{--  @foreach ($pagos as $pago )  --}}
                
                  <h5 class="text-center">Detalles de Pago</h5>
                  <p><strong>ID:</strong> {{ $pago->id }}</p>
                  <p><strong>Nombre:</strong> {{ $pago->paciente->nombre }} {{ $pago->paciente->paterno }} {{ $pago->paciente->materno }}</p>
                  <p><strong>Tratamiento:</strong> {{ $pago->tratamiento->nombre }}</p>
                  <p><strong>Costo Tratamiento:</strong> {{ $pago->tratamiento->costo }}</p>
                  <p><strong>Total Pagado:</strong> {{ $pago->monto_total }}</p>
                  <p><strong>Estado:</strong> 
                    @if($pago->tratamiento->costo<=$pago->monto_total)
                                <span class="badge badge-success">Completado</span>
                            @else
                                <span class="badge badge-warning">Pendiente</span>
                            @endif
                  
                  </p>
                  <p><strong>Ultima fecha de pago:</strong> {{ $pago->fecha_pago }}</p>
                  
                  <!-- Otros detalles del usuario -->
                
                {{--  @endforeach  --}}
                  
              </div>  
  
  </body>
</html>