@extends('Etudiants.layouts.template')

@section('title')
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
                <th>Code diplome</th>
                <th>Diplome</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($diplomes as $diplome)
                <tr>
                    <td>{{ $diplome->id }}</td>
                    <td>{{ $diplome->nom }}</td>
                    <td>{{ $diplome->desc }}</td>
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
                <th>Code diplome</th>
                <th>Diplome</th>
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