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
              <div class="modal-body text-start">

                <div class="d-flex justify-content-center mb-4"><h4>Historia Clínica del Paciente</h4></div>
                <div class="row">
                  <div class="col-md-10">
                    <p><strong>Fecha apertura: </strong>{{ $histo->fecha_aper }}</p>
                  </div>
                  <div class="col-md-2">
                      <p><strong>No: </strong>{{ $histo->no_hc }}</p>
                  </div>
                </div>
                <p><strong>Nombre: </strong>{{ $histo->paciente->nombre }} {{ $histo->paciente->paterno}}   {{ $histo->paciente->materno}}</p>
                <div class="row">
                  <div class="col-md-6">
                    <p><strong>edad: </strong>{{ $histo->paciente->edad }}</p>
                </div>
                  <div class="col-md-6">
                      <p><strong>Genero: </strong>{{ $histo->paciente->genero }}</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                      <p><strong>Apoderado: </strong>{{ $histo->apoderado }}</p>
                  </div>
                  <div class="col-md-6">
                      <p><strong>Parentesco: </strong>{{ $histo->parentesco }}</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                      <p><strong>Direccion: </strong>{{ $histo->direccion }}</p>
                  </div>
                  <div class="col-md-6">
                      <p><strong>Celular: </strong>{{ $histo->celular }}</p>
                  </div>
                </div>
                <hr class="my-3">
                <div class="form-group row mt-3s">
                  <h3 class="fs-5 text-primary text-center">Anamnesis</h3>
                </div>
                <p><strong>Motivo: </strong>{{ $histo->motivo }} </p>
                <div class="row">
                  <div class="col-md-4">
                      <p><strong>Enfermedades Activas: </strong>{{ $histo->enf_act }}</p>
                  </div>
                  <div class="col-md-4">
                      <p><strong>Alergias: </strong>{{ $histo->alergias }}</p>
                  </div>
                  <div class="col-md-4">
                    <p><strong>Medicamentos: </strong>{{ $histo->medicamentos }}</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                      <p><strong>Habitos alimenticios: </strong>{{ $histo->hab_alimen }}</p>
                  </div>
                  <div class="col-md-4">
                      <p><strong>Habitos de Hgiene: </strong>{{ $histo->hab_higiene }}</p>
                  </div>
                  <div class="col-md-4">
                    <p><strong>Consumo tabaco: </strong>{{ $histo->tabaco }}</p>
                  </div>
                </div>
                <p><strong>Otros: </strong>{{ $histo->otro }} </p>
                <hr class="my-3">
                <div class="form-group row mt-3s">
                  <h3 class="fs-5 text-primary text-center">Antecedentes Patológicos</h3>
                </div>
                <div class="row">
                  <div class="col-md-4">
                      <p><strong>Cardiovasculares: </strong>{{ $histo->cardiovas }}</p>
                  </div>
                  <div class="col-md-4">
                      <p><strong>Pulmonares: </strong>{{ $histo->pulmonares }}</p>
                  </div>
                  <div class="col-md-4">
                    <p><strong>Renales: </strong>{{ $histo->renales }}</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                      <p><strong>Gastrointestinales: </strong>{{ $histo->gastrointes }}</p>
                  </div>
                  <div class="col-md-4">
                      <p><strong>Endocrinas: </strong>{{ $histo->endocrinas }}</p>
                  </div>
                  <div class="col-md-4">
                    <p><strong>Osteoarticulares: </strong>{{ $histo->osteoarticu }}</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                      <p><strong>Metabolicas: </strong>{{ $histo->metabolicas }}</p>
                  </div>
                  <div class="col-md-4">
                      <p><strong>Infecciosas: </strong>{{ $histo->infecciosas }}</p>
                  </div>
        
                </div>
                <p><strong>Antecedentes intervenciones previas: </strong>{{ $histo->interve_prev }} </p>
                <p><strong>Nota: </strong>{{ $histo->nota }} </p>
    
    
              
    
    
              </div> 
  
  </body>
</html>