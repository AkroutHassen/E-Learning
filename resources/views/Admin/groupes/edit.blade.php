@extends('Admin.layouts.template')

@section('titre')
    Modifier des groupess
@endsection
@section('titrepage')
    groupess
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
        <!-- jquery validation -->
            <div class="card-primary">
              <div class="card-header">
                <h3 class="card-title">Voulez vous modifier <small>{{ $groupe->id}}</small> ?</h3>
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
              <?php $msg = [$groupe->id,$groupe->codeDip];
                $msgs = implode(",",$msg);
              ?>
              <form id="quickForm" method="post" action="{{route('groupe.update',[$msgs,$groupe->id] )}}">
              @csrf
              @method('PUT')
                <div class="card-body text-capitalize">
                  
                  
                  <div class="row">
                    <div class="form-group col">
                      <label for="Diplome">Diplome<span class="text-danger">*</span></label>
                      <select id="Diplome" class="form-control" name="codeDip">
                      <option  value="{{null}}">Choisir un diplome</option>
                        @foreach($diplomes as $diplome)
                          @php
                            $selected = "";
                          @endphp
                          @if ($diplome->id === $groupe->codeDip )
                            @php
                              $selected = "selected";
                            @endphp  
                            
                          @endif
                          <option {{$selected}} value="{{$diplome->id}}">{{$diplome->nom}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col">
                      <label for="num">Numéro groupes<span class="text-danger">*</span></label>
                      <input type="text" name="id" class="form-control" id="id"  value="{{$groupe->id}}">
                    </div>
                  </div>
                  
                <!-- /.card-body -->
                <div class="card-footer">
                  <a href="{{route('groupe.index')}}"><button type="button" class="btn btn-secondary">Annuler</button></a>
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