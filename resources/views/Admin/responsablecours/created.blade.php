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
                <h3 class="card-title">Ajouter <small>un nouveau responsable de Cours</small></h3>
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
              <form id="quickForm" method="post" action="{{route('responsablecours.stored')}}">
              @csrf
                <div class="card-body text-capitalize">
                
                <div class="row">
                    <div class="form-group col-12">
                        <label for="Diplome">Diplome<span class="text-danger">*</span></label>
                        <select id="Diplome" class="form-control" name="codeDip">
                        <option value="{{null}}" selected >Choisir un diplome</option>
                        @foreach($diplomes as $diplome)
                            <option value="{{$diplome->id}}">{{$diplome->nom}}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
  
             
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <a href="{{route('responsablecours.index')}}"><button type="button" class="btn btn-secondary">Annuler</button></a>
                  <button type="submit" class="btn btn-primary">Suivant</button>
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