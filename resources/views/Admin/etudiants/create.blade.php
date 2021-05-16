@extends('Admin.layouts.template')

@section('titre')
    Ajouter des etudiants
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
                <h3 class="card-title">Ajouter <small>un nouveau etudiant</small></h3>
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
              <form id="quickForm" method="post" action="{{route('etudiant.store')}}">
              @csrf
                <div class="card-body text-capitalize">
                
                <div class="row">
                <div class="form-group col">
                    <label for="nom">nom</label>
                    <input type="text" name="nom" class="form-control" id="nom" placeholder="Entrer le nom">
                  </div>
                  <div class="form-group col">
                    <label for="prenom">prenom</label>
                    <input type="text" name="prenom" class="form-control" id="prenom" placeholder="Entrer le prenom">
                  </div>
                </div>
                <div class="row">
                <div class="form-group col">
                    <label for="tel">télephone</label>
                    <input type="tel" name="tel" class="form-control" id="tel" placeholder="Entrer le numero de teléphone">
                  </div>
                  <div class="form-group col">
                    <label for="numGroupe">Groupe</label>
                    <input type="number" name="numGroupe" class="form-control" id="numGroupe" min = "1" start ="1" placeholder="Entrer le numero de groupe">
                  </div>
                </div>
                <div class="row">
                <div class="form-group col">
                    <label for="adresse">adresse</label>
                    <input type="text" name="adresse" class="form-control" id="adresse" placeholder="Entrer l'Adresse">
                  </div>

                  <div class="form-group col">
                    <label for="email">email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Entrer l'email">
                  </div>
                </div>
                <div class="row">
                <div class="form-group col-12">
                    <label for="Diplome">Diplome</label>
                    <select id="Diplome" class="form-control" name="codeDip">
                    <option value="{{null}}" selected >Choisir un diplome</option>
                      @foreach($diplomes as $diplome)
                        <option value="{{$diplome->id}}">{{$diplome->nom}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="row " >
                <div class="form-group col">
                    <label for="login">login</label>
                    <input type="text" name="login" class="form-control" id="login" placeholder="Entrer le login">
                  </div>

                  <div class="form-group col">
                    <label for="mdp">Mot de passe</label>
                    <input type="password" name="mdp" class="form-control" id="mdp" placeholder="Entrer le mot de passe">
                  </div>
                </div>
                  
             
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <a href="{{route('etudiant.index')}}"><button type="button" class="btn btn-secondary">Annuler</button></a>
                  <button type="submit" class="btn btn-primary">Ajouter</button>
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