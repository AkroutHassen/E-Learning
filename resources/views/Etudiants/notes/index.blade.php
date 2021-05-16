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
                <th>Cours</th>
                <th>Note TD</th>
                <th>Note examen</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($cours as $cour)
                <tr>
                    <td>
                      @foreach ($diplomes as $diplome)
                          @if ($diplome->id == $cour->codeDip)
                              {{$diplome->nom}}
                          @endif
                      @endforeach
                    </td>
                    <td>{{ $cour->nom }}</td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th>Cours</th>
                <th>Note TD</th>
                <th>Note examen</th>
            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
@endsection