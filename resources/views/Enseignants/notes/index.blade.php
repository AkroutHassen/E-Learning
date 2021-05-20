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
          <table id="example1" class="table table-bordered table-striped">
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
                          {{ $nomDip[$intervention->idCours]->nom }}
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
                      <a href="{{route('enseignant.note.choix', $intervention->cours->id)}}">
                        <button type="button" class="btn btn-success">Insérer notes</i></button>
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
    @if (isset($choix))
        <p><strong>AAAAAAAAAAAAAAAAAAAAA</strong></p>
    @endif
@endsection