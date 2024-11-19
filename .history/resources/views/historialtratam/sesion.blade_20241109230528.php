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
                <form action="{{ route('historialtratam.sesionregistro',$histo->id) }}" method="POST">
                    @csrf

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
                                <input type="text" name="fecha_sesion" id="fecha_sesion" class="form-control" value="{{ date('Y-m-d H:i:s') }}" required readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label  text-right">Numero de Sesion</label>
                            <div class="col-sm-8">
                                <input type="number" name="numero_sesion" id="numero_sesion" class="form-control" value="{{$histo->sesion}}" readonly>
                            </div>
                        </div>
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
                                <option value="En curso">en curso</option>
                                <option value="Terminado">terminado</option>
                        
                              </select>  
                            </div>
                        </div>
                        
                    </div>
                    
                    
                    <div class="modal-footer" py2>
                        <button type="submit" class="btn btn-primary"><i class="fa-regular fa-floppy-disk"></i>
                            Guardar</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i>
                            Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>