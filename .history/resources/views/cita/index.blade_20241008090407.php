@extends('adminlte::page')

@section('title', 'Moident')

@section('content_header')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <script src="https://kit.fontawesome.com/12da147e45.js" crossorigin="anonymous"></script>
@stop

@section ('content')
@if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

<main>
<div class="container">
  <div class="row px-4">
      <h3>Gestion Citas</h3>
      
  </div>
</div>

<div class="container px-4 mt-2">
  <div class="row">
      <div class="col-md-6">
          <!-- Botón para agregar a la izquierda -->
          <a href="" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#modalCrear">Agregar Cita</a>
          @include('cita.crear')

        <!-- Botón para agregar a la izquierda -->
        <button class="btn btn-secondary">PDF</button>
      </div>
      <div class="col-md-6">
        <!-- Botón para regresar atrás alineado a la derecha -->
          <a href="{{route('cita.index')}}" class="btn btn-secondary ml-2 float-right">Regresar</a>
          <!-- Input y botón de búsqueda alineados a la derecha -->
          <form class="form-inline float-right" action="{{ route('cita.buscar') }}" method="GET">
              <input type="text" name="texto" id="estado" class="form-control mr-1" placeholder="Buscar">
              <button type="submit" class="btn btn-primary">Buscar</button>
          </form>
          
      </div>
  </div>
</div>


  
  <div class="mt-2 col-md-12">
    <div class=" card table-responsive py-3 px-3">
      <table class="table table-striped table-hover ">

    <thead>
      <tr>
        <th scope="col">n</th>
        <th scope="col">Fecha</th>
        <th scope="col">Hora</th>
        <th scope="col">Motivo</th>
        <th scope="col">Ci</th>
        <th scope="col">Paciente</th>
        <th scope="col">Estado</th>
        <th scope="col">Accion</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($citas as $cita)
      <tr>
          {{--  <th scope="row">{{ $citas->firstItem() + $loop->index }}</th>  --}}
          <td>{{ $citas->firstItem() + $loop->index }}</td>
          <td>{{$cita->fecha}}</td>
          <td>{{$cita->hora_inicial}}</td>
          <td>{{$cita->motivo}}</td>
          <td>{{$cita->paciente->ci}}</td>
          <td>{{$cita->paciente->nombre}} {{$cita->paciente->paterno}} {{$cita->paciente->materno}} </td>
          <td>

            @if($cita->estado==="Por atender")
              <span class="badge badge-warning">{{$cita->estado}}</span>
            @elseif($cita->estado==="Atendida")
              <span class="badge badge-success">{{$cita->estado}}</span>
            @elseif($cita->estado==="Cancelada")
              <span class="badge badge-danger">{{$cita->estado}}</span>
            @elseif($cita->estado==="Reprogramada")
              <span class="badge badge-info">{{$cita->estado}}</span>
                              
            @endif            
            
          </td>

          <td>
            {{--  <a href="" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#modalEditar"><i
                class="fa-solid fa-pen"></i></a>
            <a href="" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i></a>  --}}
            <form action="{{route('citas.eliminar2',$cita->id)}}" method="POST">
              {{--  <a class="btn btn-sm btn-primary " href=""><i class="fa fa-fw fa-eye"></i></a>  --}}
              <a href="#" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#modalEditar{{$cita->id}}">  <i class="fa fa-fw fa-edit" ></i> </a>

              
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm" onclick = "return res()"><i class="fa fa-fw fa-trash"></i> </button>
                                                  {{--  <a class="btn btn-sm btn-warning" href=""><i class="fa fa-fw fa-edit"></i> {{ __('User') }}</a>  --}}
            </form>
            @include('cita.editar')
            <form action="{{ route('citas.cambiar_estado', $cita->id) }}" method="POST">
              @csrf
              @method('PUT')
              <select id="inputState" class="form-select badge rounded-pill bg-gradient-info" name="estado" onchange="this.form.submit()">
                @foreach(App\Models\Cita::ESTADOS as $estado)
                      <option value="{{ $estado }}" {{ $cita->estado === $estado ? 'selected' : '' }}>{{ $estado }}</option>
                  @endforeach
              </select>
            </form>
          
          </td>
        @endforeach

      </tr>
    </tbody>
  </table>
  {{$citas->links()}}
</div>
</div>
</main>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>

@section('js')
<script>
  var res = function(){
    var not = confirm("¿Estas seguro de eliminar este registro?");
    return not;
  }
</script>
<script>
  console.log('Hi!');
</script>
@stop