<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset('/img/dentimage.png') }} ">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    
    {{--  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">  --}}
    <title></title>
    <style>
      h6{
        text-align: center
      }
      th,{
        font-size:70%
      }
      td{
        font-size:60%
      }
    </style>
  </head>
  <body>
    <div> 
      <img src="{{URL::asset('/img/const.jpg')}}" class="img-thumbnail" alt="..." width="250px">
    </div>
    <h6>Lista de Pacientes</h6>
    <div>
      
      <h2>Detalles del Doctor</h2><br>
        <p> <strong>Nombre: </strong>{{ $doc->nombre }} {{ $doc->paterno }} {{ $doc->materno }}</p>
        <p><strong>Carnet: </strong>{{ $doc->ci }} {{ $doc->expe}}</p>
        <p><strong>Direccion: </strong>{{ $doc->direccion }}</p>
        <p><strong>Celular: </strong>{{ $doc->celular }}</p> 
    </div>
    
    {{--  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>  --}}
  
  </body>
</html>