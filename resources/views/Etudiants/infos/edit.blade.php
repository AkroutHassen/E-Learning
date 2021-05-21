@extends('Etudiants.layouts.template')

@section('titre')
    Profile
@endsection

@section('titrepage')
    Profile
@endsection

@section('contenu')
<form action="{{ route('etudiant.infos.update', session('id')) }}" method="POST">
@csrf
@method('PUT')
<div class="row">
  <div class="card card-primary card-outline col m-3">
    <div class="card-body box-profile col">
      <div class="text-center">
        <img class="profile-user-img img-fluid img-circle"
            src="{{asset('../../dist/img/avatar5.png')}}"
            alt="User profile picture">
      </div>

      <h3 class="profile-username text-center">{{$etudiant->prenom}} {{$etudiant->nom}}</h3>

      <p class="text-muted text-center">@php if($etudiant->codeDip !== null ) echo $etudiant->diplome->nom; @endphp</p>

      <ul class="list-group list-group-unbordered mb-3">
        <li class="list-group-item">
          <b>Email</b> <a class="float-right">{{$etudiant->email}}</a>
        </li>
        <li class="list-group-item">
          <b>Login</b> <a class="float-right">{{$etudiant->login}}</a>
        </li>
        <li class="list-group-item">
          <b>Telephone</b> <a class="float-right">
            <input type="text" name="tel" id="tel" class="form-control" value="{{$etudiant->tel}}">
          </a>
        </li>
      </ul>

    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

  <!-- About Me Box -->
  <div class="card card-primary col m-3">
    <!--<div class="card-header">
      <h3 class="card-title">About Me</h3>
    </div>-->
    <!-- /.card-header -->
    <div class="card-body">
      <strong><i class="fas fa-book mr-1"></i> Diplome</strong>

      <p class="text-muted">
        @php if($etudiant->codeDip !== null ) echo $etudiant->diplome->nom; else echo 'Non inscri'; @endphp
      </p>

      <hr>

      <strong><i class="fas fa-map-marker-alt mr-1"></i> Adresse</strong>

      <p class="text-muted">
        <input type="text" name="adresse" id="adresse" class="form-control" value="{{$etudiant->adresse}}">
      </p>

      <hr>

      <strong><i class="fas fa-pencil-alt mr-1"></i> Classe</strong>

      <p class="text-muted">TD {{$etudiant->numGroupe}}</p>

      <hr>

      <strong><i class="far fa-file-alt mr-1"></i> Resumé</strong>

      <p class="text-muted">
        Je suis {{$etudiant->prenom}} {{$etudiant->nom}} @php if($etudiant->codeDip !== null ) echo 'J\'étudie dans le parcours du diplome de '.$etudiant->diplome->nom.'.'; @endphp
        J'assiste à mes cours avec la classe TD {{$etudiant->numGroupe}}.
        <br> Merci "E-Learning" pour nous fournir l'éducation en ligne !
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<div class="text-center">
  <input class="btn btn-lg btn-primary" type="submit" value="Confirmer les changements">
</div>
</form>
@endsection