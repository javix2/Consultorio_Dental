<!-- Modal Crear-->
<div class="modal fade" id="modalCrear" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-primary py-2 px-4" id="exampleModalLabel"><i class="fa-regular fa-calendar-plus"></i> NUEVA CITA</h1>
                <button type=" button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="{{route('cita.store')}}" method="POST">
                    @csrf
                    <div class="container py-3 px-0">
                        
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label  text-right">Paciente</label>
                            <div class="col-sm-8">
                                <select id="inputState" class="form-select fst-italic"  name="paciente_id" >
                                    <option selected>seleccione...</option>

                                    @foreach($pacientes as $paciente)
                                        <option value="{{ $paciente->id }}">{{ $paciente->nombre }} {{ $paciente->paterno }} {{ $paciente->materno }}</option>
                                        
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label  text-right">Fecha</label>
                            <div class="col-sm-3">
                                <input id="" type="date" width="300" name="fecha">
                            </div>
                            <label for="" class="col-sm-2 col-form-label  text-right">Hora inicial</label>
                            <div class="col-sm-3">
                                <input id="" type="time" width="300" name="hora">
                            </div>
                                
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-8 col-form-label  text-right">Tiempo (min)</label>
                            <div class="col-sm-3">
                                <input id="" type="number" width="" name="minutos">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label  text-right">Motivo</label>
                            <div class="form-floating col-sm-8">
                                <textarea class="form-control" placeholder=""
                                    id="floatingTextarea" name="motivo"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label  text-right">Tratamiento</label>
                            <div class="col-sm-8">
                                <select id="inputState" class="form-select fst-italic"  name="tratamiento_id" >
                                    <option selected>seleccione...</option>

                                    @foreach($tratamientos as $tratamiento)
                                        <option value="{{ $tratamiento->id }}">{{ $tratamiento->nombre }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label  text-right">Doctor</label>
                            <div class="col-sm-8">
                                <select id="inputState" class="form-select fst-italic"  name="doctor_id" >
                                    <option selected>seleccione...</option>

                                    @foreach($doctors as $doctor)
                                        <option value="{{ $doctor->id }}">{{ $doctor->nombre }} {{ $doctor->paterno }} {{ $doctor->materno }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa-regular fa-floppy-disk"></i> Guardar</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i> Cancelar</button>
                    </div>
                </form>
            </div>            
        </div>
    </div>
</div>