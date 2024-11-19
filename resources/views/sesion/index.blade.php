
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
    <h3>Nueva Sesion</h3>
    @if(Session::get('success'))
    <div class="alert alert-success mt-2">
      {{Session::get('success')}}
    </div>
    @endif

    <div class="row">
      <div class="col-md-6">
        <div class="py-2">
          <a href="" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#modalCrear"> Agregar nueva sesion</a>
              <a href="" class="btn btn-secondary" target="_blank">PDF</a>
              
          @include('sesion.crear')
        </div>
      </div>
    </div>
    
  </div>
  <div class="py-1 px-5">
    <h5>ID: <strong>{{"$histo->id"}}</strong> </h5> 
    {{--  <h5>Datos del Paciente: <strong>{{$histo->paciente->nombre}} {{$histo->paciente->paterno}} {{$histo->paciente->materno}}</strong></h5>
    <h5>Tatamiento: <strong>{{$histo->tratamiento->nombre}}</strong> </h5>  --}}
  </div>
  
</main>
  
<div class="mt-3">
<div class="table-responsive border border-secondary py-3 px-2 bgcolor">
  <table class="table table-striped table-hover ">

    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">id_Tratamiento</th>
        <th scope="col">no_sesion</th>
        <th scope="col">Fecha</th>
        <th scope="col">Mediacamento suministrado</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody class="table-group-divider">
      @foreach($sesions as $sesion)
      <tr>
        <th scope="row">{{$sesion->id}}</th>
        <td>{{$sesion->historial_tratam_id}}</td>
        <td>{{$sesion->numero_sesion}}</td>
        <td>{{$sesion->fecha_sesion}}</td>
        <td>{{$sesion->medicamento}}</td>
        
        <td>
            <a href="" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#modalVer{{$sesion->id}}">Ver Detalles</a>
            {{--  <a href="{{ route('pago.editPago', $pago->id) }}" class="btn btn-success btn-sm">Pagar</a>  --}}
            <a href="" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalEditar{{$sesion->id}}">Editar</a>
            
            <form action="{{ route('sesion.destroy', $sesion->id) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este pago?')">Eliminar</button>
            </form>
            {{--  @include('historialtratam.editar')
            @include('historialtratam.pagar')  --}}
            {{--  @include('historialtratam.ver')  --}}
        </td>

        {{--  @include('historialtratam.editar')  --}}

        @endforeach
      </tr>
    </tbody>
    
  </table>
  {{--  {{$pacientes->links()}}  --}}
</div>
</div>
<div class="d-flex justify-content-end mt-2">
  <a href="{{route('historialtratam.index')}}"  class="btn btn-primary btn-sm">Volver</a>

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
  document.addEventListener('DOMContentLoaded', function () {
      // Escuchar el evento click en el botón de eliminar
      document.getElementById('form-eliminar').addEventListener('submit', function (event) {
          // Mostrar el cuadro de diálogo de confirmación
          var confirmacion = confirm('¿Estás seguro que deseas eliminar este registro?');
          // Si el usuario confirma, se envía el formulario, de lo contrario, se cancela el evento
          if (!confirmacion) {
              event.preventDefault();
          }
      });
  });
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