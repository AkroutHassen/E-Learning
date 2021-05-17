@extends('Admin.layouts.template')

@section('titre')
    Ajouter des groupes
@endsection
@section('titrepage')
    groupes
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <!-- jquery validation -->
            <div class="card-primary">
              <div class="card-header">
                <h3 class="card-title">Ajouter <small>un nouveau groupe</small></h3>
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
              <form id="quickForm" method="post" action="{{route('groupe.store')}}">
              @csrf
                <div class="card-body text-capitalize">
                
                <div class="row">
                    <div class="form-group col">
                        <label for="Diplome">Diplome</label>
                        <select id="Diplome" class="form-control" name="codeDip">
                        <option value="{{null}}" selected >Choisir un diplome</option>
                        @foreach($diplomes as $diplome)
                            <option value="{{$diplome->id}}">{{$diplome->nom}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group col">
                        <label for="groupe">Numéro groupe</label>
                        <input type = "number" name="id" id="groupe" class="form-control" placeholder="Entrer le numéro de groupe">
                    </div>
                </div>
  
             
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <a href="{{route('groupe.index')}}"><button type="button" class="btn btn-secondary">Annuler</button></a>
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