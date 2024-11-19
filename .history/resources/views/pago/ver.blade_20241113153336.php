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
            
              <h3>Detalles de Pago</h3><br>
              <p><strong>ID:</strong> {{ $histo->id }}</p>
              <p><strong>Nombre:</strong> {{ $histo->paciente->nombre }} {{ $histo->paciente->paterno }} {{ $histo->paciente->materno }}</p>
              <p><strong>Tratamiento:</strong> {{ $histo->tratamiento->nombre }}</p>
              <p><strong>Costo Tratamiento:</strong> {{ $histo->tratamiento->costo }}</p>
              <p><strong>Total Pagado:</strong> {{ $histo->monto_total }}</p>
              <p><strong>Estado:</strong> 
                @if($histo->tratamiento->costo<=$histo->monto_total)
                            <span class="badge badge-success">Completado</span>
                        @else
                            <span class="badge badge-warning">Pendiente</span>
                        @endif
              
              </p>
              <p><strong>Ultima fecha de pago:</strong> {{ $histo->fecha_pago }}</p>
              
              <!-- Otros detalles del usuario -->
            

              
          </div>
        </div>

          <div class="modal-footer" py2>
            <a href="{{ route('pago.reporteboleta',$histo->id) }}" class="btn btn-primary" target="_blank"><i class="fa-solid fa-print"></i>
              Imprimir</a>
            
          </div>
      </div>
  </div>
</div>