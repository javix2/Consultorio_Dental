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
    <h3>Gestion de Usuario</h3>

    @if(Session::get('success'))
    <div class="alert alert-success mt-2">
      {{Session::get('success')}}

    </div>
    @endif
    

    <div class="py-2">
      <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCrear"><i class="fa-solid fa-user-doctor"></i> Nuevo Usuario</a>
          {{--  @include('usuario.register')  --}}
    </div>
  </div>
</main>
<div class=" card p-3 table-responsive py-2 ">
  <table class="table table-striped table-hover">

    <thead>
      <tr>
        {{--  <th scope="col">n</th>  --}}
        <th scope="col">Nombre de usuario</th>
        <th scope="col">correo electronico</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user )
      <tr>
        {{--  <th scope="row">{{$user->id}}</th>  --}}
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>
          {{--  <a href="" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#modalEditar{{$doc->id}}"><i class="fa-solid fa-pen"></i></a>
          
          <a href="{{route('doctor.destroy', $doc)}}"  class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i></a>  --}}
          
          <form action="{{route('usuario.destroy',$user->id)}}" method="POST">
            @csrf
            {{--  <a class="btn btn-sm btn-primary " href=""><i class="fa fa-fw fa-eye"></i></a>  --}}
            <a href="#" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#modalEditar{{$user->id}}"><i class="fa fa-fw fa-edit" ></i> </a>
            

            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm" onclick = "return res()"><i class="fa fa-fw fa-trash"></i> </button>
            {{--  <a class="btn btn-sm btn-warning" href=""><i class="fa fa-fw fa-edit"></i> {{ __('User') }}</a>  --}}
          </form>
        
        
        </td>

        {{--  @include('usuario.editar')  --}}
        
        @endforeach
      </tr>
    </tbody>
  </table>
  {{--  {{$doctors->links()}}  --}}
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


@stop