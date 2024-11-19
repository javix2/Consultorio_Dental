<!-- Modal Crear-->
<div class="modal fade" id="modalCrear" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-primary py-2 px-4" id="exampleModalLabel"><i class="fa-solid fa-user-plus"></i>
          NUEVO PACIENTE</h1>
        <button type=" button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form action="{{route("paciente.store")}}" method="POST">
          @csrf
          <div class="container py-3 px-7">
            <div class="form-group row">
              <label for="inputPassword" class="col-sm-3 col-form-label  text-right">Nombre Completo</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="inputAddress" name="nombre"   required>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword" class="col-sm-3 col-form-label  text-right">Apellido Paterno</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="inputAddress" name="paterno" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword" class="col-sm-3 col-form-label  text-right">Apellido Materno</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="inputAddress" name="materno">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword" class="col-sm-3 col-form-label  text-right">Cedula de
                Identidad</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="inputAddress" name="ci" required>
              </div>

              <label for="inputPassword" class="col-sm-2 col-form-label  text-right">Expedicion</label>
              <div class="col-sm-2">
                <select id="inputState" class="form-select fst-italic" name="expe" required>
                  <option selected>seleccione</option>
                  <option value="LP">LP</option>
                  <option value="OR">OR</option>
                  <option value="CH">CH</option>
                  <option value="SC">SC</option>
                  <option value="SCR">SCR</option>
                  <option value="PA">PA</option>
                  <option value="BE">BE</option>
                  <option value="TA">TA</option>
                  <option value="PO">PO</option>
                </select>
              </div>
            </div>
            <div class="form-group row">

              <label for="inputPassword" class="col-sm-3 col-form-label  text-right">Fecha de
                Nacimiento</label>
              <div class="col-sm-4">
                <input id="" type="date" width="300" name="fecha_nac" required>
              </div>

              <label for="inputPassword" class="col-sm-2 col-form-label text-right">Edad</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="inputCity" name="edad" required>
              </div>

            </div>
            <div class="form-group row">
              <label for="inputPassword" class="col-sm-3 col-form-label text-right">Telefono Celular</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="inputAddress" name="celular" required>
              </div>

              <label for="inputPassword" class="col-sm-2 col-form-label text-right">Genero</label>
              <div class="col-sm-2">
                <select id="inputState" class="form-select fst-italic" name="genero" required>
                  <option selected>seleccione</option>
                  <option value="Masculino">Masculino</option>
                  <option value="Femenino">Femenino</option>
                </select>
              </div>
            </div>

            
            <div class="form-group row">
              <label for="inputPassword" class="col-sm-3 col-form-label  text-right">Direccion</label>
              <div class="form-floating col-sm-8">
                <textarea class="form-control" placeholder="" id="floatingTextarea"
                  name="direccion"></textarea>
              </div>
            </div>

          </div>
          <div class="modal-footer" py2>
            <button type="submit" class="btn btn-primary"><i class="fa-regular fa-circle-check"></i> Guardar</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i
                class="fa-regular fa-circle-xmark"></i>
              Cancelar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>