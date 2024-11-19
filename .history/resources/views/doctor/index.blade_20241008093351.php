@extends('adminlte::page')
@section('title', 'Moident')
@section('content_header')
<!--h1>Dashboard</h1-->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/12da147e45.js" crossorigin="anonymous"></script>
<!-- Bootstrap CSS -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<!-- jQuery y Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
@stop
@section ('content')

<main>
  <div class="container mx-0">
    <h3>Listado de Medicos</h3>
    @if(Session::get('success'))
    <div class="alert alert-success mt-2">
      {{Session::get('success')}}
    </div>
    @endif
    <div class="py-2">
      <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCrear"><i class="fa-solid fa-user-doctor"></i> Nuevo Medico</a>
          @include('doctor.crear')
          {{--  @include('doctor.registrar')  --}}
    </div>
  </div>
</main>
<div class=" card p-3 table-responsive my-2 col-md-11 text-center">
  <table class="table table-hover">
    <thead class="py-4">
      <tr class="espacio">
        <th scope="col">n</th>
        <th scope="col">Ci</th>
        <th scope="col">Nombre completo</th>
        <th scope="col">Especialidad</th>
        <th scope="col">Celular</th>
        <th scope="col">Direccion</th>
        <th scope="col" class="">Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($doctors as $doc )
      <tr class="espacio">
        {{--  <td>{{$doctors->firstItem() + $loop->index }}</td>  --}}
        <td>{{$doc->ci}} {{$doc->expe}}</td>
        <td>{{$doc->nombre}} {{$doc->paterno}} {{$doc->materno}}</td>
        <td>{{$doc->especialidad}}</td>
        <td>{{$doc->celular}}</td>
        <td>{{$doc->direccion}}</td>
        {{--  <td>{{$doc->user->id}}</td>  --}}
        {{--  <td>
          @if($doc->user)
              {{$doc->user->name}}
          @else
              N/A
          @endif
        </td>  --}}
        <td>
          <form action="{{ route('doctor.destroy', $doc->id) }}" method="POST">
            {{--  <a class="btn btn-sm btn-primary " href="#" data-bs-toggle="modal" data-bs-target="#modalVer{{$doc->id}}"><i class="fa fa-fw fa-eye"></i></a>  --}}
            <a href="#" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#modalEditar{{$doc->id}}"><i class="fa fa-fw fa-edit" ></i> </a>
            <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalEditarUser{{$doc->id}}"><i class="fa-solid fa-key"></i> </a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm" onclick = "return res()"><i class="fa fa-fw fa-trash"></i> </button>
          </form>
        </td>
        @include('doctor.editar')
        {{--  @include('doctor.editarUser')  --}}
        {{--  @include('doctor.ver')  --}}
        
        @endforeach
      </tr>
    </tbody>
  </table>
  {{$doctors->links()}}
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
{{--  <script>
  document.addEventListener('DOMContentLoaded', function() {
      // Botón para mostrar el modal de usuario
      document.getElementById('nextToUser').addEventListener('click', function() {
          $('#modalCrear{{$doc->id}}').modal('hide');
          $('#modalRegistrar').modal('show');
      });
      // Botón para volver al modal de doctor
      document.getElementById('backToDoctor').addEventListener('click', function() {
          $('#modalRegistrar').modal('hide');
          $('#modalCrear').modal('show');
      });
  });
</script>  --}}
<style>
  .espacio {
    margin-bottom: 20px; /* Puedes ajustar el valor según el espacio deseado */
  }
</style>

@stop