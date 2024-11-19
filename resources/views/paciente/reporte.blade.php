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
      <table class="table table-striped table-hover tex table-sm">

        <thead>
          <tr>
            <th scope="col">N°</th>
            <th scope="col">Ci</th>
            <th scope="col">Nombre Completo</th>
            <th scope="col">Dirección</th>
            <th scope="col">Celular</th>
            <th scope="col">Fecha/Nac</th>
            <th scope="col">Genero</th>
            <th scope="col">Edad</th>
          </tr>
        </thead>
        <tbody class="table-group-divider">
          @foreach($pacientes as $pac)
          <tr>
            <td>{{$pacientes->firstItem() + $loop->index }}</td>
            <td>{{$pac->ci}} {{$pac->expe}}</td>
            <td>{{$pac->nombre}} {{$pac->paterno}} {{$pac->materno}}</td>
            <td>{{$pac->direccion}}</td>
            <td>{{$pac->celular}}</td>
            <td>{{$pac->fecha_nac}}</td>
            <td>{{$pac->genero}}</td>
            <td>{{$pac->edad}}</td> 
          @endforeach
  
          </tr>
        </tbody>
        
      </table>  
    </div>
    
    {{--  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>  --}}
  
  </body>
</html>