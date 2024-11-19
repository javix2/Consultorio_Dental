<!-- Modal-->
{{--  <div class="modal fade" id="modalVer{{$pago->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div>
            <h1>Detalles de Pago</h1>
            <p><strong>ID:</strong> {{ $pago->id }}</p>
            <p><strong>Nombre:</strong> {{ $pago->paciente->nombre }} {{ $pago->paciente->paterno }} {{ $pago->paciente->materno }}</p>
            <p><strong>Tratamiento:</strong> {{ $pago->tratamiento->nombre }}</p>
            <p><strong>Costo Tratamiento:</strong> {{ $pago->tratamiento->costo }}</p>
            <p><strong>Total Pagado:</strong> {{ $pago->monto_total }}</p>
            <p><strong>Ultima fecha de pago:</strong> {{ $pago->fecha_pago }}</p>

            <!-- Otros detalles del usuario -->
        </div>
    </div>
  </div>
</div>  --}}
<div class="modal fade" id="modalVer{{$histo->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
      <div class="modal-content">
          <div class="modal-header">
              <h1 class="modal-title fs-5 text-primary py-2 px-4" id="exampleModalLabel" > Consultorio Odontologico Moident</h1>
              <button type=" button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="mx-5 mb-5">

          <div class="modal-body text-start">

            <h3>Historia Clínica del Paciente</h3><br>
            {{--  <p><strong>No: </strong>{{ $histo->no_hc }} <strong>Fecha apertura: </strong>{{ $histo->fecha_aper}}</p>  --}}
            <div class="row">
              <div class="col-md-6">
                  <p><strong>No: </strong>{{ $histo->no_hc }}</p>
              </div>
              <div class="col-md-6">
                  <p><strong>Fecha apertura: </strong>{{ $histo->fecha_aper }}</p>
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
              <div class="col-md-8">
                  <p><strong>Direccion: </strong>{{ $histo->direccion }}</p>
              </div>
              <div class="col-md-4">
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
                  <p><strong>Cardiovasculares: </strong>{{ $histo->hab_alimen }}</p>
              </div>
              <div class="col-md-4">
                  <p><strong>Pulmonares: </strong>{{ $histo->hab_higiene }}</p>
              </div>
              <div class="col-md-4">
                <p><strong>Renales: </strong>{{ $histo->tabaco }}</p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                  <p><strong>Gastrointestinales: </strong>{{ $histo->hab_alimen }}</p>
              </div>
              <div class="col-md-4">
                  <p><strong>Endocrinas: </strong>{{ $histo->hab_higiene }}</p>
              </div>
              <div class="col-md-4">
                <p><strong>Osteoarticulares: </strong>{{ $histo->tabaco }}</p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                  <p><strong>Metabolicas: </strong>{{ $histo->hab_alimen }}</p>
              </div>
              <div class="col-md-6">
                  <p><strong>Infecciosas: </strong>{{ $histo->hab_higiene }}</p>
              </div>
    
            </div>
            <p><strong>Antecedentes intervenciones previas: </strong>{{ $histo->otro }} </p>


          


          </div>
        </div>

          {{--  <div class="modal-footer" py2>
            <a href="{{ route('pago.reporteboleta',$pago->id) }}" class="btn btn-primary" target="_blank"><i class="fa-solid fa-print"></i>
              Imprimir</a>

          </div>  --}}
      </div>
  </div>
</div>