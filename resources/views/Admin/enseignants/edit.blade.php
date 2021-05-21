@extends('Admin.layouts.template')

@section('titre')
    Modifier des enseignants
@endsection
@section('titrepage')
    enseignants
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
        <!-- jquery validation -->
            <div class="card-primary">
              <div class="card-header">
                <h3 class="card-title">Voulez vous modifier <small>{{$enseignant->nom .' ' . $enseignant->prenom}}</small> ?</h3>
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
              <form id="quickForm" method="post" action="{{route('enseignant.update',$enseignant->id)}}">
              @csrf
              @method('PUT')
                <div class="card-body text-capitalize">
                  <div class="row">
                    <div class="form-group col">
                      <label for="nom">nom<span class="text-danger">*</span></label>
                      <input type="text" name="nom" class="form-control" id="nom"  value="{{$enseignant->nom}}">
                    </div>
                    <div class="form-group col">
                      <label for="prenom">prenom<span class="text-danger">*</span></label>
                      <input type="text" name="prenom" class="form-control" id="prenom"  value="{{$enseignant->prenom}}">
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="form-group col">
                      <label for="tel">télephone</label>
                      <input type="tel" name="tel" class="form-control" id="tel"  value="{{$enseignant->tel}}">
                    </div>
                    <div class="form-group col">
                    <label for="grade">grade<span class="text-danger">*</span></label>
                    <select id="grade" class="form-control" name="grade">
                    @if($enseignant->grade === "Contractuel")
                        <option value="Contractuel" selected>Contractuel</option>
                        <option value="MCF">MCF</option>
                        <option value="PR">PR</option>
                    @elseif($enseignant->grade === "MCF")
                    <option value="Contractuel">Contractuel</option>
                        <option value="MCF" selected>MCF</option>
                        <option value="PR">PR</option>
                    @else 
                        <option value="Contractuel">Contractuel</option>
                        <option value="MCF">MCF</option>
                        <option value="PR" selected>PR</option>
                    @endif
                    </select>
                  </div>
                  </div>
                  <div class="row">
                    <div class="form-group col">
                      <label for="numBureau">numero Bureau<span class="text-danger">*</span></label>
                      <input type="text" name="numBureau" class="form-control" id="numBureau" value="{{$enseignant->numBureau}}">
                    </div>

                    <div class="form-group col">
                      <label for="email">email<span class="text-danger">*</span></label>
                      <input type="email" name="email" class="form-control" id="email"  value="{{$enseignant->email}}">
                    </div>
                  </div>
            
                  <div class="row">
                    <div class="form-group  col">
                      <label for="login">login<span class="text-danger">*</span></label>
                      <input type="text" name="login" class="form-control" id="login"  value="{{$enseignant->login}}">
                    </div>
                    <div class="form-group  col">
                      <label for="mdp">Password<span class="text-danger">*</span></label>
                      <input type="text" name="mdp" class="form-control" id="mdp"  value="">
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <a href="{{route('enseignant.index')}}"><button type="button" class="btn btn-secondary">Annuler</button></a>
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