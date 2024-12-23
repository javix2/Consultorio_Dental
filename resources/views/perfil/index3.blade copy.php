@extends('adminlte::page')

@section('title', 'Moident')

@section('content_header')

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
<script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/12da147e45.js" crossorigin="anonymous"></script>

@stop

@section('content')

<h2>Editar Perfil22</h2>
<!-- Mostrar errores de validación -->
@if($errors->any())
            @foreach ($errors->all() as $error)
            <div>
                <span class="alert alert-danger">{{$error}}</span>
            </div>
            @endforeach
    @endif
<div class="container d-flex justify-content-center my-4">
    <!-- Mensaje de éxito -->
    {{--  @if(Session::get('success'))
    <div class="alert alert-success mt-2">
      {{Session::get('success')}}
    </div>
    @endif

    <!-- Mensaje de error -->
    @if(Session::get('error'))
    <div class="alert alert-danger mt-2">
      {{Session::get('error')}}
    </div>
    @endif  --}}
    
        
    

    {{--  <!-- Mensaje de éxito -->
    @if(session('success'))
        <!-- Modal -->
        <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="successModalLabel">Actualización Exitosa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{ session('success') }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    @endif  --}}
    
    <div class="card" style="width: 90%;">
        <div class="card-body mx-5 my-3">
            

            <form action="{{ route('update.perfil', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="profile-widget-header" >
                    <img alt="image" src="{{ $user->image ? asset('storage/profiles/' . $user->image) : asset('profiles/images.png') }}" class="rounded-circle profile-widget-picture">
                    {{--  <img alt="image" src="{{asset($user->image)}}" class="rounded-circle profile-widget-picture">  --}}
                </div>

                <div class="form-group">
                    <label for="image">Imagen de Perfil</label>
                    <input type="file" name="image" class="form-control-file">
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Nombre</label>
                    <div class="col-sm-8">
                        <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" disabled>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label">Correo Electrónico</label>
                    <div class="col-sm-9">
                        <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}">
                    </div>
                </div>

                

                <div class="form-group row">
                    <div class="col-sm-9 offset-sm-3">
                        <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body mx-5 my-3">
            <form action="">
                <div class="form-group row">
                    <label for="current_password" class="col-sm-3 col-form-label">Contraseña Actual</label>
                    <div class="col-sm-9">
                        <input type="password" name="current_password" class="form-control">
                        {{--  @error('current_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror  --}}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-sm-3 col-form-label">Nueva Contraseña</label>
                    <div class="col-sm-9">
                        <input type="password" name="password" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password_confirmation" class="col-sm-3 col-form-label">Confirmar Nueva Contraseña</label>
                    <div class="col-sm-9">
                        <input type="password" name="password_confirmation" class="form-control">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection