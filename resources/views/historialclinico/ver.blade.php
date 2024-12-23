<!-- Modal-->

<div class="modal fade" id="modalVer{{$histo->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
      <div class="modal-content">
          <div class="modal-header"> 
            <img src="{{URL::asset('/img/const.jpg')}}" class="img-thumbnail" alt="..." width="350px">
            <button type=" button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>  
          </div>

          <div class="mx-5 mb-5">

          <div class="modal-body text-start">

            <div class="d-flex justify-content-center mb-4"><h3>Historia Clínica del Paciente</h3></div>
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
        </div>

          <div class="modal-footer" py2>
            <a href="{{ route('historialclinico.reporte',$histo->id) }}" class="btn btn-primary" target="_blank"><i class="fa-solid fa-print"></i>Imprimir</a>

          </div>
      </div>
  </div>
</div>