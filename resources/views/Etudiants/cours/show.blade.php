@extends('Etudiants.layouts.template')

@section('titre')
    Cours: {{ $cour->nom }}
@endsection

@section('titrepage')
    Cours: {{ $cour->nom }}
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
        <h2 class="widget-user-username">Cours: {{ $cour->nom }}</h2>
        <h5 class="widget-user-desc">Diplome: {{ $nomDip[0]->nom }}</h5>
      </div>
      <div class="card-footer">
          <p class="text-center font-weight-normal text-justify"><span class="font-weight-bold">Description du cours</span><br>{{ $cour->desc }}</p>
          <br>
          <div class="text-center">
            @if ($inscri)
              <form method="POST" action="{{route('inscription.destroy', $cour->id)}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Se désinscrire</button>
              </form>
            @else
              <form method="POST" action="{{route('inscription.store')}}">
                @csrf
                <input type="hidden" name="idCours" value="{{ $cour->id }}">
                <input type="hidden" name="idEtu" value="{{ session('id') }}">
                <button type="submit" class="btn btn-primary">S'inscrire</i></button>
              </form>
            @endif
          </div>
          
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
    @if ($inscri)
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
              <th>Accéder</th>
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
                      <button type="button" class="btn btn-success">Accéder</i></button>
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
              <th>Accéder</th>
          </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
    @endif
    <!-- /.widget-user -->
@endsection