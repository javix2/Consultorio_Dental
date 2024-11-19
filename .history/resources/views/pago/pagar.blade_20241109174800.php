<!-- Modal pagar-->
<div class="modal fade" id="modalPagar{{$histo->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-primary py-2 px-4" id="exampleModalLabel"><i
                        class="fa-regular fa-calendar-plus"></i> REALIZAR PAGO</h1>
                <button type=" button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                {{--  <h2>Registrar Pago para el Tratamiento de {{ $histo->paciente->nombre }}</h2>  --}}

                <div class="card mb-3">
                    <div class="card-body">
                        <p><strong>Paciente:</strong> {{ $histo->paciente->nombre }} {{ $histo->paciente->paterno }} {{ $histo->paciente->materno }}</p>
                        <p><strong>Tratamiento:</strong> {{ $histo->tratamiento->nombre }}</p>
                        <p><strong>Monto Total:</strong> {{ $histo->tratamiento->costo }}</p>
                        <p><strong>Pagado:</strong> {{ number_format($histo->tratamiento->costo - $histo->saldo, 2) }}</p>
                        {{--  <p><strong>Pagado:</strong> {{ $histo->tratamiento->costo - $histo->saldo }}</p>  --}}
                        <p><strong>Saldo Pendiente:</strong> {{ $histo->saldo }}</p>
                    </div>
                </div>
                <form action="{{ route('pagos.registrarPago', $histo->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="monto">Monto a Pagar:</label>
                        <input type="number" name="monto" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Registrar Pago</button>
                </form>
                
                <!-- Lista de pagos realizados -->
                <h3 class="mt-5">Pagos Realizados</h3>
                @if($pagosRealizados->isEmpty())
                    <p>No se han registrado pagos aún.</p>
                @else
                    <ul class="list-group">
                        @foreach($pagosRealizados as $pago)
                            <li class="list-group-item">
                                <strong>Fecha de Pago:</strong> {{ $pago->created_at->format('d/m/Y') }} <br>
                                <strong>Monto:</strong> {{ $pago->monto }}
                            </li>
                        @endforeach
                    </ul>
                @endif

                {{--  <form action="{{ route('pago.updatePago' ,$histo->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="container py-3 px-7">
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label  text-right">Paciente</label>
                            <div class="col-sm-8">
                                <input type="text" name="paciente" id="paciente" class="form-control" value="{{ $histo->paciente->nombre }} {{ $histo->paciente->paterno }} {{ $histo->paciente->materno }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label  text-right">Especialidad</label>
                            <div class="col-sm-8">
                                <input type="text" name="tratamiento_id" id="" class="form-control" value="{{ $histo->tratamiento->nombre }}" readonly>
                    
                            </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputPassword" class="col-sm-3 col-form-label  text-right">Costo de Tratamiento</label>
                          <div class="col-sm-8">
                              <input type="text" name="tratamiento_id" id="" class="form-control" value="{{ $histo->tratamiento->costo }}" readonly>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputPassword" class="col-sm-3 col-form-label  text-right">Total Pagado</label>
                          <div class="col-sm-8">
                              <input type="text" name="tratamiento" id="tratamiento" class="form-control" value="{{ $histo->monto_total }}" readonly>
                          </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label  text-right">Cuota</label>
                            <div class="col-sm-8">
                                <input type="text" name="monto_total" id="monto_total" class="form-control" value="{{ $histo->monto }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label  text-right">Fecha de Pago</label>
                            <div class="col-sm-8">
                                <input type="text" name="fecha_pago" id="fecha_pago" class="form-control" value="{{ date('Y-m-d H:i:s') }}">
                            </div>
                        </div>
                        
                    </div>
                    <div class="modal-footer" py2>
                        <button type="submit" class="btn btn-primary"><i class="fa-regular fa-floppy-disk"></i>
                            Pagar</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i>
                            Cancelar</button>
                    </div>
                </form>  --}}
            </div>
        </div>
    </div>
</div>