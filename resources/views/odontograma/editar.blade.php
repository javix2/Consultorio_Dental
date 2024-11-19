<!-- Modal Editar-->
<div class="modal fade" id="modalEditar{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-primary py-2 px-4" id="exampleModalLabel"><i
                        class="fa-solid fa-file-pen"></i>
                    EDITAR ODONTOGRAMA</h1>
                <button type=" button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route("odontograma.update", $item->id)}}" method="POST">
                    @csrf
                    {{ method_field('PATCH') }}

                    <div class="container py-1 ">
                        <div class="form-group row w-75 d-flex justify-content-center mx-5">
                            <img src="{{URL::asset('/img/odontograma.jpg')}}" class="img-thumbnail" alt="..." width="90">
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label  text-right">Numero diente</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="inputAddress" name="txtnumerodiente" value="{{$item->numero_diente}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-4 col-form-label  text-right">Estado</label>
                            <div class="form-floating col-sm-6">
                                <textarea class="form-control" placeholder="" id="floatingTextarea"
                                    name="txtestado" value="">{{$item->estado}}</textarea>
                            </div>
                        </div>

                        {{--  <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label  text-right">Precio</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="inputAddress" name="txtprecio">
                            </div>
                        </div>  --}}

                        
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label  text-right">Paciente</label>
                            <div class="col-sm-6">
                                <select id="inputState" class="form-select fst-italic" name="txtpaciente" value="{{$item->patient_id}}">
                                <option selected>seleccione</option>

                                @foreach($pacientes as $pac)
                                    <option value="{{ $pac->id }}">{{ $pac->nombre }} {{ $pac->paterno }} {{ $pac->materno }}</option>
                                    
                                @endforeach
                                
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-check"></i> Guardar</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-regular fa-circle-xmark"></i> Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>