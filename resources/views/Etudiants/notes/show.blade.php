@extends('Etudiants.layouts.template')

@section('titre')
    Relevé des notes
@endsection

@section('titrepage')
    Relevé des notes
@endsection

@section('contenu')
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Relevé des notes</h3>
        </div>

        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Diplome</th>
                <th>Cours</th>
                <th>Note TD</th>
                <th>Note Examen</th>
                <th>Moyenne</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($notes as $note)
                <tr>
                    <td>{{ $nomDip[0]->nom }}</td>
                    <td>{{ $note->cours->nom }}</td>
                    <td>{{ $note->noteExam }}</td>
                    <td>{{ $note->noteTd }}</td>
                    <td>{{ $note->moy }}</td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
              <th>Diplome</th>
                <th>Cours</th>
                <th>Note TD</th>
                <th>Note Examen</th>
                <th>Moyenne</th>
            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
@endsection