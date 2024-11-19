<!-- Modal Crear-->
<div class="modal fade" id="modalCrear" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-primary py-2 px-4" id="exampleModalLabel"><i
                        class="fa-regular fa-calendar-plus"></i> NUEVA SESION</h1>
                <button type=" button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="{{ route('sesion.store') }}" method="POST">
                    @csrf

                    <div class="container py-3 px-7">
                        
                        {{--  <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label  text-right">No_Tratamiento</label>
                            <div class="col-sm-8">
                                <input type="" name="historial" id="" class="form-control" value="{{buscahisto($histo->id)}}">
                            </div>
                        </div>  --}}
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label  text-right">Cod. Tratamiento</label>
                            <div class="col-sm-8">
                                <select name="historial" id="historial" class="form-control">
                                    @foreach($historials as $historial)
                                        <option value="{{ $historial->id }}">{{ $historial->id }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label  text-right">Tratamiento</label>
                            <div class="col-sm-8">
                                <input type="text" name="" id="" class="form-control" value="{{$historial->tratamiento->nombre}}">
                            
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
                                <input type="number" name="numero_sesion" id="numero_sesion" class="form-control" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label  text-right">Medicamento suministrado</label>
                            <div class="col-sm-8">
                                <input type="text" name="medicamento" id="medicamento" class="form-control" value="">
                            </div>
                        </div>
                        {{--  <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label  text-right">Estado</label>
                            <div class="col-sm-8">
                                <input type="text" name="medicamento" id="medicamento" class="form-control" value="">
                            </div>
                        </div>  --}}
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label  text-right">Estado del Tratamiento:</label>
                            <div class="btn-group btn-group-toggle col-sm-4" data-toggle="buttons">
                                <label class="btn btn-warning {{ $historial->estado === '1' ? 'active' : '' }}">
                                    <input class="form-check-input" type="radio" name="estado" id="estado-concluido" value="1" autocomplete="off" {{ $historial->estado === 'concluido' ? 'checked' : '' }}> Concluido
                                </label>
                                <label class="btn btn-warning {{ $historial->estado === '0' ? 'active' : '' }}">
                                    <input class="form-check-input" type="radio" name="estado" id="estado-sin-concluir" value="0" autocomplete="off" {{ $historial->estado === 'sin-concluir' ? 'checked' : '' }}> Sin Concluir
                                </label>
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