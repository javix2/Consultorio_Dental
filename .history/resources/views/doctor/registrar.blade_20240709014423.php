<!-- Modal Registrar-->
<div class="modal fade" id="modalRegistrar" tabindex="-1" aria-labelledby="modalRegistrar" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-primary py-2 px-4" id="exampleModalLabel"><i class="fa-solid fa-user-doctor"></i> NUEVO MEDICO</h1>
        <button type=" button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form action="" method="post">
          @csrf
          <div class="container py-3 px-7">
            
            <div class="form-group row">
              <label for="inputPassword" class="col-sm-3 col-form-label  text-right">Correo Electronico</label>
              <div class=" col-sm-8">
                <input class="form-control" type="email" id="" name="txtdireccion"></input>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword" class="col-sm-3 col-form-label  text-right">Usuario</label>
              <div class=" col-sm-8">
                <input class="form-control" type="text" id="" name="txtdireccion"></input>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword" class="col-sm-3 col-form-label  text-right">Contraseña</label>
              <div class=" col-sm-8">
                <input class="form-control" type="password" id="" name="txtdireccion"></input>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword" class="col-sm-3 col-form-label  text-right">Confirmar Contraseña</label>
              <div class=" col-sm-8">
                <input class="form-control" type="password" id="" name="txtdireccion"></input>
              </div>
            </div>

          </div>
      
      <div class="modal-footer" py2>
        <button type="button" class="btn btn-secondary" id="backToDoctor">Atrás</button>
        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-regular fa-circle-xmark"></i>
          Cancelar</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>