@extends('Admin.layouts.template')

@section('titre')
    Modifier des responsables
@endsection
@section('titrepage')
    responsables
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
        <!-- jquery validation -->
            <div class="card-primary">
              <div class="card-header">
                <h3 class="card-title">Voulez vous modifier <small>{{-- --}}</small> ?</h3>
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
              <?php $msg = [$responsablecour->idEns,$responsablecour->idCours,$responsablecour->resp];
               $msgs = implode(",",$msg);
              ?>
              <!-- form start -->
              <form id="quickForm" method="post" action="{{route('responsablecours.update',$msgs)}}">
              @csrf
              @method('PUT')
                <div class="card-body text-capitalize">
                  
                    <div class="row">
                      <div class="form-group col">
                          <label for="idCours">Cours</label>
                          <select id="idCours" class="form-control" name="idCours">
                          <option value="{{null}}" selected >Choisir un Cours</option>
                          @foreach($coursdip as $cour)
                          @php
                            $selected = "";
                          @endphp
                          @if ($cour->id == $responsablecour->idCours )
                            @php
                              $selected = "selected";
                            @endphp  
                            
                          @endif
                          <option {{$selected}} value="{{$cour->id}}">{{$cour->nom}}</option>
                        @endforeach
                          </select>
                      </div>
                    
                    <div class="form-group col">
                        <label for="idEns">Enseignant</label>
                        <select id="idEns" class="form-control" name="idEns">
                            <option value="{{null}}" selected >Choisir un Enseignant</option>
                            @foreach($enseignants as $enseignant)
                          @php
                            $selected = "";
                          @endphp
                          @if ($enseignant->id == $responsablecour->idEns )
                            @php
                              $selected = "selected";
                            @endphp  
                            
                          @endif
                          <option {{$selected}} value="{{$enseignant->id}}">{{$enseignant->nom .' ' .$enseignant->prenom}}</option>
                        @endforeach
                        </select>
                      </div>
                    </div>
                 </div>
                
                <!-- /.card-body -->
                <div class="card-footer">
                  <a href="{{route('responsablecours.index')}}"><button type="button" class="btn btn-secondary">Annuler</button></a>
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