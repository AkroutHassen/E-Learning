@extends('Admin.layouts.template')

@section('titre')
    Modifier des etudiants
@endsection
@section('titrepage')
    etudiants
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
        <!-- jquery validation -->
            <div class="card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example <small>jQuery Validation</small></h3>
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
                <div class="card-body">
                <div class="form-group">
                    <label for="nom">nom</label>
                    <input type="text" name="nom" class="form-control" id="nom" placeholder="nom" value="{{old('nom')}}" disabled>
                  </div>
                  <div class="form-group">
                    <label for="prenom">prenom</label>
                    <input type="text" name="prenom" class="form-control" id="prenom" placeholder="prenom" value="{{$etudiant->prenom}}" disabled>
                  </div>
                  <div class="form-group">
                    <label for="tel">télephone</label>
                    <input type="tel" name="tel" class="form-control" id="tel" placeholder="tel" value="{{$etudiant->tel}}">
                  </div>
                  <div class="form-group">
                    <label for="numGroupe">Groupe</label>
                    <input type="number" name="numGroupe" class="form-control" id="numGroupe" placeholder="Groupe" value="{{$etudiant->numGroupe}}">
                  </div>
                  <div class="form-group">
                    <label for="adresse">adresse</label>
                    <input type="text" name="adresse" class="form-control" id="adresse" placeholder="Votre Adresse" value="{{$etudiant->adresse}}">
                  </div>

                  <div class="form-group">
                    <label for="email">email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="e-mail" value="{{$etudiant->email}}">
                  </div>
                  <div class="form-group">
                    <label for="login">login</label>
                    <input type="text" name="login" class="form-control" id="login" placeholder="login" value="{{$etudiant->login}}">
                  </div>
                  <div class="form-group">
                    <label for="mdp">Password</label>
                    <input type="text" name="mdp" class="form-control" id="mdp" placeholder="Password" value="{{$etudiant->mdp}}">
                  </div>
                  {{-- <div>
                      @foreach($categories as $categorie)
                        @php
                          $selected = "";
                        @endphp
                        @if ($categorie->id == $etudiant->categorie_id)
                          @php
                            $selected = "selected";
                          @endphp  
                        @endif
                        <option {{$selected}} value="{{$categorie->id}}">{{$categorie->nom}}</option>
                      @endforeach
                    </select>
                  </div> --}}
      
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
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