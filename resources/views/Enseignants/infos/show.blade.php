@extends('Enseignants.layouts.template')

@section('titre')
    Profile
@endsection

@section('titrepage')
    Profile
@endsection

@section('contenu')
@if ($msg=Session::get('success'))
  <div class="alert alert-success">
    {{$msg}}
  </div>
@endif
<div class="row">
  <div class="card card-primary card-outline col m-4">
    <div class="card-body box-profile col">
      <div class="text-center">
        <img class="profile-user-img img-fluid img-circle"
            src="{{asset('../../dist/img/user4-128x128.jpg')}}"
            alt="User profile picture">
      </div>

      <h3 class="profile-username text-center">{{$enseignant->prenom}} {{$enseignant->nom}}</h3>

      <p class="text-muted text-center">{{$enseignant->grade}}</p>

      <ul class="list-group list-group-unbordered mb-3">
        <li class="list-group-item">
          <b>Email</b> <a class="float-right">{{$enseignant->email}}</a>
        </li>
        <li class="list-group-item">
          <b>Login</b> <a class="float-right">{{$enseignant->login}}</a>
        </li>
        <li class="list-group-item">
          <b>Telephone</b> <a class="float-right">
            @php if($enseignant->tel !== null ) echo $enseignant->tel; else echo 'Non défini'; @endphp
          </a>
        </li>
      </ul>

    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

  <!-- About Me Box -->
  <div class="card card-primary col m-4">
    <!--<div class="card-header">
      <h3 class="card-title">About Me</h3>
    </div>-->
    <!-- /.card-header -->
    <div class="card-body">
      <strong><i class="fas fa-book mr-1"></i> Grade</strong>

      <p class="text-muted">{{ $enseignant->grade }}</p>

      <hr>

      <strong><i class="fas fa-map-marker-alt mr-1"></i> Bureau</strong>

      <p class="text-muted">
        @php if($enseignant->numBureau !== null ) echo 'Bureau n° '.$enseignant->numBureau; else echo 'Non défini'; @endphp
      </p>

      <hr>

      <strong><i class="far fa-file-alt mr-1"></i> Resumé</strong>

      <p class="text-muted">
        Je suis {{$enseignant->prenom}} {{$enseignant->nom}}<br>Grade: {{$enseignant->grade}}
        Je suis toujours à la disposition de mes éléves. Le numero de mon bureau est {{$enseignant->numBureau}}.
        <br> Merci "E-Learning" pour nous fournir l'éducation en ligne !
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<div class="text-center">
  <a href="{{ route('enseignant.infos.edit', session('id')) }}" class="btn btn-lg btn-primary mb-4"><b>Modifier</b></a>
</div>

@endsection