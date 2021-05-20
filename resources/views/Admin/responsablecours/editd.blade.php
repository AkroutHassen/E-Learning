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
                <h3 class="card-title">Voulez vous modifier <small>{{-- --}}</small> ?</h3>
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
              <?php  $msg = [$responsablecour->idEns,$responsablecour->idCours,$responsablecour->resp];
               $msgs = implode(",",$msg);
              ?>
              <!-- form start -->
              <form id="quickForm" method="post" action="{{route('responsablecours.updated',[$msgs,$responsablecour->idEns])}}">
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
                          @if ($diplome->id == $responsablecour->cours->codeDip )
                            @php
                              $selected = "selected";
                            @endphp  
                            
                          @endif
                          <option {{$selected}} value="{{$diplome->id}}">{{$diplome->nom}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <a href="{{route('responsablecours.index')}}"><button type="button" class="btn btn-secondary">Annuler</button></a>
                  <button type="submit" class="btn btn-primary">Modifier Diplome</button>
                  <?php $msg = [$responsablecour->idEns,$responsablecour->idCours];
                   $msgs = implode(",",$msg);
                  ?>
                  <a href="{{route('responsablecours.edit',[$msgs,$responsablecour->idEns])}}"><button type="button" class="btn btn-secondary">Suivant</button></a>
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