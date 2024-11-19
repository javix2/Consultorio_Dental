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
    <h4>HISTORIAS DE PACIENTES</h4>
    @if(Session::get('success'))
    <div class="alert alert-success mt-2">
      {{Session::get('success')}}

    </div>
    @endif

    <div class="row">
      <div class="col-md-6">
        <div class="py-2">
          <a href="" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#modalCrear">Nuevo Historial</a>
              @include('historialclinico.crear')
              <a href="{{ route('historialclinico.reportegen') }}" class="btn btn-secondary" target="_blank">PDF</a>
              {{--  <a href="{{ route('paciente.export') }}" class="btn btn-secondary " target="_blank">EXCEL</a>  --}}
        </div>
      </div>
      <div class="container col-md-6 ">
        <div class="col-md-10 py-2  ">
          
          <form action="{{ route('historialclinico.search') }}" method="get">
            <div class="row justify-content-center">
                <div class="input-group mb-10">
                  <input type="text" class="form-control" name="search" placeholder="Buscar pacientes" aria-label="Recipient's username" aria-describedby="">    
                  <button class="btn btn-outline-primary" type="submit">Buscar</button>
                </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>


<div class="p-3 table-responsive my-2 card">
  <table class="table table-striped table-hover">

    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">No_Historia</th>
        <th scope="col">Fecha Apertura</th>
        <th scope="col">Paciente</th>
        <th scope="col">Ci</th>
        <th scope="col">Doctor</th>        
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody class="table-group-divider">
      @foreach($historias as $histo) 
      <tr>
        <td>{{ $historias->firstItem() + $loop->index }}</td>
        <td>{{$histo->no_hc}}</td>
        <td>{{$histo->fecha_aper}} </td>
        <td>{{$histo->paciente->nombre}}  {{$histo->paciente->paterno}} {{$histo->paciente->materno}}</td>
        <td>{{$histo->paciente->ci}}</td>
        <td>{{"Dr. Moises Choquevillca Chambilla"}}</td>
                
        <td>
          <form action="{{ route('historialclinico.destroy', $histo->id) }}" method="POST">
            <a href="#" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#modalEditar{{$histo->id}}"><i class="fa fa-fw fa-edit" ></i> </a>
            <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalVer{{$histo->id}}"><i class="fa-solid fa-eye"></i> </a>

            @csrf

            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm" onclick = "return res()" ><i class="fa fa-fw fa-trash"></i> </button>
          </form>
        </td>

       @include('historialclinico.editar')
       @include('historialclinico.ver')

        @endforeach
      </tr>
    </tbody>
    
  </table>
  {{$historias->links()}}
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
  document.getElementById('no_hc').value = Math.floor(Math.random() * 1000000) + 1;
</script>
{{--  <script>
  // Inicializa un valor de referencia. Puede ser el último valor guardado en la base de datos.
  let lastValue = 1000; // Cambia esto al último valor actual si está disponible.

  // Incrementa el valor en 1
  document.getElementById('no_hc').value = ++lastValue;
</script>  --}}



<script>
  var res = function(){
    var not = confirm("¿Estas seguro de eliminar este reegistro?");
    return not;
  }
</script>

@stop