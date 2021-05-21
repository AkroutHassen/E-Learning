@extends('Enseignants.layouts.template')

@section('titre')
    TD {{$idTD}}: {{ $td->nom }}
@endsection

@section('titrepage')
    TD {{$idTD}}: {{ $td->nom }}
@endsection

@section('contenu')
    <!-- Widget: user widget style 1 -->
    <div class="card card-widget widget-user">
      <!-- Add the bg color to the header using any of the bg-* classes -->
      @if ($msg=Session::get('success'))
        <div class="alert alert-success">
          {{$msg}}
        </div>
      @endif
      <div class="widget-user-header bg-info">
        <h2 class="widget-user-username">Cours: {{ $td->nom }}</h2>
        <h5 class="widget-user-desc">Diplome: {{ $nomDip->nom }}</h5>
      </div>
      <div class="card-footer">
          <p class="text-center font-weight-normal text-justify"><span class="font-weight-bold">Description du cours</span><br>{{ $td->desc }}</p>
          <br>
          
          <hr>
        <div class="row">
          <div class="col-sm-3 border-right">
            <div class="description-block">
              <h5 class="description-header">Nombre d'heures</h5>
              <span class="description-text">{{$td->nbHeures}}</span>
            </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
          <div class="col-sm-3 border-right">
            <div class="description-block">
              <h5 class="description-header">Coefficient du diplome</h5>
              <span class="description-text">{{$td->coefDip}}</span>
            </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
          <div class="col-sm-3 border-right">
            <div class="description-block">
              <h5 class="description-header">Coefficient de l'examen</h5>
              <span class="description-text">{{$td->coefExam}}</span>
            </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
          <div class="col-sm-3">
            <div class="description-block">
              <h5 class="description-header">Coefficient du TD</h5>
              <span class="description-text">{{$td->coefTd}}</span>
            </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Les chapitre du cours</h3>
      </div>

      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
              <th>Chapitre</th>
              <th>Titre</th>
              <th>Description</th>
              <th>Nombre de video</th>
              <th>Temps requis</th>
              <th>Action</th>
          </tr>
          </thead>
          <tbody>
              @php $n=rand(5 ,10); @endphp
              @for ( $i=1 ;  $i<=$n ; $i++)
              <tr>
                  <td>{{ $i }}</td>
                  <td>Chapitre {{ $i }}</td>
                  <td>Bla Bla Bla</td>
                  <td>{{ rand(3, 7) }}</td>
                  <td>{{ rand(2, 5) }}</td>
                  <td>
                    <a href="#">
                      <button type="button" class="btn btn-success">Déposer Exercices</i></button>
                    </a>
                  </td>
              </tr>
          @endfor
          </tbody>
          <tfoot>
          <tr>
            <th>Chapitre</th>
              <th>Titre</th>
              <th>Description</th>
              <th>Nombre de video</th>
              <th>Temps requis</th>
              <th>Action</th>
          </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <!-- /.widget-user -->
@endsection