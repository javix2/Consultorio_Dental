<!-- Modal Editar-->
<div class="modal fade" id="modalEditar{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header d-flex justify-content-center my-2">
        {{--  <h1 class="modal-title fs-5 text-primary py-2 px-4" id="exampleModalLabel"><i class="fa-solid fa-user-doctor"></i> NUEVO MEDICO</h1>
        <button type=" button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>  --}}
        <h3 class="modal-title fs-4 text-primary">Editar Usuario</h3>
      </div>
      
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
                      <form action="{{ route('usuario.update',$user->id) }}" method="POST">
                          @csrf
                          {{ method_field('PATCH') }}
                        
                          <label for="name" class="col-md-4 col-form-label text-md font-weight-bold ">Nombre</label>
                          {{--  <div class="row mb-3">  --}}
                            <div class="input-group mt-1">
                              <div class="input-group-text containerr">
                                {{--  <i class="fa-solid fa-envelope text-lightblue"></i>  --}}
                                <i class="fa-solid fa-user  colors"></i>
                              </div>
                                  <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus placeholder="usuario">
  
                                  {{--  @error('name')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror  --}}
                              </div>
                          
                              <label for="email" class="col-md-8 col-form-label text-md font-weight-bold ">email</label>
  
                              <div class="input-group mt-1">
                                <div class="input-group-text containerr">
                                  <i class="fa-solid fa-envelope colors"></i>
                                </div>
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required autocomplete="email" placeholder="email">

                                  {{--  @error('email')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror  --}}
                              </div>
                          {{--  </div>  --}}

                          <label for="password" class="col-md-4 col-form-label text-md font-weight-bolder ">Contraseña</label>
                          {{--  <div class="row mb-3">  --}}
  
                              <div class="input-group mt-1">
                                <div class="input-group-text containerr">
                                  {{--  <i class="fa-solid fa-envelope text-lightblue"></i>  --}}
                                  <i class="fa-solid fa-lock colors"></i>

                                </div>
                                  <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password" placeholder="contraseña" value="">
  
                                  {{--  @error('password')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror  --}}
                              </div>
                          {{--  </div>  --}}
  
                          {{--  <div class="row mb-3">
                              <label for="password-confirm" class="col-md-8 col-form-label text-md font-weight-bold">confirmar</label>
  
                              <div class="input-group mt-1">
                                <div class="input-group-text containerr">
                                  <i class="fa-solid fa-lock colors"></i>
                                </div>
                                <input id="password-confirm" type="password" class="form-control" name="password" required autocomplete="new-password" placeholder="Confirmar contraseña">
                              </div>
                          </div>  --}}
  
                              {{--  <div class="row mb-10">  --}}
                              <div class="input-group mt-3">

                                  <div class="col-lg offset-lg my-3">
                                      <button type="submit" class="btn btn-primary">
                                          Editar
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
