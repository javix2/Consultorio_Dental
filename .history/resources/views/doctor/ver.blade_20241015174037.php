<!-- Modal Ver-->
<div class="modal fade" id="modalVer{{$doc->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5 text-primary py-2 px-4" id="exampleModalLabel" > Consultorio Odontologico Moident</h1>
            <button type=" button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="mx-5 mb-5">
        <div class="modal-body text-start">
        <h2>Detalles del Doctor</h2><br>
        <p> <strong>Nombre: </strong>{{ $doc->nombre }} {{ $doc->paterno }} {{ $doc->materno }}</p>
        <p><strong>Carnet: </strong>{{ $doc->ci }} {{ $doc->expe}}</p>
        <p><strong>Especialidad: </strong>{{ $doc->especialidad }}</p>
        <p><strong>Direccion: </strong>{{ $doc->direccion }}</p>
        <p><strong>Celular: </strong>{{ $doc->celular }}</p>
      </div>

        


      
    </div>
    <div class="modal-footer">
          
      <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>

  </div>
  </div>
</div>
