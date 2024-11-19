<!-- Modal Crear-->
<div class="modal fade" id="modalCrear" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-primary py-0 px-4" id="exampleModalLabel"><i class="fa-solid fa-user-doctor"></i> NUEVO MEDICO</h1>
        <button type=" button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form action="{{ route('doctors.store') }}" method="POST">
          @csrf
          <div class="container py-1 px-7">
              <div class="form-group row">
                  <label for="txtnombre" class="col-sm-3 col-form-label text-right">Nombre Completo</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" id="txtnombre" name="txtnombre" required>
                  </div>
              </div>
              <div class="form-group row">
                  <label for="txtpaterno" class="col-sm-3 col-form-label text-right">Apellido Paterno</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" id="txtpaterno" name="txtpaterno" required>
                  </div>
              </div>
              <div class="form-group row">
                  <label for="txtmaterno" class="col-sm-3 col-form-label text-right">Apellido Materno</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" id="txtmaterno" name="txtmaterno" required>
                  </div>
              </div>
              <div class="form-group row">
                  <label for="txtci" class="col-sm-3 col-form-label text-right">Cédula de Identidad</label>
                  <div class="col-sm-3">
                      <input type="text" class="form-control" id="txtci" name="txtci" required>
                  </div>

                  <label for="txtcelular" class="col-sm-2 col-form-label text-right">Tel/Cel</label>
                  <div class="col-sm-3">
                      <input type="text" class="form-control" id="txtcelular" name="txtcelular" required>
                  </div>
              </div>
              <div class="form-group row">
                  <label for="txtespe" class="col-sm-3 col-form-label text-right">Especialidad</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" id="txtespe" name="txtespe" required>
                  </div>
              </div>
              <div class="form-group row">
                  <label for="txtdireccion" class="col-sm-3 col-form-label text-right">Dirección</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" id="txtdireccion" name="txtdireccion" required></input>
                  </div>
              </div>
              <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label text-right">Usuario</label>
                <div class="col-sm-8">
                    {{--  <input type="text" class="form-control" id="username" name="username" required>  --}}
                </div>
            </div>
            <div class="form-group row">
                <label for="username" class="col-sm-3 col-form-label text-right">Correo Electrónico</label>
                <div class="col-sm-8">
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-3 col-form-label text-right">Contraseña</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="password_confirmation" class="col-sm-3 col-form-label text-right">Conf. Contraseña</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                </div>
            </div>

            <div class="container card text-bg-light py-3 px-7">
                <div class="form-group row">
                  <label for="inputPassword" class="col-sm-3 col-form-label  text-right">Nombre Completo</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control"  id="txtnombre" name="txtnombre">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label text-right">Apellido Paterno</label>
                  <div class="col-sm-3">
                    <input type="text " class="form-control" id="txtpaterno" name="txtpaterno">
                  </div>
                  <label class="col-sm-2 col-form-label text-right">Apellido Materno</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" id="txtmaterno" name="txtmaterno">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword" class="col-sm-3 col-form-label  text-right">Especialidad</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="txtespe" name="txtespe">
                  </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label  text-right">Cedula de
                      Identidad</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" id="txtci" name="txtci">
                    </div>
                  <label for="inputPassword" class="col-sm-2 col-form-label text-right">Tel/Cel</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" id="txtcelular" name="txtcelular">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword" class="col-sm-3 col-form-label  text-right">Direccion</label>
                  <div class="form-floating col-sm-8">
                    <textarea class="form-control" placeholder="Leave a comment here" id="txtdireccion" name="txtdireccion"></textarea>
                  </div>
                </div>
                <div class="card text-bg-light">
                    <div class="row my-4">
                      <div class="form-group row">  
        
                          <label for="inputPassword" class="col-sm-3 col-form-label text-right">contraseña actual</label>
                          <div class="col-sm-5">
                          <input type="text" class="form-control"  name="" required>
                          </div>
                      </div>
                      <div class="form-group row">  
                          <label for="inputPassword" class="col-sm-3 col-form-label  text-right">nueva contraseña</label>
                          <div class="col-sm-3">
                          <input type="password" class="form-control"  name="" required>
                          </div>
                          <label for="inputPassword" class="col-sm-2 col-form-label text-right">Conf. contraseña</label>
                          <div class="col-sm-3">
                          <input type="password" class="form-control"  name="" required>
                          </div>
                      </div>
                      
                    </div>  
                </div>
                <div class="col-sm-11 text-end my-3">
                  <button type="submit" class="btn btn-primary"> Guardar Cambios</button>
                </div>
    
              </div>

          </div>
          <div class="modal-footer py-0">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary"><i class="fa-solid fa-save"></i> Guardar</button>
                    
          </div>


      </form>
    </div>
  </div>
</div>
</div>

<!-- Modal Editar-->
<div class="modal fade" id="" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-primary" id="exampleModalLabel"><i class="fa-solid fa-user-doctor"></i> EDITAR MEDICO</h1>
        <button type=" button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">      
        <form action="" method="post">
          

          
          
        </form>

        
      </div>
    </div>
  </div>
</div>
