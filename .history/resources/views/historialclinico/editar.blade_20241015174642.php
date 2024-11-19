<!-- Modal Editar-->
<div class="modal fade" id="modalEditar{{$histo->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-primary py-2 px-4" id="exampleModalLabel"><i class="fa-solid fa-user-doctor"></i> NUEVA HISTORIA</h1>
        <button type=" button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body mx-4">
        <form action="{{ route('historialclinico.update', $histo->id) }}" method="POST">
          @csrf
          {{ method_field('PATCH') }}

          <div class="container py-3 px-7">
            <div class="row">
              <div class="col-md-6">
                  <div class="form-group row">
                      <label for="patient_name" class="col-sm-2 col-form-label">Distrito:</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" id="patient_name" name="patient_name" value="Av. Señor de Lagunas No. 1243 El Alto - La Paz" readonly>
                      </div>
                  </div>
              </div>
              <div class="col-md-3">
                  <div class="form-group row">
                      <label  for="fecha_actual" class="col-sm-3 col-form-label">Fecha:</label>
                      <div class="col-sm-8">
                          <input type="date" id="fecha_actual" name="fecha_actual" value="{{ \Carbon\Carbon::now()->toDateString() }}" readonly>
                      </div>
                  </div>
              </div>
              <div class="col-md-3">
                  <div class="form-group row">
                      <label for="gender" class="col-sm-3 col-form-label">No_HC:</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="no_hc" name="no_hc" value="{{ $histo->no_hc }}" readonly>
                          
                      </div>
                  </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="paciente_id" class="col-sm-3 col-form-label  text-right">Paciente</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="paciente_id" name="paciente_id" value="{{ $histo->paciente->nombre }} {{ $histo->paciente->paterno }} {{ $histo->paciente->materno }}" readonly>
                {{--  <select name="paciente_id" id="paciente_id" class="form-control">
                  @foreach($pacientes as $paciente)
                    <option value="{{ $paciente->id }}">{{ $paciente->nombre }} {{ $paciente->paterno }} {{ $paciente->materno }}</option>
                    {{--  <option value="{{ $key}}" {{$histo->paciente_id == $key ? 'selected': ''}}>{{ $value }}</option>  --}}
                  {{--  @endforeach  --}}
                {{--  </select>  --}}  
              </div>
            </div>
            <div class="form-group row">
              <h3 class="fs-5 text-primary text-center mt-2">Datos Complementarios</h3>
            </div>

            <div class="form-group row border border-secondary-subtle rounded">
              <div class="col-md-7 mt-3">
                <div class="form-group row">
                    <label for="patient_name" class="col-sm-4 col-form-label">Apoderado:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="apoderado" name="apoderado" value="{{$histo->apoderado}}">
                    </div>
                </div>
              </div>
              <div class="col-md-5 mt-3">
                  <div class="form-group row">
                      <label for="age" class="col-sm-3 col-form-label">Parentesco:</label>
                      <div class="col-sm-7">
                          <input type="text" class="form-control" id="age" name="parentesco"  value="{{$histo->parentesco}}">
                      </div>
                  </div>
              </div>
              <div class="col-md-7">
                <div class="form-group row">
                    <label for="patient_name" class="col-sm-3 col-form-label">Direccion:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="" name="direccion"  value="{{$histo->direccion}}">
                    </div>
                </div>
              </div>
              <div class="col-md-5">
                  <div class="form-group row">
                      <label for="age" class="col-sm-3 col-form-label">Tel/celular:</label>
                      <div class="col-sm-7">
                          <input type="text" class="form-control" id="" name="celular" value="{{$histo->celular}}">
                      </div>
                  </div>
              </div>
            </div>
            

            <div class="form-group row mt-2">
              <h3 class="fs-5 text-primary text-center">Anamnesis</h3>
            </div>
            <div class="form-group row border border-secondary-subtle rounded">
              <div class="row">
                <div class="col-md-10 mt-3">
                  <div class="form-group row">
                      <label for="patient_name" class="col-sm-3 col-form-label">Motivo de la consulta:</label>
                      <div class="col-sm-8">
                          <input type="text" class="form-control" id="" name="motivo" value="{{$histo->motivo}}">
                      </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="patient_name">Enf. Activas</label>
                        <input type="text" class="form-control" id="" name="enf_act" value="{{$histo->enf_act}}">
                        
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="age">Alergias</label>
                        <input type="text" class="form-control" id="" name="alergias" value="{{$histo->alergias}}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="gender">Medicamentos</label>
                        <input type="text" class="form-control" id="" name="medicamentos" value="{{$histo->medicamentos}}">
                    </div>
                </div>  
              </div>
              <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="patient_name">Hab. Alimenticios:</label>
                        <input type="text" class="form-control" id="" name="hab_alimen" value="{{$histo->hab_alimen}}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="age">Hab. Higiene:</label>
                        <input type="text" class="form-control" id="" name="hab_higiene" value="{{$histo->hab_higiene}}">
                    </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                      <label for="age">Consumo tabaco:</label>
                      <input type="text" class="form-control" id="" name="tabaco" value="{{$histo->tabaco}}">
                  </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="gender">Otros:</label>
                        <input type="text" class="form-control" id="" name="otro" value="{{$histo->otro}}">
                    </div>
                </div>  
              </div>
            </div>
            
            <div class="form-group row mt-2">
              <h3 class="fs-5 text-primary text-center">Antecedentes Patologicos</h3>
            </div>
            <div class="form-group row border border-secondary-subtle rounded">
              <div class="row mt-2">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="patient_name">Cardiovasculares:</label>
                        <select class="form-control" id="gender" name="cardiovas" value="{{$histo->cardiovas}}">
                          <option value="ninguno">ninguno</option>
                          <option value="Insuficiencia Cardiaca">Insuficiencia Cardiaca</option>
                          <option value="Arritmias">Arritmias</option>
                          <option value="Endocarditis">Endocarditis</option>
                          <option value="Hiper. Arterial">Hiper. Arterial</option>
                          <option value="Insuf. Arterial">Insuf. Arterial</option>
                          <option value="Aneurismas">Aneurismas</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="age">Pulmonares:</label>
                        <select class="form-control" id="gender" name="pulmonares" value="$histo->pulmonares">
                          <<option value="ninguno" @selected("ninguno"==$histo->pulmonares)>ninguno</option>
                          <option value="Insuf. Respiratoria" @selected("Insuf. Respiratoria"==$histo->pulmonares)>Insuf. Respiratoria</option>
                          <option value="Bronquitis" @selected("Bronquitis"==$histo->pulmonares)>Bronquitis</option>
                          <option value="Asma" @selected("Asma"==$histo->pulmonares)>Asma</option>
                          <option value="Neumonias" @selected("Neumonias"==$histo->pulmonares)>Neumonias</option>
                          <option value="Amigdalitis" @selected("Amigdalitis"==$histo->pulmonares)>Amigdalitis</option>
                          <option value="Sinusitis" @selected("Sinusitis"==$histo->pulmonares)>Sinusitis</option>
                          <option value="Otitis" @selected("Otitis"==$histo->pulmonares)>Otitis</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                      <label for="age">Renales:</label>
                      <select class="form-control" id="gender" name="renales">
                        <option value="ninguno">ninguno</option>
                        <option value="Insuf. Renal">Insuf. Renal</option>
                        <option value="Glomerulonefritis">Glomerulonefritis</option>
                        <option value="Litiasis">Litiasis</option>
                        <option value="Pielonefritis">Pielonefritis</option>
                        <option value="Nefropatías">Nefropatías</option>
                      </select>
                  </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="gender">Gastrointestinales:</label>
                        <select class="form-control" id="gender" name="gastrointes">
                          <option value="ninguno">ninguno</option>
                          <option value="Enf. Acido-peptica">Enf. Acido-peptica</option>
                          <option value="Gastritis">Gastritis</option>
                          <option value="Obstruccion">Obstruccion</option>
                          <option value="Apendicitis">Apendicitis</option>
                          <option value="Hernias">Hernias</option>
                          <option value="Hemorroides">Hemorroides</option>
                          <option value="Hernias">Hernias</option>
                          <option value="Hepatitis">Hepatitis</option>
                          <option value="Cirrosis">Cirrosis</option>
                        </select>
                    </div>
                </div>  
              </div>
              <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="patient_name">Endocrinas:</label>
                        <select class="form-control" id="gender" name="endocrinas">
                          <option value="ninguno">ninguno</option>
                          <option value="Diabetes Mellitus">Diabetes Mellitus</option>
                          <option value="Adrenalopatias">Adrenalopatias</option>
                          <option value="Pancreatitis">Pancreatitis</option>
                          <option value="Trans. creciiento">Trans. creciiento</option>
                        </select>
                      </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="age">Osteoarticulares:</label>
                        <select class="form-control" id="gender" name="osteoarticu">
                          <option value="ninguno">ninguno</option>
                          <option value="Degeneracion osea">Degeneracion osea</option>
                          <option value="Artritis remautoide">Artritis remautoide</option>
                          <option value="Espondilitis">Espondilitis</option>
                          <option value="Gota">Gota</option>
                          <option value="Lupus">Lupus</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                      <label for="age">Metabolicas:</label>
                      <select class="form-control" id="gender" name="metabolicas">
                        <option value="ninguno">ninguno</option>
                        <option value="Glucogenolisis">Glucogenolisis</option>
                        <option value="Esfingolipidosis">Esfingolipidosis</option>
                        <option value="Mucopolisacaridosis">Mucopolisacaridosis</option>
                        <option value="Obesidad">Obesidad</option>
                      </select>
                  </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="gender">Infeccionsas:</label>
                        <select class="form-control" id="gender" name="infecciosas">
                          <option value="ninguno">ninguno</option>
                          <option value="Tuberculosis">Tuberculosis</option>
                          <option value="Tifoidea">Tifoidea</option>
                          <option value="Brucelosis">Brucelosis</option>
                          <option value="Venereas">Venereas</option>
                          <option value="Micosis">Micosis</option>
                        </select>
                    </div>
                </div>  
              </div>
              <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="patient_name">Antecedentes Intervenciones previas:</label>
                        <input type="text" class="form-control" id="" name="interv_prev" value="{{$histo->interv_prev}}">
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-8">
                <div class="form-group row">
                    <label for="patient_name" class="col-sm-2 col-form-label">Nota:</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" placeholder="" id="floatingTextarea" name="notas" values="{{$histo->notas}}"></textarea>
                    </div>
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-8">
                <div class="form-group row">
                    <label for="patient_name" class="col-sm-4 col-form-label">Doctor a cargo:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="patient_name" name="" value="Dr. Moises Choquevillca Chambilla"  readonly>
                    </div>
                </div>
            </div>
          </div>
      
          <div class="modal-footer" py2>
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-regular fa-circle-xmark"></i>
          Cancelar</button>
          </div>
        </form>
      
      </div>
    </div>
  </div>
</div>
