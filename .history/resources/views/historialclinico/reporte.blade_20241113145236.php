<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    
    {{--  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">  --}}
    <link rel="shortcut icon" href="{{ asset('favicons/images.png') }}"/>
    
    <title></title>
    {{--  <style>
      body{
        font-size: .8rem;
      }
      h6{
        text-align: center
      }
      th,td{
        font-size:70%
      }
    </style>  --}}
    <style>
      /* Configuración general */
      body {
        font-family: Arial, sans-serif;
        color: #333;
        font-size: 12px;
        margin: 0;
        padding: 0;
      }
    
      .container {
        padding: 10px;
        margin: auto;
        max-width: 800px;
      }
    
      /* Imagen */
      .img-thumbnail {
        display: block;
        margin: 0 auto 15px;
        width: 150px;
        border-radius: 5px;
      }
    
      /* Títulos */
      h5 {
        font-size: 14px;
        color: #0056b3;
        text-align: center;
        margin: 5px 0;
      }
    
      .section-title {
        font-size: 13px;
        color: #0056b3;
        text-align: center;
        border-bottom: 1px solid #ddd;
        padding-bottom: 3px;
        margin-top: 15px;
      }
    
      /* Estilo del texto */
      .label {
        font-weight: bold;
      }
    
      /* Sistema de filas y columnas */
      .row {
        display: flex;
        flex-wrap: wrap;
        margin-bottom: 10px;
      }
    
      .col-6 {
        width: 50%;
        padding: 5px;
      }
    
      .col-4 {
        width: 33.33%;
        padding: 5px;
      }
    
      .col-12 {
        width: 100%;
        padding: 5px;
      }
    
      /* Ajustes de espaciado */
      p {
        margin: 3px 0;
      }
    
      hr {
        border: 0;
        height: 1px;
        background: #ddd;
        margin: 15px 0;
      }
    </style>
    
    

    
  </head>
  
  <body>
    <div> 
      <img src="{{URL::asset('/img/const.jpg')}}" class="img-thumbnail" alt="..." width="300px">
    </div>
              <div class="modal-body text-start">

                <div class="d-flex justify-content-center mb-4"><h5>Historia Clínica del Paciente</h5></div>
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
                  <h5 class="fs-5 text-primary text-center">Anamnesis</h5>
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
                  <h5 class="fs-5 text-primary text-center">Antecedentes Patológicos</h5>
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

  {{--  <body>
    <div class="container">
      <!-- Imagen -->
      <div>
        <img src="{{ URL::asset('/img/const.jpg') }}" class="img-thumbnail" alt="..." width="150px">
      </div>
  
      <!-- Título principal -->
      <h5>Historia Clínica del Paciente</h5>
  
      <!-- Información general -->
      <div class="row">
        <div class="col-6"><p><span class="label">Fecha apertura:</span> {{ $histo->fecha_aper }}</p></div>
        <div class="col-6"><p><span class="label">No:</span> {{ $histo->no_hc }}</p></div>
      </div>
      <div class="row">
        <div class="col-12"><p><span class="label">Nombre:</span> {{ $histo->paciente->nombre }} {{ $histo->paciente->paterno}} {{ $histo->paciente->materno }}</p></div>
      </div>
      <div class="row">
        <div class="col-6"><p><span class="label">Edad:</span> {{ $histo->paciente->edad }}</p></div>
        <div class="col-6"><p><span class="label">Género:</span> {{ $histo->paciente->genero }}</p></div>
      </div>
  
      <!-- Apoderado y Contacto -->
      <div class="row">
        <div class="col-6"><p><span class="label">Apoderado:</span> {{ $histo->apoderado }}</p></div>
        <div class="col-6"><p><span class="label">Parentesco:</span> {{ $histo->parentesco }}</p></div>
      </div>
      <div class="row">
        <div class="col-6"><p><span class="label">Dirección:</span> {{ $histo->direccion }}</p></div>
        <div class="col-6"><p><span class="label">Celular:</span> {{ $histo->celular }}</p></div>
      </div>
  
      <!-- Separador -->
      <hr>
  
      <!-- Anamnesis -->
      <h5 class="section-title">Anamnesis</h5>
      <div class="row">
        <div class="col-12"><p><span class="label">Motivo:</span> {{ $histo->motivo }}</p></div>
      </div>
      <div class="row">
        <div class="col-4"><p><span class="label">Enfermedades Activas:</span> {{ $histo->enf_act }}</p></div>
        <div class="col-4"><p><span class="label">Alergias:</span> {{ $histo->alergias }}</p></div>
        <div class="col-4"><p><span class="label">Medicamentos:</span> {{ $histo->medicamentos }}</p></div>
      </div>
      <div class="row">
        <div class="col-4"><p><span class="label">Hábitos alimenticios:</span> {{ $histo->hab_alimen }}</p></div>
        <div class="col-4"><p><span class="label">Hábitos de Higiene:</span> {{ $histo->hab_higiene }}</p></div>
        <div class="col-4"><p><span class="label">Consumo de tabaco:</span> {{ $histo->tabaco }}</p></div>
      </div>
      <div class="row">
        <div class="col-12"><p><span class="label">Otros:</span> {{ $histo->otro }}</p></div>
      </div>
  
      <!-- Separador -->
      <hr>
  
      <!-- Antecedentes Patológicos -->
      <h5 class="section-title">Antecedentes Patológicos</h5>
      <div class="row">
        <div class="col-4"><p><span class="label">Cardiovasculares:</span> {{ $histo->cardiovas }}</p></div>
        <div class="col-4"><p><span class="label">Pulmonares:</span> {{ $histo->pulmonares }}</p></div>
        <div class="col-4"><p><span class="label">Renales:</span> {{ $histo->renales }}</p></div>
      </div>
      <div class="row">
        <div class="col-4"><p><span class="label">Gastrointestinales:</span> {{ $histo->gastrointes }}</p></div>
        <div class="col-4"><p><span class="label">Endocrinas:</span> {{ $histo->endocrinas }}</p></div>
        <div class="col-4"><p><span class="label">Osteoarticulares:</span> {{ $histo->osteoarticu }}</p></div>
      </div>
      <div class="row">
        <div class="col-4"><p><span class="label">Metabólicas:</span> {{ $histo->metabolicas }}</p></div>
        <div class="col-4"><p><span class="label">Infecciosas:</span> {{ $histo->infecciosas }}</p></div>
      </div>
      <div class="row">
        <div class="col-12"><p><span class="label">Antecedentes de intervenciones previas:</span> {{ $histo->interve_prev }}</p></div>
      </div>
      <div class="row">
        <div class="col-12"><p><span class="label">Nota:</span> {{ $histo->nota }}</p></div>
      </div>
    </div>
  </body>  --}}
  
  
</html>