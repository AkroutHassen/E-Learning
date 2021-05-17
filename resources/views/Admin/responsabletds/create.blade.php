@extends('Admin.layouts.template')

@section('titre')
    Ajouter des responsabletds
@endsection
@section('titrepage')
    responsabletds
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <!-- jquery validation -->
            <div class="card-primary">
              <div class="card-header">
                <h3 class="card-title">Ajouter <small>un nouveau responsabletd</small></h3>
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
              <form id="quickForm" method="post" action="{{route('responsabletd.store')}}">
              @csrf
                <div class="card-body text-capitalize">
                
                <div class="row">
                    <div class="form-group col-12">
                        <label for="Diplome">Cours</label>
                        <select id="Diplome" class="form-control" name="codeDip">
                        <option value="{{null}}" selected >Choisir un Cours</option>
                        @foreach($coursdip as $cour)
                            <option value="{{$cour->id}}">{{$cour->nom}}</option>
                        @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                <div class="form-group col">
                    <label for="tel">Nom Enseignant</label>
                    <input type="text" name="tel" class="form-control" id="tel" placeholder="Entrer le numero de teléphone">
                  </div>
                  <div class="form-group col">
                    <label for="numGroupe">Prenom Enseignant</label>
                    <input type="text" name="numGroupe" class="form-control" id="numGroupe" min = "1" start ="1" placeholder="Entrer le numero de groupe">
                  </div>
                  <div class="form-group col">
                        <label for="Groupe">Responsable</label>
                        <select id="Groupe" class="form-control" name="resp">
                        <option value="{{null}}" selected >Choisir un TD</option>
                        @foreach($groupesdip as $groupe)
                            <option value="{{'td '.$groupe->id}}">{{'td ' . $groupe->id}}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
                
                
                
                  
             
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <a href="{{route('responsabletd.created')}}"><button type="button" class="btn btn-secondary">Annuler</button></a>
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