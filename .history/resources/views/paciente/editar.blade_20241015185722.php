<!-- Modal Editar-->
<div class="modal fade" id="modalEditar{{$pac->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-primary py-2 px-4" id="exampleModalLabel"><i class="fa-solid fa-user-pen"></i>
          EDITAR PACIENTE</h1>
        <button type=" button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form action="{{route("paciente.update", $pac->id)}}" method="POST">
          @csrf
          {{--  @method('PUT')  --}}
          {{ method_field('PATCH') }}

          <div class="container py-3 px-7">
            <div class="form-group row">

              <label for="" class="col-sm-3 col-form-label  text-right">Cedula de Identidad</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="inputAddress" name="ci" value="{{$pac->ci}}">
              </div>
              <label for="" class="col-sm-2 col-form-label  text-right">Expedicion</label>
              <div class="col-sm-2">
                <select id="inputState" class="form-select fst-italic" name="expe" value="{{$pac->expe}}">
                  <option selected>seleccione...</option>
                  <option value="LP" @selected("LP"==$pac->expe)>LP</option>
                  <option value="OR" @selected("OR"==$pac->expe)>OR</option>
                  <option value="CH" @selected("CH"==$pac->expe)>CH</option>
                  <option value="SC" @selected("SC"==$pac->expe)>SC</option>
                  <option value="SCR" @selected("SCR"==$pac->expe)>SCR</option>
                  <option value="PA" @selected("PA"==$pac->expe)>PA</option>
                  <option value="BE" @selected("BE"==$pac->expe)>BE</option>
                  <option value="TA" @selected("TA"==$pac->expe)>TA</option>
                  <option value="PO" @selected("PO"==$pac->expe)>PO</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-3 col-form-label  text-right">Nombre Completo</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="inputAddress" name="nombre" value="{{$pac->nombre}}">
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-3 col-form-label  text-right">Apellido Paterno</label>
              <div class="col-sm-8">
                <input type="text " class="form-control" id="inputAddress" name="paterno" value="{{$pac->paterno}}">
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-3 col-form-label  text-right">Apellido Materno</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="inputAddress" name="materno" value="{{$pac->materno}}">
              </div>
            </div>

            <div class="form-group row">
              <label for="" class="col-sm-3 col-form-label  text-right">Fecha de Nacimiento</label>
              <div class="col-sm-4">
                <input id="" type="date" width="300" name="fecha_nac" value="{{$pac->fecha_nac}}">
              </div>

              <label for="inputPassword" class="col-sm-2 col-form-label text-right">Edad</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="inputCity" name="edad" value="{{$pac->edad}}">
              </div>

            </div>
            <div class="form-group row">
              <label for="inputPassword" class="col-sm-3 col-form-label text-right">Telefono Celular</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="inputAddress" name="celular" value="{{$pac->celular}}">
              </div>

              <label for="inputPassword" class="col-sm-2 col-form-label text-right">Genero</label>
              <div class="col-sm-2">
                <select id="inputState" class="form-select fst-italic" name="genero" value="{{$pac->genero}}">
                  <option selected>seleccione...</option>
                  <option value="Masculino" @selected("Masculino"==$pac->genero)>Masculino</option>
                  <option value="Femenino" @selected("Femenino"==$pac->genero)>Femenino</option>
                  
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword" class="col-sm-3 col-form-label  text-right">Direccion</label>
              <div class="form-floating col-sm-8">
                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="direccion" value="">{{$pac->direccion}}</textarea>
              </div>
            </div>
          </div>
          <div class="modal-footer" py2>
            <button type="submit" class="btn btn-primary"><i class="fa-regular fa-circle-check"></i> Editar</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-regular fa-circle-xmark"></i>
              Cancelar</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
