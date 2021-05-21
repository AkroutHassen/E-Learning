@extends('Enseignants.layouts.template')

@section('titre')
    Notes
@endsection

@section('titrepage')
    Notes
@endsection

@section('contenu')
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Notes</h3>
        </div>

        @if ($msg=Session::get('success'))
        <div class="alert alert-success">
          {{$msg}}
        </div>
        @endif
        @if ($msg=Session::get('warning'))
        <div class="alert alert-warning">
          {{$msg}}
        </div>
        @endif


        <!-- /.card-header -->
        <div class="card-body">
          <table id="example2" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Diplome</th>
                <th>Cours</th>
                <th>Responsabilité</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($interventions as $intervention)
                <tr>
                    <td>
                          {{ $intervention->cours->diplome->nom }}
                    </td>
                    <td>{{ $intervention->cours->nom }}</td>
                    <td>
                        @if ($intervention->resp == 0)
                            Cours 
                        @else
                            TD {{$intervention->resp}}
                        @endif
                    </td>
                    <td>
                      <a href="{{route('enseignant.note.choix', [$intervention->cours->id, $intervention->resp])}}">
                        <button type="button" class="btn btn-primary">Insérer notes</i></button>
                      </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
              <th>Diplome</th>
              <th>Cours</th>
              <th>Responsabilité</th>
              <th>Action</th>
            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
  @if (isset($idCours))

    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          {{$cour->nom}}: 
          @if ($resp == 0)
            Cours 
          @else
            TD {{$resp}}
          @endif
        </h3>
        <br>
        <p class="text-muted">*: Modifier une note nécessite la permission de l'administrateur</p>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
              <th>Prenom</th>
              <th>Nom</th>
              <th>Note TD</th>
              <th>Note examen</th>
              <th>Moyenne</th>
              <th>Action</th>
          </tr>
          </thead>
          <tbody>
              @for ($i = 0; $i < count($etudiants); $i++)
              @php
                if (isset($notes[$etudiants[$i]->id]->noteTd) or isset($notes[$etudiants[$i]->id]->noteExam))
                  $route = 'enseignant.note.update';
                else
                  $route = 'enseignant.note.store';
              @endphp
              <tr>
                  <td>{{ $etudiants[$i]->prenom }}</td>
                  <td>{{ $etudiants[$i]->nom }}</td>
                  <form method="POST" action="{{ route($route, [$etudiants[$i]->id, $resp]) }}" class="control-form">
                  @csrf
                  @if ($route == 'enseignant.note.update')
                      @method('PUT')
                  @endif
                  <input type="hidden" name="idEtu" value="{{$etudiants[$i]->id}}">
                  <input type="hidden" name="idCours" value="{{$idCours}}">
                  
                  <td>
                    @if ($resp != 0)
                      @if (isset($notes[$etudiants[$i]->id]->noteTd))
                        {{ $notes[$etudiants[$i]->id]->noteTd }}
                      @else
                        <input type="number" step="0.25" max="20" min="0" name="noteTd" class="form-control">
                      @endif
                    @else
                      @if (isset($notes[$etudiants[$i]->id]->noteTd))
                        {{ $notes[$etudiants[$i]->id]->noteTd }}
                      @else
                        Non noté
                      @endif
                    @endif
                  </td>
                  <td>
                    @if ($resp == 0)
                      @if (isset($notes[$etudiants[$i]->id]->noteExam))
                        {{ $notes[$etudiants[$i]->id]->noteExam }}
                      @else
                        <input type="number" step="0.25" max="20" min="0" name="noteExam" class="form-control">
                      @endif
                    @else
                      @if (isset($notes[$etudiants[$i]->id]->noteExam))
                        {{ $notes[$etudiants[$i]->id]->noteExam }}
                      @else
                        Non noté
                      @endif
                    @endif
                  </td>
                  <td>
                    @if (isset($notes[$etudiants[$i]->id]->moy))
                      {{ $notes[$etudiants[$i]->id]->moy }}
                    @else
                      Non noté
                    @endif
                  </td>
                  <td>
                    @if ($resp == 0)
                        @if (isset($notes[$etudiants[$i]->id]->noteExam))
                          <button class="btn btn-warning" disabled="disabled">Modifier*</button>                  
                        @else
                          <input type="submit" value="Insérer" class="btn btn-success">
                        @endif
                    @else 
                        @if (isset($notes[$etudiants[$i]->id]->noteTd))
                          <button class="btn btn-warning" disabled="disabled">Modifier*</button>                           
                        @else
                          <input type="submit" value="Insérer" class="btn btn-success">
                        @endif
                    @endif
                  </td>
                  </form>
              </tr>
              @endfor
          </tbody>
          <tfoot>
          <tr>
            <th>Prenom</th>
            <th>Nom</th>
            <th>Note TD</th>
            <th>Note examen</th>
            <th>Moyenne</th>
            <th>Action</th>
          </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  
  @endif
@endsection