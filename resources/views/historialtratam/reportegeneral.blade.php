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
      th,td{
        font-size:70%
      }
    </style>
  </head>
  
  <body>
    <div> 
      <img src="{{URL::asset('/img/const.jpg')}}" class="img-thumbnail" alt="..." width="250px">
    </div>
    <h6>Tratamientos Realizados</h6>
    <div>
      <table class="table">
        <thead>
            <tr>
                <th>N°</th>
                <th>Paciente</th>
                <th>Ci</th>
                <th>Tratamiento</th>
                <th>Estado</th>
                 
            </tr>
        </thead>
        <tbody>
            @foreach($trata as $trat)
                <tr>
                    <td>{{ $trata->firstItem() + $loop->index }}</td>

                    <td>{{ $trat->paciente->nombre}} {{ $trat->paciente->paterno }}  {{ $trat->paciente->materno }}</td>          
                    <td>{{ $trat->paciente->ci }}</td>
                    <td>{{ $trat->tratamiento->nombre }}</td>
                    <td>{{ $trat->sesions->first()->estado ?? 'No hay sesiones' }}</td>

                    
                </tr>
            @endforeach
        </tbody>
    </table> 
    </div>
    
  
  </body>
</html>