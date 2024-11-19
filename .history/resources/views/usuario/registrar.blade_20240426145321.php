<!-- Modal Crear-->
<div class="modal fade" id="modalCrear" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header d-flex justify-content-center my-2">
        {{--  <h1 class="modal-title fs-5 text-primary py-2 px-4" id="exampleModalLabel"><i class="fa-solid fa-user-doctor"></i> NUEVO MEDICO</h1>
        <button type=" button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>  --}}
        <h3 class="modal-title fs-4 text-primary">Registrar Usuario</h3>
      </div>

      {{--  <div class="modal-body">
        <form action="{{route("doctor.store")}}" method="post">
          @csrf
          <div class="container py-3 px-7">
            <div class="form-group row">
              <label for="" class="col-sm-3 col-form-label  text-right">Nombre Completo</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="inputAddress" name="txtnombre">
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-3 col-form-label  text-right">Apellido Paterno</label>
              <div class="col-sm-8">
                <input type="text " class="form-control" id="inputAddress" name="txtpaterno">
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-3 col-form-label  text-right">Apellido Materno</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="inputAddress" name="txtmaterno">
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-3 col-form-label  text-right">Cedula de
                Identidad</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="inputAddress" name="txtci">
              </div>

              <label for="" class="col-sm-2 col-form-label  text-right">Expedicion</label>
              <div class="col-sm-2">
                <select id="inputState" class="form-select fst-italic" name="txtexpe">
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
              <label for="inputPassword" class="col-sm-3 col-form-label text-right">Telefono Celular</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="inputAddress" name="txtcelular">
              </div>
              
              {{--  <label for="inputPassword" class="col-sm-2 col-form-label text-right">Turno</label>
              <div class="col-sm-2">
                <select id="inputState" class="form-select fst-italic" name="txtturno">
                  <option selected>seleccione</option>
                  <option value="Mañana">Mañana</option>
                  <option value="Tarde">Tarde</option>
                </select>
              </div>  --}}
            {{--  </div>
            <div class="form-group row">
              <label for="inputPassword" class="col-sm-3 col-form-label  text-right">Direccion</label>
              <div class="form-floating col-sm-8">
                <textarea class="form-control" placeholder="" id="floatingTextarea" name="txtdireccion"></textarea>
              </div>
            </div>
          </div>  --}}
      
      {{--  <div class="modal-footer" py2>
        
        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-regular fa-circle-xmark"></i>
          Cancelar</button>
      </div>
      </form>  --}}  
      {{--  <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <deiv class="card-header">{{ __('Register') }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
    
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
    
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>  --}}
    <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-10">
              <div class="">
                  {{--  <div class="card-header">{{ __('Register') }}</div>  --}}
  
                  <div class="card-body">
                      <form action="{{ route('usuario.store') }}" method="POST">
                          @csrf
                        
                          <label for="name" class="col-md-4 col-form-label text-md font-weight-bold ">{{ __('Nombre') }}</label>
                          {{--  <div class="row mb-3">  --}}
                            <div class="input-group mt-1">
                              <div class="input-group-text containerr">
                                {{--  <i class="fa-solid fa-envelope text-lightblue"></i>  --}}
                                <i class="fa-solid fa-user  colors"></i>
                              </div>
                                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="usuario">
  
                                  @error('name')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          {{--  </div>  --}}
                          {{--  <x-adminlte-input name="iUser" label="User" placeholder="username" label-class="text-lightblue form-control @error('name') is-invalid @enderror">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-user text-lightblue"></i>
                                </div>
                            </x-slot>
                          </x-adminlte-input>  --}}
                          {{--  <x-adminlte-input name="iUser" label="User" placeholder="mail" label-class="text-lightblue form-control @error('name') is-invalid @enderror">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                  <i class="fa-solid fa-envelope text-lightblue"></i>
                                </div>
                            </x-slot>
                          </x-adminlte-input>  --}}
                          {{--  <label for="">nombre de usuario</label>  --}}
                          {{--  <label for="password" class="col-md-4 col-form-label text-md text-lightblue">{{ __('Contraseña') }}</label>
                          <div class="input-group mt-1">
                            <div class="input-group-text containerr">
                              <i class="fa-solid fa-envelope text-lightblue"></i>
                            </div>
                            <input id="password" type="password"
                              class="form-control   @error('password') is-invalid @enderror" name="password" required
                              autocomplete="current-password" placeholder="Contraseña" />
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>  --}}
  
                          {{--  <div class="row mb-3">  --}}
                              <label for="email" class="col-md-8 col-form-label text-md font-weight-bold ">{{ __('Correo electronico') }}</label>
  
                              <div class="input-group mt-1">
                                <div class="input-group-text containerr">
                                  <i class="fa-solid fa-envelope colors"></i>
                                </div>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="email">

                                  @error('email')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          {{--  </div>  --}}

                          <label for="password" class="col-md-4 col-form-label text-md font-weight-bolder ">{{ __('Contraseña') }}</label>
                          {{--  <div class="row mb-3">  --}}
  
                              <div class="input-group mt-1">
                                <div class="input-group-text containerr">
                                  {{--  <i class="fa-solid fa-envelope text-lightblue"></i>  --}}
                                  <i class="fa-solid fa-lock colors"></i>

                                </div>
                                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="contraseña">
  
                                  @error('password')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          {{--  </div>  --}}
  
                          {{--  <div class="row mb-3">  --}}
                              <label for="password-confirm" class="col-md-8 col-form-label text-md font-weight-bold">{{ __('Confirmar Contraseña') }}</label>
  
                              <div class="input-group mt-1">
                                <div class="input-group-text containerr">
                                  <i class="fa-solid fa-lock colors"></i>
                                </div>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmar contraseña">
                              </div>
                          {{--  </div>  --}}
  
                              {{--  <div class="row mb-10">  --}}
                              <div class="input-group mt-3">

                                  <div class="col-lg offset-lg my-3">
                                      <button type="submit" class="btn btn-primary">
                                          {{ __('Register') }}
                                      </button>
                                  </div>
                              </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
    </div>
  </div>
</div>
</div>
