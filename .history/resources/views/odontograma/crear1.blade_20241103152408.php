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
    <h3>Crear Odontograma</h3>
    @if(Session::get('success'))
    <div class="alert alert-success mt-2">
      {{Session::get('success')}}

    </div>
    @endif

    <div class="py-2">
      <a href="{{ route('odontogramas.index') }}" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#modalCrear"><i class="bi bi-plus-circle"></i>Regresar</a>
      @include('odontograma.crear')
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

  <form action="{{route("odontograma.store")}}" method="POST">
    @csrf
    <div class="container py-1 ">

        <div class="form-group row w-50 d-flex justify-content-center mx-5">
            <img src="{{URL::asset('/img/mapa_dental.jpg')}}" class="img-thumbnail" alt="..." width="100">
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label  text-right">Paciente</label>
            <div class="col-sm-6">
                <select id="inputState" class="form-select fst-italic" name="paciente_id">
                <option selected>seleccione</option>

                @foreach($pacientes as $pac)
                    <option value="{{ $pac->id }}">{{ $pac->nombre }} {{ $pac->paterno }} {{ $pac->materno }}</option>
                    
                @endforeach
                
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label  text-right">Numero diente</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="inputAddress" name="numero_diente">
            </div>
        </div>

        <div class="form-group row">
            <label for="inputPassword" class="col-sm-4 col-form-label  text-right">Estado</label>
            <div class="form-floating col-sm-6">
                <textarea class="form-control" placeholder="" id="floatingTextarea"
                    name="estado"></textarea>
            </div>
        </div>

        {{--  <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label  text-right">Nota</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="inputAddress" name="nota">
            </div>
        </div>  --}}

        
        
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-check"></i> Guardar</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-regular fa-circle-xmark"></i> Cancelar</button>
    </div>
</form>
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