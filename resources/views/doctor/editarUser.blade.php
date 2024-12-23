<!-- Modal Registrar Usuario -->
<div class="modal fade" id="modalEditarUser{{$doc->id}}" tabindex="-1" aria-labelledby="modalRegistrar" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-primary py-2 px-4" id="exampleModalLabel"><i class="fa-solid fa-user"></i> EDITAR USUARIO</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="{{ route("users.update", $doc->user->id) }}" method="POST">
                    @csrf
                    <div class="container py-3 px-7">
                        <div class="form-group row">
                            <label for="username" class="col-sm-3 col-form-label text-right">Usuario</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="username" name="username" value=@if($doc->user)
              {{$doc->user->email}}
          @else
              N/A
          @endif>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label text-right">Correo Electrónico</label>
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
                            <label for="password_confirmation" class="col-sm-3 col-form-label text-right">Confirmar Contraseña</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer py-2">
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-save"></i> Editar</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>