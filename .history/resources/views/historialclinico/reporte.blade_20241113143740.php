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
      body {
        font-family: Arial, sans-serif;
        color: #333;
        line-height: 1.6;
      }
    
      .container {
        padding: 20px;
        margin: auto;
        width: 90%;
        max-width: 800px;
      }
    
      /* Estilos para la imagen */
      .img-thumbnail {
        display: block;
        margin: 0 auto 15px;
        border-radius: 8px;
      }
    
      /* Título principal */
      h5 {
        font-size: 18px;
        color: #0056b3;
        text-align: center;
        margin-bottom: 15px;
      }
    
      /* Estilo de los títulos de sección */
      h5.fs-5 {
        font-size: 16px;
        color: #0056b3;
        border-bottom: 1px solid #ddd;
        padding-bottom: 5px;
        margin-top: 20px;
        margin-bottom: 15px;
      }
    
      /* Cuerpo del texto */
      p {
        margin: 5px 0;
        font-size: 14px;
      }
    
      /* Contenido dentro de cada sección */
      .row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
      }
    
      .col-md-10,
      .col-md-2,
      .col-md-4,
      .col-md-6 {
        flex-basis: 48%;
        padding: 5px;
      }
    
      /* Alineación y espaciado */
      .text-start {
        text-align: left;
      }
    
      /* Línea divisoria */
      hr {
        border: 0;
        height: 1px;
        background: #ddd;
        margin: 15px 0;
      }
    
      /* Ajustes para impresión */
      @media print {
        .container {
          width: 100%;
        }
        img {
          max-width: 250px;
          height: auto;
        }
        h5 {
          font-size: 16px;
          color: #333;
        }
        p {
          font-size: 12px;
        }
      }
    </style>
    
  </head>
  
  <body>
    <div> 
      <img src="{{URL::asset('/img/const.jpg')}}" class="img-thumbnail" alt="..." width="250px">
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
</html>