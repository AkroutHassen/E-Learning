@extends('Admin.layouts.template')

@section('titre')
    Modifier des etudiants
@endsection
@section('titrepage')
    Etudiants
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
        <!-- jquery validation -->
            <div class="card-primary">
              <div class="card-header">
                <h3 class="card-title">Voulez vous modifier <small>{{$etudiant->nom .' ' . $etudiant->prenom}}</small> ?</h3>
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
              <!-- form start -->
              <form id="quickForm" method="post" action="{{route('etudiant.update',$etudiant->id)}}">
              @csrf
              @method('PUT')
                <div class="card-body text-capitalize">
                  <div class="row">
                    <div class="form-group col">
                      <label for="nom">nom<span class="text-danger">*</span></label>
                      <input type="text" name="nom" class="form-control" id="nom"  value="{{$etudiant->nom}}">
                    </div>
                    <div class="form-group col">
                      <label for="prenom">prenom<span class="text-danger">*</span></label>
                      <input type="text" name="prenom" class="form-control" id="prenom"  value="{{$etudiant->prenom}}">
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="form-group col">
                      <label for="tel">télephone</label>
                      <input type="tel" name="tel" class="form-control" id="tel"  value="{{$etudiant->tel}}">
                    </div>
                     @php
                        $disabled="disabled";
                      @endphp
                    @if($etuCodeDip->codeDip !== null)
                    @php
                        $disabled="";
                    @endphp
                    @endif
                    <div class="form-group col">
                      <label for="numGroupe">Groupe</label>
                      <select id="numGroupe" class="form-control" name="numGroupe" {{$disabled}}>
                      <option  value="{{null}}">Choisir un Groupe</option>
                        @foreach($groupes as $groupe)
                          @php
                            $selected = "";
                          @endphp
                          @if ($groupe->id == $etudiant->numGroupe )
                            @php
                              $selected = "selected";
                            @endphp  
                            
                          @endif
                          <option {{$selected}} value="{{$groupe->id}}">{{'TD ' . $groupe->id}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col">
                      <label for="adresse">adresse</label>
                      <input type="text" name="adresse" class="form-control" id="adresse" value="{{$etudiant->adresse}}">
                    </div>

                    <div class="form-group col">
                      <label for="email">email<span class="text-danger">*</span></label>
                      <input type="email" name="email" class="form-control" id="email"  value="{{$etudiant->email}}">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-12">
                      <label for="Diplome">Diplome</label>
                      <select id="Diplome" class="form-control" name="codeDip">
                      <option  value="{{null}}">Choisir un diplome</option>
                        @foreach($diplomes as $diplome)
                          @php
                            $selected = "";
                          @endphp
                          @if ($diplome->id == $etudiant->codeDip )
                            @php
                              $selected = "selected";
                            @endphp  
                            
                          @endif
                          <option {{$selected}} value="{{$diplome->id}}">{{$diplome->nom}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group  col">
                      <label for="login">login<span class="text-danger">*</span></label>
                      <input type="text" name="login" class="form-control" id="login"  value="{{$etudiant->login}}">
                    </div>
                    <div class="form-group  col">
                      <label for="mdp">Password<span class="text-danger">*</span></label>
                      <input type="text" name="mdp" class="form-control" id="mdp"  value="">
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <a href="{{route('etudiant.index')}}"><button type="button" class="btn btn-secondary">Annuler</button></a>
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