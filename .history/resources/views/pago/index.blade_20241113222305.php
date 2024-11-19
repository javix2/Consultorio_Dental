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

@section('content')
    <h3>Listado de Pagos </h3>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
      <div class="col-md-6">
        <div class="py-2">
          <a href="" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#modalCrear"><i
              class="fa-solid fa-user-plus"></i> Nuevo Pago</a>
              <a href="{{ route('pago.reportepago') }}" class="btn btn-secondary" target="_blank">PDF</a>
              {{--  <a href="" class="btn btn-secondary " target="_blank">EXCEL</a>  --}}
          @include('pago.crear')
        </div>
      </div>
      <div class="container col-md-6 ">
        <div class="col-md-10 py-2  ">
          <form action="{{route('pago.busca')}}" method="GET">
            <div class="row justify-content-center">
              {{--  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">  --}}
                <div class="input-group mb-10">
                  <input type="text" class="form-control" name="texto" placeholder="Buscar..." value=""
                    aria-label="Recipient's username" aria-describedby="">    
                  <button class="btn btn-outline-primary" type="submit" id="">Buscar</button>
                </div>
              {{--  </div>  --}}
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="mt-4 card table-responsive py-2 col-md-12 text-center">

    <table class="table">
        <thead>
            <tr>
                <th>N°</th>
                <th>Paciente</th>
                <th>Tratamiento</th>
                <th>Precio</th>
                <th>Total pagado</th>
                <th>Saldo pendiente</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($histo_tratams as $histo)
                <tr>
                    <td>{{ $histo_tratams->firstItem() + $loop->index }}</td>
                    <td>{{ $histo->paciente->nombre}} {{ $histo->paciente->paterno }}  {{ $histo->paciente->materno }}</td>
                    <td>{{ $histo->tratamiento->nombre }}</td>
                    <td>{{ $histo->tratamiento->costo}} {{"Bs."}}</td>
                    <td>{{ $histo->monto_total}} {{"Bs."}}</td>
                    <td>{{ $histo->saldo}} {{"Bs."}}</td>
                  
                    <td>
                        {{--  @if($pago->tratamiento->costo<=$pago->monto_total)  --}}
                        @if($histo->saldo==0)
                            <span class="badge bg-success">Pagado</span>
                        @else
                            <span class="badge bg-warning">Pendiente</span>
                        @endif
                    </td>
                    <td>
                        {{--  <a href="" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalEditar{{$histo->id}}">Editar</a>  --}}
                        <a href="" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalPagar{{$histo->id}}"><i class="fa-solid fa-money-bill-wave"></i></i></a>
                        {{--  <a href="" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#modalVer{{$histo->id}}"><i class="fa-solid fa-print"></i></a>  --}}
                        <a href="{{ route('pago.reporteboleta',$histo->id) }}" class="btn btn-info btn-sm" target="_blank"><i class="fa-solid fa-print"></i></a>
                        
                        <form action="{{ route('pago.destroy', $histo->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este registro?')"><i class="fa-solid fa-trash-can"></i></button>
                        </form>
                        {{--  @include('pago.editar')  --}}
                        @include('pago.ver')
                        @include('pago.pagar')


                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
  {{$histo_tratams->links()}}

  </div>
@endsection

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>

@stop