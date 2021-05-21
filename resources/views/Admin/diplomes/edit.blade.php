@extends('Admin.layouts.template')

@section('titre')
    Modifier des diplomes
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
                <h3 class="card-title">Voulez vous modifier <small>{{$diplome->nom}}</small> ?</h3>
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
              <form id="quickForm" method="post" action="{{route('diplome.update',$diplome->id)}}">
              @csrf
              @method('PUT')
                <div class="card-body text-capitalize">
                <div class="form-group">
                    <label for="nom">nom<span class="text-danger">*</span></label>
                    <input type="text" name="nom" class="form-control" id="nom" placeholder="nom" value="{{$diplome->nom}}">
                  </div>
                  <div class="form-group">
                    <label for="prenom">description</label>
                    <textarea name="desc" class="form-control" id="desc">{{$diplome->desc}}</textarea>
                  </div>
                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                <a href="{{route('diplome.index')}}"><button type="button" class="btn btn-secondary">Annuler</button></a>
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