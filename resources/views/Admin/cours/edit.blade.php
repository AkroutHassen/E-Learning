@extends('Admin.layouts.template')

@section('titre')
    Modifier des cours
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
                <h3 class="card-title">Voulez vous modifier <small>{{$cour->nom .' ' . $cour->prenom}}</small> ?</h3>
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
              <form id="quickForm" method="post" action="{{route('cours.update',$cour->id)}}">
              @csrf
              @method('PUT')
                <div class="card-body text-capitalize">
                  <div class="row">
                    <div class="form-group col-12">
                      <label for="Diplome">Diplome<span class="text-danger">*</span></label>
                      <select id="Diplome" class="form-control" name="codeDip">
                      <option  value="{{null}}">Choisir un diplome</option>
                        @foreach($diplomes as $diplome)
                          @php
                            $selected = "";
                          @endphp
                          @if ($diplome->id == $cour->codeDip )
                            @php
                              $selected = "selected";
                            @endphp  
                            
                          @endif
                          <option {{$selected}} value="{{$diplome->id}}">{{$diplome->nom}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col">
                      <label for="nom">nom<span class="text-danger">*</span></label>
                      <input type="text" name="nom" class="form-control" id="nom"  value="{{$cour->nom}}">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col">
                        <label for="coefDip">coefficient dans le diplome<span class="text-danger">*</span></label>
                        <input type="text" name="coefDip" class="form-control" id="coefDip" value="{{$cour->coefDip}}">
                    </div>
                    <div class="form-group col">
                        <label for="coefExam">coefficient dans l'examen<span class="text-danger">*</span></label>
                        <input type="text" name="coefExam" class="form-control" id="coefExam" min = "1" start ="1" value="{{$cour->coefExam}}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label for="coefTd">coefficient dans le TD<span class="text-danger">*</span></label>
                        <input type="text" name="coefTd" class="form-control" id="coefTd"  value="{{$cour->coefTd}}">
                    </div>

                    <div class="form-group col">
                        <label for="nbHeures">nombre des heures<span class="text-danger">*</span></label>
                        <input type="text" name="nbHeures" class="form-control" id="nbHeures" value="{{$cour->nbHeures}}" >
                    </div>
                </div>  
                
                <div class="row">
                    <div class="form-group col-12">
                        <label for="desc">Description</label>
                        <textarea name="desc" class="form-control" id="desc">{{$cour->desc}}</textarea>
                    </div>
                </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <a href="{{route('cours.index')}}"><button type="button" class="btn btn-secondary">Annuler</button></a>
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