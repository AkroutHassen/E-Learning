@extends('Etudiants.layouts.template')

@section('titre')
    Liste des diplomes
@endsection

@section('titrepage')
    Liste des diplomes
@endsection

@section('contenu')
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Lsite des diplomes</h3>
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
                <th>Description</th>
                <th>Nombre de cours</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($diplomes as $diplome)
                <?php $nbCours=0; ?>
                <tr>
                    <td>{{ $diplome->nom }}</td>
                    <td>{{ $diplome->desc }}</td>
                    <td>
                      @foreach ($cours as $cour)
                        @if ($cour->codeDip == $diplome->id)
                        <?php $nbCours++; ?>
                        @endif
                      @endforeach
                      {{$nbCours}}
                    </td>
                    <td>
                      <form method="POST" action="{{--route('diplomes.destroy', $diplome->id)--}}">
                        @csrf
                        {{--@method('DELETE')--}}
                        <button type="submit" class="btn btn-primary">S'inscrire</button>
                      </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th>Diplome</th>
                <th>Description</th>
                <th>Nombre de cours</th>
                <th>Action</th>
            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
@endsection