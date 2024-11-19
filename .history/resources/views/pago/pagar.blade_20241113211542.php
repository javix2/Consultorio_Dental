<!-- Modal pagar-->
<div class="modal fade" id="modalPagar{{$histo->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-primary px-4" id="exampleModalLabel"><i
                        class="fa-regular fa-calendar-plus"></i> REALIZAR PAGO</h1>
            </div>

            <div class="modal-body">
                <h4>Paciente: {{ $histo->paciente->nombre }} {{ $histo->paciente->paterno }} {{ $histo->paciente->materno }}</h4>
            
                <div class="card mb-3">
                    <div class="card-body">
                        {{--  <p><strong>Paciente:</strong> {{ $histo->paciente->nombre }} {{ $histo->paciente->paterno }} {{ $histo->paciente->materno }}</p>  --}}
            
                        <!-- Fila para Tratamiento y Monto Total -->
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Tratamiento:</strong> {{ $histo->tratamiento->nombre }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Precio:</strong> {{ $histo->tratamiento->costo }}</p>
                            </div>
                        </div>
            
                        <!-- Fila para Pagado y Saldo -->
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Pagado:</strong> {{ number_format($histo->tratamiento->costo - $histo->saldo, 2) }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Saldo Pendiente:</strong> {{ $histo->saldo }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            
                <!-- Formulario de Pago -->
                @if($histo->saldo > 0)
                    <form action="{{ route('pagos.registrarPago', $histo->id) }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-8">
                                <input type="number" name="monto" class="form-control" placeholder="Ingrese su Cuota" required>
                            </div>
                            <div class="col-md-4 d-flex align-items-center justify-content-start">
                                <button type="submit" class="btn btn-primary w-100">Registrar Pago</button>
                            </div>
                        </div>
                        
                        
                    </form>
                        
                    @else
                        <div class="alert alert-success">
                            <strong>¡Pago Completo!</strong> El saldo ha sido pagado en su totalidad.
                        </div>

                @endif
            
                <!-- Tabla de pagos realizados -->
                
                <div class="modal-body">
                    @if($histo->pagos->isNotEmpty())
                    <h5 class="mt-2">Pagos Realizados</h5>
                        <div style="max-height: 150px; overflow-y: auto;">
                            <!-- Ajustar el ancho de la tabla con una clase personalizada o de Bootstrap -->
                            <table class="table table-bordered table-sm mt-2 w-75 mx-auto">
                                <thead>
                                    <tr>
                                        <th>Fecha de Pago</th>
                                        <th>Monto</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($histo->pagos as $pago)
                                        <tr>
                                            <td>{{ $pago->created_at->format('d/m/Y H:i') }}</td>
                                            <td>{{ $pago->monto }}</td>
                                            <td>
                                                <!-- Botones de Editar y Eliminar -->
                                                <div class="d-flex justify-content-around">
                                                    <a href="" class="btn btn-sm"><i class="fa-solid fa-pen" style="color: #67b9fc;"></i></a>
                                                    <form action="{{route('pago.update')}}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este pago?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm"><i class="fa-regular fa-square-minus" style="color: #ff1c1c;"></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p>No se han registrado pagos aún.</p>
                    @endif
                </div>
                
            </div>
            <div class="modal-footer" py2>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Cerrar</button>
            </div>
            
        </div>
        
    </div>
    
</div>


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