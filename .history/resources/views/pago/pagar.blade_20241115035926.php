<!-- Modal principal de "Realizar Pago" -->
<div class="modal fade" id="modalPagar{{$histo->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Encabezado del modal -->
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-primary px-4" id="exampleModalLabel"><i
                        class="fa-regular fa-calendar-plus"></i> REALIZAR PAGO</h1>
            </div>

            <!-- Cuerpo del modal -->
            <div class="modal-body">
                <h4>Paciente: {{ $histo->paciente->nombre }} {{ $histo->paciente->paterno }} {{ $histo->paciente->materno }}</h4>
                
                <!-- Información del tratamiento -->
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Tratamiento:</strong> {{ $histo->tratamiento->nombre }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Precio:</strong> {{ $histo->tratamiento->costo }} {{"Bs."}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Pagado:</strong> {{ number_format($histo->tratamiento->costo - $histo->saldo, 2) }} {{"Bs."}}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Saldo Pendiente:</strong> {{ $histo->saldo }} {{"Bs."}}</p>
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
                                            <td>{{ $pago->monto }} {{"Bs."}}</td>
                                            <td>
                                                <!-- Botones de Editar y Eliminar -->
                                                <div class="d-flex justify-content-around">
                                                    <!-- Botón para abrir modal de edición -->
                                                    <button type="button" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#modalEditarPago{{$pago->id}}">
                                                        <i class="fa-solid fa-pen" style="color: #67b9fc;"></i>
                                                    </button>
                                                    <!-- Formulario de eliminación -->
                                                    <form action="{{ route('pago.eliminar', $pago->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este pago?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm"><i class="fa-regular fa-square-minus" style="color: #ff1c1c;"></i></button>
                                                    </form>
                                                    
                                                </div>
                                                <!-- Modal para editar el monto del pago -->
                                                    <div class="modal fade" id="modalEditarPago{{$pago->id}}" tabindex="-1" aria-labelledby="modalEditarPagoLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="modalEditarPagoLabel">Editar Pago</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{ route('pago.update', $pago->id) }}" method="POST">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <div class="form-group">
                                                                            <label for="monto">Monto</label>
                                                                            <input type="number" name="monto" class="form-control" value="{{ $pago->monto }}" required>
                                                                        </div>
                                                                        <button type="submit" class="btn btn-primary mt-3">Actualizar Pago</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
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
 

            <!-- Pie del modal -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
                                     

