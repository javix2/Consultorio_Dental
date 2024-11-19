<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <link rel="icon" type="image/x-icon" href="{{ asset('favicons/dent.png') }}" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sistema de Control Moident</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <style>
    .texto {
      background: white;
    }

    i {
      padding: 0;
      margin: 0;
      font-size: 20px;
    }

    .contenido {
      background-image: linear-gradient(120deg, #d8c78e 0%, #d05d3d 100%);
      /* background-image: linear-gradient(to top, #d9afd9 0%, #97d9e1 100%); */
    }

    .buton {
      background-color: rgb(40, 186, 186);
      color: aliceblue;
    }

    .cabezera {
      color: #e38519;
      font-size: 1.6rem;
      font-weight: 600;
    }

    .texto {
      color: rgb(139, 123, 123);
    }
  </style>
</head>

<body class="contenido d-flex justify-content-center align-items-center vh-100">
  {{-- <div class="d-flex justify-content-center">

  </div> --}}

  <div class="bg-white p-3 rounded-3 text-secondary shadow" style="width: 25rem">

    {{-- <div class=" d-flex text-center fs-5 fw-bold">Consultorio Moident</div> --}}
    <div d-flex class="border-bottom cabezera">
      <img src="{{URL::asset('images/images.png')}}" width="70px" />
      Consultorio Moident
    </div>
    <div class="text-center mt-3 sm">Autenticarse para iniciar sesion</div>

    
    {{--  <form method="POST" action="{{ route('login') }}">
      @csrf

      <div class="input-group mt-3">
        <div class="input-group-text containerr">
          <i class="bi bi-person" md></i>
        </div>
        <input id="email" type="email" class="form-control bg-light texto  @error('email') is-invalid @enderror"
          name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Usuario">

        @error('email')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>

      <div class="input-group mt-3">
        <div class="input-group-text containerr">
          <i class="bi bi-lock"></i>
        </div>
        <input id="password" type="password"
          class="form-control bg-light texto  @error('password') is-invalid @enderror" name="password" required
          autocomplete="current-password" placeholder="Contraseña" />
        @error('password')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>

      <div class="d-flex justify-content-around mt-1">
        <div class="d-flex align-items-center gap-1">
          <input class="form-check-input" type="checkbox" />
          <div class="pt-3" style="font-size: 0.9rem">Recordarme</div>
        </div>
        <div class="pt-3">
          <a href="#" class="text-decoration-none text-info fw-semibold fst-italic" style="font-size: 0.9rem">olvidaste
            tu contraseña?</a>
        </div>
      </div>
      <button class="btn btn-lg btn-info w-100 my-3 btn-block btn-signin buton" type="submit">
        {{ __('Ingresar') }}
      </button>

    </form>  --}}

    <form method="POST" action="{{ route('login') }}">
      @csrf
  
      <div class="input-group mt-3">
          <div class="input-group-text containerr">
              <i class="bi bi-person"></i>
          </div>
          <input id="email" type="email" class="form-control bg-light texto @error('email') is-invalid @enderror"
              name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Usuario">
  
          @error('email')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
      </div>
  
      <div class="input-group mt-3">
          <div class="input-group-text containerr">
              <i class="bi bi-lock"></i>
          </div>
          <input id="password" type="password"
              class="form-control bg-light texto @error('password') is-invalid @enderror" name="password" required
              autocomplete="current-password" placeholder="Contraseña" />
          @error('password')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
      </div>
  
      <div class="d-flex justify-content-around mt-1">
          <div class="d-flex align-items-center gap-1">
              <input class="form-check-input" type="checkbox" />
              <div class="pt-3" style="font-size: 0.9rem">Recordarme</div>
          </div>
          <div class="pt-3">
              <!-- Enlace al restablecimiento de contraseña -->
              <a href="{{ route('password.request') }}" class="text-decoration-none text-info fw-semibold fst-italic" style="font-size: 0.9rem">
                  Olvidaste tu contraseña?
              </a>
          </div>
      </div>
      
      <button class="btn btn-lg btn-info w-100 my-3 btn-block btn-signin buton" type="submit">
          {{ __('Ingresar') }}
      </button>
  </form>
  

  </div>

</body>

</html>