@extends('Etudiants.layouts.template')

@section('titre')
    Cours: {{ $cour->nom }}
@endsection

@section('titrepage')
    Cours: {{ $cour->nom }}
@endsection

@section('contenu')
    <!-- Widget: user widget style 1 -->
    <div class="card card-widget widget-user m-5">
      <!-- Add the bg color to the header using any of the bg-* classes -->
      <div class="widget-user-header bg-info">
        <h2 class="widget-user-username">Cours: {{ $cour->nom }}</h2>
        <h5 class="widget-user-desc">Diplome: {{ $nomDip }}</h5>
      </div>
      <div class="card-footer">
          <p class="text-center font-weight-normal text-justify"><span class="font-weight-bold">Description du cours</span><br>{{ $cour->desc }}</p>
          <br>
          <form  method="POST" action="{{--route('cours.inscrire', $cour->id)--}}">
            @csrf
            <button type="submit" class="btn btn-primary">S'inscrire</i></button>
          </form>
          <hr>
        <div class="row">
          <div class="col-sm-3 border-right">
            <div class="description-block">
              <h5 class="description-header">Nombre d'heures</h5>
              <span class="description-text">{{$cour->nbHeures}}</span>
            </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
          <div class="col-sm-3 border-right">
            <div class="description-block">
              <h5 class="description-header">Coefficient du diplome</h5>
              <span class="description-text">{{$cour->coefDip}}</span>
            </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
          <div class="col-sm-3 border-right">
            <div class="description-block">
              <h5 class="description-header">Coefficient de l'examen</h5>
              <span class="description-text">{{$cour->coefExam}}</span>
            </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
          <div class="col-sm-3">
            <div class="description-block">
              <h5 class="description-header">Coefficient du TD</h5>
              <span class="description-text">{{$cour->coefTd}}</span>
            </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
    </div>
    <!-- /.widget-user -->
@endsection