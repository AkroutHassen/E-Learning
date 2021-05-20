@extends('Enseignants.layouts.template')

@section('titre')
    Liste des cours
@endsection

@section('titrepage')
    Liste des cours
@endsection

@section('contenu')
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Liste des cours</h3>
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
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Diplome</th>
                <th>Cours</th>
                <th>Description</th>
                <th>Prof du cours</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($interventions as $intervention)
                <tr>
                    <td>
                          {{ $nomDip[$intervention->idCours]->nom }}
                    </td>
                    <td>{{ $intervention->cours->nom }}</td>
                    <td>
                      <span class="d-inline-block text-truncate" style="max-width: 400px;">{{ $intervention->cours->desc }}</span>
                    </td>
                    <td>
                      {{ session('prenom') }} {{session('nom')}}
                    </td>
                    <td>
                      <a href="{{route('enseignant.cours.show', $intervention->cours->id)}}">
                        <button type="button" class="btn btn-success">Accéder</i></button>
                      </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
              <th>Code du cours</th>
              <th>Cours</th>
              <th>Description</th>
              <th>Prof du cours</th>
              <th>Action</th>
            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
@endsection