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
                <h3 class="card-title">Voulez vous modifier <small>{{$responsable->nom .' ' . $responsable->prenom}}</small> ?</h3>
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
              <form id="quickForm" method="post" action="{{route('responsable.update',$responsable->id)}}">
              @csrf
              @method('PUT')
                <div class="card-body text-capitalize">
                  <div class="row">
                    <div class="form-group col">
                      <label for="nom">nom</label>
                      <input type="text" name="nom" class="form-control" id="nom"  value="{{$responsable->nom}}">
                    </div>
                    <div class="form-group col">
                      <label for="prenom">prenom</label>
                      <input type="text" name="prenom" class="form-control" id="prenom"  value="{{$responsable->prenom}}">
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="form-group col">
                      <label for="tel">télephone</label>
                      <input type="tel" name="tel" class="form-control" id="tel"  value="{{$responsable->tel}}">
                    </div>
                    <div class="form-group col">
                      <label for="numGroupe">Groupe</label>
                      <input type="number" name="numGroupe" class="form-control" id="numGroupe"  value="{{$responsable->numGroupe}}">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col">
                      <label for="adresse">adresse</label>
                      <input type="text" name="adresse" class="form-control" id="adresse" value="{{$responsable->adresse}}">
                    </div>

                    <div class="form-group col">
                      <label for="email">email</label>
                      <input type="email" name="email" class="form-control" id="email"  value="{{$responsable->email}}">
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
                          @if ($diplome->id == $responsable->codeDip )
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
                      <input type="text" name="login" class="form-control" id="login"  value="{{$responsable->login}}">
                    </div>
                    <div class="form-group  col">
                      <label for="mdp">Password</label>
                      <input type="text" name="mdp" class="form-control" id="mdp"  value="{{$responsable->mdp}}">
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <a href="{{route('responsable.index')}}"><button type="button" class="btn btn-secondary">Annuler</button></a>
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