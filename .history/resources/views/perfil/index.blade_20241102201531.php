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

<h2>Editar Perfil</h2>
<!-- Mostrar errores de validación -->

<div class="container d-flex justify-content-center my-4">
    <div class="card" style="width: 90%;">
        <div class="card-body mx-4">
            <form action="{{ route('perfil.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Nombre</label>
                    <div class="col-sm-8">
                        <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" disabled>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label">Correo Electrónico</label>
                    <div class="col-sm-9">
                        <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="current_password" class="col-sm-3 col-form-label">Contraseña Actual</label>
                    <div class="col-sm-9">
                        <input type="password" name="current_password" class="form-control" required>
                        @error('current_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
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

                <div class="form-group row">
                    <div class="col-sm-9 offset-sm-3">
                        <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection