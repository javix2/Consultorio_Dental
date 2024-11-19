<!-- Modal pagar-->
<div class="modal fade" id="modalPagar{{$pago->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-primary py-2 px-4" id="exampleModalLabel"><i
                        class="fa-regular fa-calendar-plus"></i> REALIZAR PAGO</h1>
                <button type=" button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="{{ route('pago.updatePago' ,$pago->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="container py-3 px-7">
                        {{--  <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label  text-right">Cedula de
                                Indentidad</label>
                            <div class="col-sm-6">

                                <div class="input-group">
                                    <div class="form-outline">
                                        <input type="search" id="form1" class="form-control" />

                                    </div>
                                    <button type="button" class="btn btn-primary btn-sm">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>
                                </div>

                            </div>
                        </div>  --}}
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label  text-right">Paciente</label>
                            <div class="col-sm-8">
                                <input type="text" name="paciente" id="paciente" class="form-control" value="{{ $pago->paciente->nombre }} {{ $pago->paciente->paterno }} {{ $pago->paciente->materno }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label  text-right">Especialidad</label>
                            <div class="col-sm-8">
                                <input type="text" name="tratamiento_id" id="" class="form-control" value="{{ $pago->tratamiento->nombre }}" readonly>
                                {{--  <select name="tratamiento_id" id="tratamiento_id" class="form-control">
                                    @foreach($tratamientos as $tratamiento)
                                        <option value="{{ $tratamiento->id }}">{{ $tratamiento->nombre }}</option>
                                    @endforeach
                                </select>  --}}
                            </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputPassword" class="col-sm-3 col-form-label  text-right">Costo de Tratamiento</label>
                          <div class="col-sm-8">
                              <input type="text" name="tratamiento_id" id="" class="form-control" value="{{ $pago->tratamiento->costo }}" readonly>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputPassword" class="col-sm-3 col-form-label  text-right">Total Pagado</label>
                          <div class="col-sm-8">
                              <input type="text" name="tratamiento" id="tratamiento" class="form-control" value="{{ $pago->monto_total }}" readonly>
                          </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label  text-right">Cuota</label>
                            <div class="col-sm-8">
                                <input type="text" name="monto_total" id="monto_total" class="form-control" value="{{ $pago->monto }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label  text-right">Fecha de Pago</label>
                            <div class="col-sm-8">
                                <input type="text" name="fecha_pago" id="fecha_pago" class="form-control" value="{{ date('Y-m-d H:i:s') }}">
                            </div>
                        </div>
                        {{--  <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label  text-right">Enfermedad
                                Activa</label>
                            <div class="col-sm-8">
                                <input type="text " class="form-control" id="inputAddress">
                            </div>
                        </div>  --}}
                        {{--  <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label  text-right">Fecha</label>
                              <div class="col-sm-4">
                                <input id="datepicker" width="230">
                                <script>
                                  $('#datepicker').datepicker({
                                                 uiLibrary: 'bootstrap5'
                                                });
                                </script>
                              </div>
                        </div>  --}}
                    </div>
                    <div class="modal-footer" py2>
                        <button type="submit" class="btn btn-primary"><i class="fa-regular fa-floppy-disk"></i>
                            Pagar</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i>
                            Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>