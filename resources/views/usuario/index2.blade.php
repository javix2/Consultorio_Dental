@extends('adminlte::page')

@section('title', 'Moident')

@section('content_header')
<!--h1>Dashboard</h1-->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/12da147e45.js" crossorigin="anonymous"></script>

@stop

@section ('content')

<main>
  <div class="container">
    <h3>Editar Perfil</h3>
    @if(session("correcto"))
    <div class="alert alert-success">{{session("correcto")}}</div>
    @endif
    @if(session("incorrecto"))
    <div class="alert alert-danger">{{session("incorrecto")}}</div>
    @endif

    {{-- <div class="py-2">
      <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCrear"><i
          class="fa-solid fa-user-doctor"></i> Nuevo Medico</a>
      @include('doctor.crear')
    </div> --}}
  </div>
</main>
{{-- <div class="p-3 table-responsive py-2">
  <table class="table table-hover">

    <thead class="table-primary">
      <tr>
        <th scope="col">n</th>
        <th scope="col">Ci</th>
        <th scope="col">Nombre completo</th>
        <th scope="col">Celular</th>
        <th scope="col">Direccion</th>
        <th scope="col" class="">Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($datos as $item )
      <tr>
        <th scope="row">{{$item->iddoctor}}</th>
        <td>{{$item->ci}} {{$item->exped}}</td>
        <td>{{$item->nombre}} {{$item->paterno}} {{$item->materno}}</td>
        <td>{{$item->celular}}</td>
        <td>{{$item->direccion}}</td>
        <td>
          <a href="" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#modalEditar{{$item->ci}}"><i
              class="fa-solid fa-pen"></i></a>
          <a href="{{route(" doctor.delete", $item->ci)}}" onclick = "return res()" class="btn btn-danger btn-sm"><i
              class="fa-solid fa-trash-can"></i></a>
        </td>

        @include('doctor.editar')

        @endforeach
      </tr>
    </tbody>
  </table>
</div> --}}
<div class="card profile-widget bg-secondary-subtle">
  <form method="POST" class="row g-3 py-4 px-3" action="{{ route('usuario.update') }}" enctype="multipart/form-data">
    @csrf

    <div class="profile-widget-header col p-3">
      <img src="{{ asset(Auth::user()->image) }}" alt="image" class="rounded-circle profile-widget-picture">

    </div>

    <div class="row py-3 px-4">
      <div class="col-md-9">
        <label for="inputEmail4" class="form-label">Imagen</label>
        <input type="file" class="form-control" id="inputEmail4" name="image" >
      </div>
      <div class="col-md-4">
        <label for="inputEmail4" class="form-label">Usuario</label>
        <input type="text" class="form-control" id="inputEmail4" name="name" value="{{ Auth::user()->name }}">
      </div>
      <div class="col-md-4">
        <label for="inputEmail4" class="form-label">Correo Electronico</label>
        <input type="email" class="form-control" id="inputEmail4" name="email" value="{{ Auth::user()->email }}">
      </div>
      <div class="col-md-8">
        <label for="inputPassword4" class="form-label">Contraseña</label>
        <input type="password" class="form-control" id="inputPassword4">
      </div>
      {{-- <div class="col-12">
        <label for="inputAddress" class="form-label">Address</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
      </div>

      <div class="col-md-6">
        <label for="inputCity" class="form-label">City</label>
        <input type="text" class="form-control" id="inputCity">
      </div>
      <div class="col-md-4">
        <label for="inputState" class="form-label">State</label>
        <select id="inputState" class="form-select">
          <option selected>Choose...</option>
          <option>...</option>
        </select>
      </div>
      <div class="col-md-2">
        <label for="inputZip" class="form-label">Zip</label>
        <input type="text" class="form-control" id="inputZip">
      </div>
      <div class="col-12">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="gridCheck">
          <label class="form-check-label" for="gridCheck">
            Check me out
          </label>
        </div>
      </div> --}}
      <div class="col-8 py-4 ">
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
      </div>
    </div>
  </form>
</div>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<script>
  console.log('Hi!');
</script>
<script>
  var res = function(){
    var not = confirm("¿Estas seguro de eliminar?");
    return not;
  }
</script>

@stop