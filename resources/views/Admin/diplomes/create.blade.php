@extends('Admin.layouts.template')

@section('titre')
    Ajouter des diplomes
@endsection
@section('titrepage')
    Diplomes
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <!-- jquery validation -->
            <div class="card-primary">
              <div class="card-header">
                <h3 class="card-title">Ajouter <small>un nouveau diplome</small></h3>
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
              <form id="quickForm" method="post" action="{{route('diplome.store')}}">
              @csrf
                <div class="card-body text-capitalize">
                
                  <div class="form-group">
                    <label for="nom">nom<span class="text-danger">*</span></label>
                    <input type="text" name="nom" class="form-control" id="nom" placeholder="Entre le nom">
                  </div>
            
                  
                  <div class="form-group">
                    <label for="desc">Description</label>
                    <textarea name="desc" class="form-control" id="desc"></textarea>
                  </div>
                  
                  {{-- <div class="form-group">
                    <label for="Categorie">Categorie</label>
                    <select id="Categorie" class="form-control" name="categorie_id">
                      @foreach($categories as $categorie)
                        <option value="{{$categorie->id}}">{{$categorie->nom}}</option>
                      @endforeach
                    </select>
                  </div> --}}
      
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                <a href="{{route('diplome.index')}}"><button type="button" class="btn btn-secondary">Annuler</button></a>
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