@extends('Admin.layouts.template')

@section('titre')
    Modifier des responsables
@endsection
@section('titrepage')
    Responsables
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
        <!-- jquery validation -->
            <div class="card-primary">
              <div class="card-header">
                <h3 class="card-title">Voulez vous modifier <small>les responsables</small> ?</h3>
              </div>
              <!-- /.card-header -->
              @if($errors->any())
              <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error )
                  <li>{{$error}}</li>            
                @endforeach
                </ul>
              </div>
              @endif
              <?php $msg = [$responsabletd->idEns,$responsabletd->idCours,$responsabletd->resp];
               $msgs = implode(",",$msg);
              ?>
              <!-- form start -->
              <form id="quickForm" method="post" action="{{route('responsabletd.update',$msgs)}}">
              @csrf
              @method('PUT')
                <div class="card-body text-capitalize">
                  
                    <div class="row">
                      <div class="form-group col-12">
                          <label for="idCours">Cours<span class="text-danger">*</span></label>
                          <select id="idCours" class="form-control" name="idCours">
                          <option value="{{null}}" selected >Choisir un Cours</option>
                          @foreach($coursdip as $cour)
                          @php
                            $selected = "";
                          @endphp
                          @if ($cour->id == $responsabletd->idCours )
                            @php
                              $selected = "selected";
                            @endphp  
                            
                          @endif
                          <option {{$selected}} value="{{$cour->id}}">{{$cour->nom}}</option>
                        @endforeach
                          </select>
                      </div>
                    </div>

                    <div class="row">
                    <div class="form-group col">
                        <label for="idEns">Enseignant<span class="text-danger">*</span></label>
                        <select id="idEns" class="form-control" name="idEns">
                            <option value="{{null}}" selected >Choisir un Enseignant</option>
                            @foreach($enseignants as $enseignant)
                          @php
                            $selected = "";
                          @endphp
                          @if ($enseignant->id == $responsabletd->idEns )
                            @php
                              $selected = "selected";
                            @endphp  
                            
                          @endif
                          <option {{$selected}} value="{{$enseignant->id}}">{{$enseignant->id .'. ' .$enseignant->nom .' ' .$enseignant->prenom}}</option>
                        @endforeach
                        </select>
                      </div>
                        <div class="form-group col">
                            <label for="Groupe">Responsable<span class="text-danger">*</span></label>
                            <select id="Groupe" class="form-control" name="resp">
                            <option value="{{null}}" selected >Choisir un TD</option>
                            @foreach($groupesdip as $groupe)
                          @php
                            $selected = "";
                          @endphp
                          @if ($groupe->id == $responsabletd->resp )
                            @php
                              $selected = "selected";
                            @endphp  
                            
                          @endif
                          <option {{$selected}} value="{{$groupe->id}}">{{'TD ' . $groupe->id}}</option>
                        @endforeach
                            </select>
                        </div>
                    </div>
                
                <!-- /.card-body -->
                <div class="card-footer">
                  <a href="{{route('responsabletd.index')}}"><button type="button" class="btn btn-secondary">Annuler</button></a>
                  <button type="submit" class="btn btn-primary">Modifier</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
        </div>          
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->

@endsection