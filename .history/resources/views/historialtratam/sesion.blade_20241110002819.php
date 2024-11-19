<!-- Modal Sesion-->
<div class="modal fade" id="modalSesion{{$histo->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-primary py-2 px-4" id="exampleModalLabel"><i
                        class="fa-regular fa-calendar-plus"></i> NUEVA SESION</h1>
                <button type=" button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                

                    <div class="container py-3 px-7">
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label  text-right">Paciente</label>
                            <div class="col-sm-8">
                                <input type="text" name="" id="" class="form-control" value="{{$histo->paciente->nombre}} {{$histo->paciente->paterno}} {{$histo->paciente->materno}}" readonly>
                            
                            </div>
                        </div>
                        <div class="form-group row">
                          <label for="" class="col-sm-3 col-form-label  text-right">Tratamiento</label>
                          <div class="col-sm-8">
                              <input type="text" name="" id="" class="form-control" value="{{$histo->tratamiento->nombre}}" readonly>
                          
                          </div>
                      </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label  text-right">Fecha de Sesion</label>
                            <div class="col-sm-8">
                                <input type="text" name="fecha" id="fecha_sesion" class="form-control" value="{{ date('Y-m-d H:i:s') }}" required readonly>
                            </div>
                        </div>
                        {{--  <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label  text-right">Numero de Sesion</label>
                            <div class="col-sm-8">
                                <input type="number" name="sesion" id="sesion" class="form-control" value="{{ ($histo->sesion ?? 0) + 1 }}"
                                readonly>
                            </div>
                        </div>  --}}
                <form action="{{ route('sesion.registrarSesion',$histo->id) }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label  text-right">Medicamento</label>
                            <div class="col-sm-8">
                                <input type="text" name="medicamento" id="medicamento" class="form-control" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputPassword" class="col-sm-3 col-form-label  text-right">Descripcion</label>
                          <div class="col-sm-8">
                              <input type="text" name="descripcion" id="descripcion" class="form-control" value="">
                          </div>
                      </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label  text-right">Estado</label>
                            <div class="col-sm-8">
                              <select name="estado" id="estado" class="form-select badge rounded- bg-gradient-cyan">
                                {{--  <option value="Pentiente">pendiente</option>  --}}
                                <option value="en curso">En curso</option>
                                <option value="terminado">Terminado</option>
                        
                              </select>  
                            </div>
                        </div>
                        
                    </div>
                    <div class="container align-content-end">
                        <button type="submit" class="btn btn-primary"><i class="fa-regular fa-floppy-disk"></i>
                            Guardar</button>
                    </div>
                    
                </form>

                    <div class="modal-footer" py2>
                        <button type="submit" class="btn btn-primary"><i class="fa-regular fa-floppy-disk"></i>
                            Guardar</button>
                        {{--  <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i>
                            Cancelar</button>  --}}
                    </div>
                
                
                    
                <!-- Tabla de sesiones realizados -->
                
                {{--  <div class="modal-body">
                    @if($histo->sesions->isNotEmpty())
                    <h5 class="mt-2">Sesiones Realizadas</h5>
                        <div style="max-height: 150px; overflow-y: auto;">
                            <!-- Ajustar el ancho de la tabla con una clase personalizada o de Bootstrap -->
                            <table class="table table-bordered table-sm mt-2 w-80 mx-auto">
                                <thead>
                                    <tr>
                                        <th>Fecha de Sesion</th>
                                        <th>Medicamento</th>
                                        <th>Descripcion</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($histo->sesions as $sesion)
                                        <tr>
                                            <td>{{ $sesion->fecha }}</td>
                                            <td>{{ $sesion->medicamento }}</td>
                                            <td>{{ $sesion->descripcion }}</td>
                                            <td>{{ $sesion->estado }}</td>
                                            <td>
                                                <!-- Botones de Editar y Eliminar -->
                                                <div class="d-flex justify-content-around">
                                                    <a href="" class="btn btn-sm"><i class="fa-solid fa-pen" style="color: #67b9fc;"></i></a>
                                                    <form action="" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este pago?');">
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
                </div>  --}}
            </div>
        </div>
    </div>
</div>