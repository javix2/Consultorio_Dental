<!-- Modal-->
<div class="modal fade" id="modalVer{{$histo->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h1 class="modal-title fs-5 text-primary py-2 px-4" id="exampleModalLabel" > Consultorio Odontologico Moident</h1>
              <button type=" button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="mx-5">

          <div class="modal-body text-start">
            
              <h4 class="text-center">Detalle Tratamiento Realizado</h4><br>
              {{--  <p><strong>ID:</strong> {{ $histo->id }}</p>  --}}
              {{--  <p>{{ $historials->firstItem() + $loop->index }}</p>  --}}

              <p><strong>Nombre:</strong> {{ $histo->paciente->nombre }} {{ $histo->paciente->paterno }} {{ $histo->paciente->materno }}</p>
              <p><strong>Tratamiento:</strong> {{ $histo->tratamiento->nombre }}</p>
              <p><strong>Fecha de sesion:</strong> {{ $histo->fecha }}</p>
              <p><strong>Numero de sesion:</strong> {{ $histo->numero_sesion }}</p>
              <p><strong>Descripcion:</strong> {{ $histo->descripcion }}</p>
              <p><strong>Estado:</strong> {{ $histo->estado }}</p>

              <p><strong>Estado:</strong> 
                @if($histo->estado == "terminado")
                            <span class="badge badge-success">terminado</span>
                        @else
                            <span class="badge badge-warning">en curso</span>
                        @endif
              
              </p>
              {{--  <p><strong>Ultima fecha de pago:</strong> {{ $pago->fecha_pago }}</p>  --}}
              
              <!-- Otros detalles del usuario -->
            

              
          </div>
        </div>

          <div class="modal-footer" py2>
            {{--  <a href="{{ route('pago.reporteboleta',$pago->id) }}" class="btn btn-primary" target="_blank"><i class="fa-solid fa-print"></i>
              Imprimir</a>  --}}
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
          </div>
      </div>
  </div>
</div>