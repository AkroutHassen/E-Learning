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
                      @php
                        $inscriBool = false;
                      @endphp
                      @foreach ($inscris as $inscri)
                        @if ($cour->id == $inscri->idCours)
                          @php
                            $inscriBool = true;
                          @endphp
                          @break
                        @endif
                      @endforeach
                      @if ($inscriBool)
                        <form method="POST" action="{{route('inscription.destroy', $cour->id)}}">
                          @csrf
                          @method('DELETE')
                          <a href="{{route('cours.show', $cour->id)}}">
                            <button type="button" class="btn btn-success">Accéder</i></button>
                          </a>
                          <button type="submit" class="btn btn-danger">Se désinscrire</button>
                        </form>
                      @else
                        <form method="POST" action="{{route('inscription.store')}}">
                          @csrf
                          <input type="hidden" name="idCours" value="{{ $cour->id }}">
                          <input type="hidden" name="idEtu" value="{{ session('id') }}">
                          <a href="{{route('cours.show', $cour->id)}}">
                            <button type="button" class="btn btn-info">Consulter</i></button>
                          </a>
                          <button type="submit" class="btn btn-primary">S'inscrire</i></button>
                        </form>
                      @endif
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