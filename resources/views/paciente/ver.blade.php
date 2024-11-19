<!-- Modal-->
<div class="modal fade" id="modalVer{{$pac->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h1 class="modal-title fs-5 text-primary py-2 px-4" id="exampleModalLabel" > Consultorio Odontologico Moident</h1>
              <button type=" button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="mx-5">

          <div class="modal-body text-start">

            <h2>Detalles del Paciente</h2><br>
            
            <p> <strong>Nombre: </strong>{{ $pac->nombre }} {{ $pac->paterno }} {{ $pac->materno }}</p>
            <p><strong>Carnet: </strong>{{ $pac->ci }} {{ $pac->expe}}</p>
            <p><strong>F. Nacimiento: </strong>{{ $pac->fecha_nac }}</p>
            <p><strong>Genero: </strong>{{ $pac->genero }}</p>
            <p><strong>Edad: </strong>{{ $pac->edad }}</p>
            <p><strong>Direccion: </strong>{{ $pac->direccion }}</p>
            <p><strong>Celular: </strong>{{ $pac->celular }}</p>
          </div>
        </div>

          <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
          </div>

      </div>
  </div>
</div>