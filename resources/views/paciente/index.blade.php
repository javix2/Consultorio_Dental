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
    <h3>Listado de Pacientes</h3>
    @if(Session::get('success'))
    <div class="alert alert-success mt-2">
      {{Session::get('success')}}
    </div>
    @endif
    <div class="row">
      <div class="col-md-6">
        <div class="py-2">
          <a href="" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#modalCrear"><i
              class="fa-solid fa-user-plus"></i> Nuevo Paciente</a>
              <a href="{{ route('paciente.reporte') }}" class="btn btn-secondary" target="_blank">PDF</a>
          @include('paciente.crear')
        </div>
      </div>
      <div class="container col-md-6 ">
        <div class="col-md-10 py-2  ">
          <form action="{{route('paciente.busqueda')}}" method="GET">
            <div class="row justify-content-center">
                <div class="input-group mb-10">
                  <input type="text" class="form-control" name="texto" placeholder="Buscar pacientes">    
                  <button class="btn btn-outline-primary" type="submit" id="">Buscar</button>
                </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    
  </div>
  
</main>

<div class="mt-3">
<div class=" card table-responsive py-2 col-md-12 text-center px-2">
  <table class="table table-striped table-hover">

    <thead>
      
      <tr>
        <th scope="col">N°</th>
        <th scope="col">Ci</th>
        <th scope="col">Nombre Completo</th>
        <th scope="col">Dirección</th>
        <th scope="col">Celular</th>
        <th scope="col">Fecha/Nac</th>
        <th scope="col">Genero</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>

    <tbody class="table-group-divider">
      @foreach($pacientes as $pac)
      <tr>
        <td>{{ $pacientes->firstItem() + $loop->index }}</td>
        <td>{{$pac->ci}} {{$pac->expe}}</td>
        <td>{{$pac->nombre}} {{$pac->paterno}} {{$pac->materno}}</td>
        <td>{{$pac->direccion}}</td>
        <td>{{$pac->celular}}</td>
        <td>{{$pac->fecha_nac}}</td>
        <td>{{$pac->genero}}</td>
        <td>
          <form action="{{ route('paciente.destroy', $pac->id) }}" method="POST">
            <a href="#" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#modalEditar{{$pac->id}}"><i class="fa fa-fw fa-edit" ></i> </a>
            <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalVer{{$pac->id}}"><i class="fa-solid fa-eye"></i> </a>

            @csrf

            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm" onclick = "return res()" ><i class="fa fa-fw fa-trash"></i> </button>
          </form>
        </td>

        @include('paciente.editar')
        @include('paciente.ver')

        @endforeach
      </tr>
    </tbody>
    
  </table>
  {{$pacientes->links()}}
</div>
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
    var not = confirm("¿Estas seguro de eliminar este reegistro?");
    return not;
  }
</script>
<style>
  .bgcolor{
    background-color: white;
  }
</style>

@stop