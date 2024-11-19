<!-- Modal Editar-->
<div class="modal fade" id="modalEditar{{$doc->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-primary py-2 px-4" id="exampleModalLabel"><i class="fa-solid fa-user-doctor"></i> EDITAR MEDICO</h1>
        <button type=" button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form action="{{ route("doctor.update", $doc->id) }}" method="post">
          @csrf
          {{--  @method('put')  --}}
          {{ method_field('PATCH') }}

          <div class="container py-3 px-7">
            {{--  <div class="form-group row">
              <label for="inputPassword" class="col-sm-3 col-form-label  text-right">Cedula de
                Identidad</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="inputAddress" name="ci" value="{{$doc->ci}}" >
              </div>

              <label for="inputPassword" class="col-sm-2 col-form-label  text-right">Expedicion</label>
              <div class="col-sm-2">
                <select id="inputState" class="form-select fst-italic" name="expe" value="{{$doc->expe}}">
                  <option selected>seleccione</option>
                  <option value="LP" @selected("LP"==$doc->expe)>LP</option>
                  <option value="OR" @selected("OR"==$doc->expe)>OR</option>
                  <option value="CH" @selected("CH"==$doc->expe)>CH</option>
                  <option value="SC" @selected("SC"==$doc->expe)>SC</option>
                  <option value="SCR" @selected("SCR"==$doc->expe)>SCR</option>
                  <option value="PA" @selected("PA"==$doc->expe)>PA</option>
                  <option value="BE" @selected("BE"==$doc->expe)>BE</option>
                  <option value="TA" @selected("TA"==$doc->expe)>TA</option>
                  <option value="PO" @selected("PO"==$doc->expe)>PO</option>
                </select>
              </div>
            </div>  --}}
            <div class="form-group row">
              <label for="inputPassword" class="col-sm-3 col-form-label  text-right">Nombre Completo</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="inputAddress" name="nombre" value="{{$doc->nombre}}">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label text-right">Apellido Paterno</label>
              <div class="col-sm-3">
                <input type="text " class="form-control" id="inputAddress" name="paterno" value="{{$doc->paterno}}">
              </div>
              <label class="col-sm-2 col-form-label text-right">Apellido Materno</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" id="inputAddress" name="materno" value="{{$doc->materno}}">
              </div>
            </div>
            {{--  <div class="form-group row">
              <label for="inputPassword" class="col-sm-3 col-form-label  text-right">Apellido Materno</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="inputAddress" name="materno" value="{{$doc->materno}}">
              </div>
            </div>  --}}
            <div class="form-group row">
              <label for="inputPassword" class="col-sm-3 col-form-label  text-right">Especialidad</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="inputAddress" name="espe" value="{{$doc->especialidad}}">
              </div>
            </div>
            
           
            <div class="form-group row">
              
                <label for="inputPassword" class="col-sm-3 col-form-label  text-right">Cedula de
                  Identidad</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" id="inputAddress" name="ci" value="{{$doc->ci}}" >
                </div>
              
              <label for="inputPassword" class="col-sm-2 col-form-label text-right">Tel/Cel</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" id="inputAddress" name="celular" value="{{$doc->celular}}">
              </div>


            </div>
            <div class="form-group row">
              <label for="inputPassword" class="col-sm-3 col-form-label  text-right">Direccion</label>
              <div class="form-floating col-sm-8">
                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="direccion" value="">{{$doc->direccion}}</textarea>
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary"> Guardar Cambios</button>
          </div>
        </form>
        
        <form action="" method="POST">
          <div class="row">
          <div class="card text-bg-light">
            <div class="form-group row">  
              <label for="inputPassword" class="col-sm-3 col-form-label  text-right">Correo electronico</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" id="inputAddress" name="ci" value="{{$doc->ci}}" >
              </div>
              <label for="inputPassword" class="col-sm-2 col-form-label text-right">contraseña actual</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" id="inputAddress" name="celular" value="{{$doc->celular}}">
              </div>
            </div>
            <div class="form-group row">  
              <label for="inputPassword" class="col-sm-3 col-form-label  text-right">nueva contraseña</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" id="inputAddress" name="ci" value="{{$doc->ci}}" >
              </div>
              <label for="inputPassword" class="col-sm-2 col-form-label text-right">Conf. contraseña</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" id="inputAddress" name="celular" value="{{$doc->celular}}">
              </div>
            </div>
            <div class="form-group row col-sm-3 ">
              <button type="button" class="btn btn-primary"> Actualizar Contraseña</button>
            </div>

          </div>

          <div class="card-footer text-light">
            <button type="button" class="btn btn-primary"> Actualizar Contraseña</button>
          </div>
        </div>

      </form>

        

      </div>
    </div>
  </div>
</div>
