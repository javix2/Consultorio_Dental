
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
    <h3>Historial de Tratamiento Realizados</h3>
    @if(Session::get('success'))
    <div class="alert alert-success mt-2">
      {{Session::get('success')}}
    </div>
    @endif

    <div class="row">
      <div class="col-md-6">
        <div class="py-2">
          <a href="" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#modalCrear"><i
              class="fa-solid fa-user-plus"></i> Nuevo Tratamiento</a>
              <a href="{{ route('historialtratam.reportegen') }}" class="btn btn-secondary" target="_blank">PDF</a>
          @include('historialtratam.crear')
        </div>
      </div>
      <div class="container col-md-6 ">
        <div class="col-md-10 py-2  ">
          <form action="{{route('historialtratam.buscar')}}" method="get">
            <div class="row justify-content-center">
              {{--  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">  --}}
                <div class="input-group mb-10">
                  <input type="text" class="form-control" name="texto" placeholder="Buscar pacientes" value=""
                    aria-label="Recipient's username" aria-describedby="">    
                  <button class="btn btn-outline-primary" type="submit" id="">Buscar</button>
                </div>
              {{--  </div>  --}}
            </div>
          </form>
        </div>
      </div>
    </div>
    
  </div>
  
</main>

<div class="mt-3">
<div class="table-responsive card py-3 px-2 bgcolor">
  <table class="table table-striped table-hover ">

    <thead>
      <tr>
        <th scope="col">N°</th>
        <th scope="col">Ci</th>
        <th scope="col">Nombre Completo</th>
        <th scope="col">Tratamiento</th>
        <th scope="col">estado</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody class="table-group-divider">
      @foreach($historials as $histo)
      <tr>
        <td>{{ $historials->firstItem() + $loop->index }}</td>

        <td>{{$histo->paciente->ci}}</td>
        <td>{{$histo->paciente->nombre}} {{$histo->paciente->paterno}} {{$histo->paciente->materno}}</td>
        <td>{{$histo->tratamiento->nombre}}</td>
        {{--  <td>{{$histo->sesions->estado}}</td>  --}}
        <td>{{ $histo->sesions->first()->estado ?? 'No hay sesiones' }}</td>

        <td>
          @if($histo->sesions->estado==="en curso")
              <span class="badge badge-warning">{{$histo->estado}}</span>
            @elseif($histo->estado==="terminado")
              <span class="badge badge-success">{{$histo->estado}}</span>
            @elseif($histo->estado==="pendiente")
              <span class="badge badge-danger">{{$histo->estado}}</span>                              
            @endif 
        </td>
        
        <td>
            {{--  <a href="" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#modalVer{{$histo->id}}">Detalles</a>  --}}
            {{--  <a href="" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalEditar{{$histo->id}}">Editar</a>  --}}
            <a href="" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalSesion{{$histo->id}}">Iniciar Tratamiento</a>
            
            <form action="{{ route('historialtratam.elimina',$histo->id) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este registro?')">Eliminar</button>
            </form>

          @include('historialtratam.sesion')

        </td>

        @include('historialtratam.ver')
        @include('historialtratam.editar')

        @endforeach
      </tr>

    </tbody>
    
  </table>
  {{$historials->links()}}
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
<style>
  .bgcolor{
    background-color: white;
  }
</style>

@stop