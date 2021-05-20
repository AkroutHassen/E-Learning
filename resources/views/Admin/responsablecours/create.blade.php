@extends('Admin.layouts.template')

@section('titre')
    Ajouter les responsables des Cours
@endsection
@section('titrepage')
    Responsables des Cours
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
              <form id="quickForm" method="post" action="{{route('responsablecours.store')}}">
              @csrf
                <div class="card-body text-capitalize">
                <div class="row">
                <div class="form-group col">
                    <label for="idEns">Enseignant<span class="text-danger">*</span></label>
                    <select id="idEns" class="form-control" name="idEns">
                        <option value="{{null}}" selected >Choisir un Enseignant</option>
                        @foreach($enseignants as $enseignant)
                            <option value="{{$enseignant->id}}">{{$enseignant->id .'. ' .$enseignant->nom .' ' .$enseignant->prenom }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col">
                    <label for="idCours">Cours<span class="text-danger">*</span></label>
                    <select id="idCours" class="form-control" name="idCours">
                        <option value="{{null}}" selected >Choisir un Cours</option>
                        @foreach($coursdip as $cour)
                            <option value="{{$cour->id}}">{{$cour->nom}}</option>
                        @endforeach
                    </select>
                    
                </div>
                {{-- <div class="form-group col">
                    <label for="responsable">responsable</label>
                    <input type = "text" id="responsable" class="form-control" name="resp" value="cours" disabled>
                    
                </div> --}}
            </div>
 
                  
             
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <a href="{{route('responsablecours.created')}}"><button type="button" class="btn btn-secondary">Annuler</button></a>
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