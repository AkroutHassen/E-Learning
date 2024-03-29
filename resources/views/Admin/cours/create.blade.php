@extends('Admin.layouts.template')

@section('titre')
    Ajouter des cours
@endsection
@section('titrepage')
    Cours
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <!-- jquery validation -->
            <div class="card-primary">
              <div class="card-header">
                <h3 class="card-title">Ajouter <small>un nouveau cours</small></h3>
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
              <form id="quickForm" method="post" action="{{route('cours.store')}}">
              @csrf
                <div class="card-body text-capitalize">
                
                <div class="row">
                    <div class="form-group col">
                        <label for="Diplome">Diplome<span class="text-danger">*</span></label>
                        <select id="Diplome" class="form-control" name="codeDip">
                        <option value="{{null}}" selected >Choisir un diplome</option>
                        @foreach($diplomes as $diplome)
                            <option value="{{$diplome->id}}">{{$diplome->nom}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group col">
                        <label for="nom">nom<span class="text-danger">*</span></label>
                        <input type="text" name="nom" class="form-control" id="nom" placeholder="Entrer le nom">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col">
                        <label for="coefDip">coefficient dans le diplome<span class="text-danger">*</span></label>
                        <input type="number" step="0.1" name="coefDip" class="form-control" id="coefDip" placeholder="Entrer le coefficient dans le diplome">
                    </div>
                    <div class="form-group col">
                        <label for="coefExam">coefficient dans l'examen<span class="text-danger">*</span></label>
                        <input type="number" step="0.1" name="coefExam" class="form-control" id="coefExam" placeholder="Entrer le coefficient dans l'examen">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label for="coefTd">coefficient dans le TD<span class="text-danger">*</span></label>
                        <input type="number" step="0.1" name="coefTd" class="form-control" id="coefTd" placeholder="Entrer le coefficient dans le TD">
                    </div>

                    <div class="form-group col">
                        <label for="nbHeures">nombre des heures<span class="text-danger">*</span></label>
                        <input type="number" step="0.01" name="nbHeures" class="form-control" id="nbHeures" placeholder="nombre des heures">
                    </div>
                </div>  
                
                <div class="row">
                    <div class="form-group col-12">
                        <label for="desc">Description</label>
                        <textarea name="desc" class="form-control" id="desc"></textarea>
                    </div>
                </div>
             
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <a href="{{route('cours.index')}}"><button type="button" class="btn btn-secondary">Annuler</button></a>
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