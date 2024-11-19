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

{{--  <h2>Editar Perfil</h2>  --}}
<!-- Mostrar errores de validación -->
{{--  @if($errors->any())
            @foreach ($errors->all() as $error)
            <div>
                <span class="alert alert-danger">{{$error}}</span>
            </div>
            @endforeach
    @endif  --}}
<div class="container d-flex justify-content-center">
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
    
    <!-- Fila para la imagen que ocupa toda la fila -->
<div class="container">
    <div class="row mb-3">
        <div class="col-12 text-center">
            <img src="{{ asset('/img/password.png') }}" alt="Imagen de perfil" class="rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
        </div>
    </div>
    
    <!-- Card con el formulario -->
    <div class="card" style="width: 60%; margin: 0 auto;">
        <div class="card-body my-2">
            <div class="alert alert-info d-flex align-items-center" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" 
                     viewBox="0 0 16 16" role="img" aria-label="Warning:" width="24" height="24">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
                <div style="font-size: 0.9rem;">
                    La contraseña debe tener al menos 8 caracteres, incluir una letra mayúscula, una minúscula, un número y un carácter especial (por ejemplo, !, @, #).
                </div>
            </div>
            <!-- Mostrar mensajes de error o éxito -->
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Mostrar los errores de validación -->
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form action="{{ route('perfil.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
    
                <div class="form-group row">
                    <label for="email" class="col-sm-4 col-form-label text-end">Correo</label>
                    <div class="col-sm-7">
                        <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}">
                    </div>
                </div>
    
                <div class="form-group row">
                    <label for="current_password" class="col-sm-4 col-form-label text-end">Contraseña Actual</label>
                    <div class="col-sm-7">
                        <input type="password" name="current_password" class="form-control">
                    </div>
                </div>
            
                <div class="form-group row">
                    <label for="password" class="col-sm-4 col-form-label text-end">Contraseña Nueva</label>
                    <div class="col-sm-7">
                        <input type="password" name="password" class="form-control">
                    </div>
                </div>
    
                <div class="form-group row">
                    <label for="password_confirmation" class="col-sm-4 col-form-label text-end">Confirmar Contraseña</label>
                    <div class="col-sm-7">
                        <input type="password" name="password_confirmation" class="form-control">
                    </div>
                </div>
    
                <!-- Alinear el botón a la derecha -->
                <div class="form-group row">
                    <div class="col-sm-9 offset-sm-3 text-end">
                        <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
</div>

    

      
</div>

@endsection