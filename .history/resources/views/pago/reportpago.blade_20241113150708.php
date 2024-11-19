<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset('/img/dentimage.png') }} ">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    
    <title></title>
    <style>
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
    <h6>Lista de Pagos </h6>
    <div>
      <table class="table">
        <thead>
            <tr>
                <th>N°</th>
                <th>Paciente</th>
                <th>Tratamiento</th>
                <th>Total</th>
                <th>Monto</th>
                <th>Fecha de Pago</th>
                <th>Estado</th> 
            </tr>
        </thead>
        <tbody>
            @foreach($histo_tratams as $histo)
                <tr>
                    {{--  <td>{{ $histo_tratams->firstItem() + $loop->index }}</td>  --}}
                    <td>{{ $histo->paciente->nombre}} {{ $histo->paciente->paterno }}  {{ $histo->paciente->materno }}</td>
                    <td>{{ $histo->tratamiento->nombre }}</td>
                    <td>{{ $histo->tratamiento->costo}}</td>
                    <td>{{ $histo->monto_total }}</td>
                    <td>{{ $histo->fecha_pago }}</td>
                    <td>
                        @if($histo->tratamiento->costo<=$histo->monto_total)
                            <span>Completado</span>
                        @else
                            <span>en curso</span>
                        @endif
                    </td>
                    
                </tr>
            @endforeach
        </tbody>
    </table> 
    </div>
    
  
  </body>
</html>