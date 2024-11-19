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
  <div class="modal-dialog modal-lg">
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
            <hr class="my-4">
            <div class="form-group row mt-2">
              <h3 class="fs-5 text-primary text-center">Anamnesis</h3>
            </div>
            {{--  <p> <strong>Nombre: </strong>{{ $histo->paciente->nombre }} {{ $histo->paciente->paterno }} {{ $histo->paciente->materno }}</p>
            <p><strong>Carnet: </strong>{{ $pac->ci }} {{ $pac->expe}}</p>
            <p><strong>F. Nacimiento: </strong>{{ $pac->fecha_nac }}</p>
            <p><strong>Genero: </strong>{{ $pac->genero }}</p>
            <p><strong>Edad: </strong>{{ $pac->edad }}</p>
            <p><strong>Direccion: </strong>{{ $pac->direccion }}</p>
            <p><strong>Celular: </strong>{{ $pac->celular }}</p>  --}}



          </div>
        </div>

          {{--  <div class="modal-footer" py2>
            <a href="{{ route('pago.reporteboleta',$pago->id) }}" class="btn btn-primary" target="_blank"><i class="fa-solid fa-print"></i>
              Imprimir</a>

          </div>  --}}
      </div>
  </div>
</div>