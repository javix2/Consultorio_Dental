<!-- Modal Editar-->
<div class="modal fade" id="modalEditar{{$trat->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-primary py-2 px-4" id="exampleModalLabel"><i
                        class="fa-solid fa-file-pen"></i>
                    EDITAR TRATAMIENTO</h1>
                <button type=" button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form class="" action="{{ route("tratamiento.update", $trat->id) }}" method="POST">
                    @csrf 
                    {{ method_field('PATCH') }}
                    
                    <div class="container py-3 ">
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label  text-right">ID</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="" name="id" value="{{$trat->id}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label  text-right">Nombre
                                Tratamiento</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="inputAddress" name="nombre" value="{{$trat->nombre}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label  text-right">Precio</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="inputAddress" name="costo" value="{{$trat->costo}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label  text-right">Descripcion</label>

                            <div class="form-floating col-sm-6">
                                <textarea class="form-control" placeholder=""
                                    id="floatingTextarea" name="descripcion" value="">{{$trat->descripcion}}</textarea>    
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa-regular fa-circle-check"></i> Editar</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-regular fa-circle-xmark"></i> Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>