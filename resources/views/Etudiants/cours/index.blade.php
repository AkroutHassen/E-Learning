@extends('Etudiants.layouts.template')

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


        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Diplome</th>
                <th>Cours</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($cours as $cour)
                <tr>
                    <td>
                          {{ $nomDip[0]->nom }}
                    </td>
                    <td>{{ $cour->nom }}</td>
                    <td>
                      <span class="d-inline-block text-truncate" style="max-width: 400px;">{{ $cour->desc }}</span>
                    </td>
                    <td>
                      <form method="POST" action="{{--route('cours.inscrire', $cour->id)--}}">
                        @csrf
                        <button type="submit" class="btn btn-primary">S'inscrire</i></button>
                        <a href="{{route('cours.show', $cour->id)}}">
                          <button type="button" class="btn btn-info">Consulter</i></button>
                        </a>
                      </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
              <th>Code du cours</th>
              <th>Cours</th>
              <th>Description</th>
              <th>Action</th>
            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
@endsection