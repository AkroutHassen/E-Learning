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
              <form id="quickForm" method="post" action="#">
              @csrf
              @method('PUT')
                <div class="card-body text-capitalize">
                  <div class="row">
                    <div class="form-group col">
                      <label for="nom">nom</label>
                      <input type="text" name="nom" class="form-control" id="nom"  value="{{$etudiant->nom}}" disabled>
                    </div>
                    <div class="form-group col">
                      <label for="prenom">prenom</label>
                      <input type="text" name="prenom" class="form-control" id="prenom"  value="{{$etudiant->prenom}}"  disabled>
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="form-group col">
                      <label for="tel">télephone</label>
                      <input type="tel" name="tel" class="form-control" id="tel"  value="{{$etudiant->tel}}"  disabled>
                    </div>
                    <div class="form-group col">
                      <label for="numGroupe">Groupe</label>
                      <input type="number" name="numGroupe" class="form-control" id="numGroupe"  value="{{$etudiant->numGroupe}}"  disabled>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col">
                      <label for="adresse">adresse</label>
                      <input type="text" name="adresse" class="form-control" id="adresse" value="{{$etudiant->adresse}}"  disabled>
                    </div>

                    <div class="form-group col">
                      <label for="email">email</label>
                      <input type="email" name="email" class="form-control" id="email"  value="{{$etudiant->email}}"  disabled>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-12">
                      <label for="Diplome">Diplome</label>
                      <select id="Diplome" class="form-control" name="codeDip"  disabled>
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
                      <label for="login">login</label>
                      <input type="text" name="login" class="form-control" id="login"  value="{{$etudiant->login}}"  disabled>
                    </div>
                    <div class="form-group  col">
                      <label for="mdp">Password</label>
                      <input type="text" name="mdp" class="form-control" id="mdp"  value="{{$etudiant->mdp}}"  disabled>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <a href="{{route('etudiant.index')}}"><button type="button" class="btn btn-secondary">Annuler</button></a>
                  <a href="{{route('etudiant.edit',$etudiant->id)}}"><button type="button" class="btn btn-primary">Modifier</button></a>
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