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
    <h3>Odontograma</h3>
    @if(Session::get('success'))
    <div class="alert alert-success mt-2">
      {{Session::get('success')}}

    </div>
    @endif

    <div class="py-2">
      <a href="{{route('odontograma.store')}}" class="btn btn-primary "><i class="bi bi-plus-circle"></i> Nuevo Odontograma</a>
      {{--  @include('odontograma.crear')  --}}
      @include('tratamiento.crear',['doctors'])
    
    </div>
    {{--  <div class="container px-4 mt-2">
      <div class="row">
          <div class="col-md-6">
              <a href="" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#modalCrear">Agregar Odontograma</a>
              @include('odontograma.crear')
    
          </div>
          <div class="col-md-6">
              <a href="{{route('odontograma.index')}}" class="btn btn-secondary ml-2 float-right">Regresar</a>
              <form class="form-inline float-right" action="{{ route('odontograma.buscar') }}" method="GET">
                  <input type="text" name="texto" id="estado" class="form-control mr-1" placeholder="Buscar">
                  <button type="submit" class="btn btn-primary">Buscar</button>
              </form>
              
          </div>
      </div>
    </div>  --}}
  </div>

  {{--  <div class="container px-4 my-2 col col-sm-9">
    <div class="row">
        <div class="col">
            <a href="" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#modalCrear">Agregar Odontograma</a>
            @include('odontograma.crear')
  
        </div>
        <div class="col">
            <a href="{{route('odontograma.index')}}" class="btn btn-secondary ml-2 float-right">Regresar</a>
            <form class="form-inline float-right" action="{{ route('odontograma.buscar') }}" method="GET">
                <input type="text" name="texto" id="estado" class="form-control mr-1" placeholder="Buscar">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </form>
            
        </div>
    </div>
  </div>  --}}

  <div class="col col-sm-9">
    <div class="p-3 table-responsive py-2 card">
      <table class="table table-striped table-hover">
        <thead class="table">
          <tr>
            {{--  <th scope="col" class="col-sm-1">id</th>  --}}
            <th scope="col" class="col-sm-1">N°</th>
            <th scope="col" class="col-sm-2">Paciente</th>
            <th scope="col" class="col-sm-2">numero de diente</th>
            <th scope="col" class="col-sm-2">estado</th>
            <th scope="col" class="col-sm-1">Accion</th>

          </tr>
        </thead>
        <tbody class="table-group-divider ">
          @foreach ($datos as $item )
          <tr>
            <td>{{$datos->firstItem() + $loop->index}}</td>
            <td>{{$item->paciente->nombre}} {{ $item->paciente->paterno }} {{ $item->paciente->materno }}</td>
            <td>{{$item->numero_diente}}</td>
            <td>{{$item->estado}}</td>
            <td>
              
              {{--  <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEditar{{$item->id}}"><i
                  class="fa-solid fa-pen"></i></a>
              @include('tratamiento.editar')  --}}
            
              {{--  <a href="{{route("tratamiento.destroy", $item->nombre)}}" onclick = "return res()" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i></a>  --}}
              

              {{--  <form action="{{ route('tratamiento.destroy', $item->id) }}" method="POST">
                <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEditar{{$item->id}}"><i
                  class="fa-solid fa-pen"></i></a>
                  @include('tratamiento.editar')
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash-can "></i></button>

              </form>  --}}
              

              <form action="{{ route('odontograma.destroy', $item->id) }}" method="POST">
                {{--  <a class="btn btn-sm btn-primary " href=""><i class="fa fa-fw fa-eye"></i></a>  --}}
                <a href="#" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#modalEditar{{$item->id}}">  <i class="fa fa-fw fa-edit" ></i> </a>

                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick = "return res()"><i class="fa fa-fw fa-trash"></i> </button>
                {{--  <a class="btn btn-sm btn-warning" href=""><i class="fa fa-fw fa-edit"></i> {{ __('User') }}</a>  --}}
              </form>
            @include('odontograma.editar')

            </td>

          @endforeach
          </tr>
          
        </tbody>
      </table>
      {{ $datos->links() }}
    </div>
  </div>
  <div class="col-sm-1">

    {{--  <img src="{{URL::asset('/img/dental.jpg')}}" class="img-thumbnail" alt="...">  --}}

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