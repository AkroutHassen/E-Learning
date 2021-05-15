@extends('Etudiants.layouts.template')

@section('title')
    Liste des cours
@endsection

@section('titrepage')
    Liste des cours
@endsection

@section('contenu')
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Lsite des cours</h3>
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
                <th>Code</th>
                <th>Designation</th>
                <th>Qte</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($cours as $cour)
                <tr>
                    <td>{{ $cour->id }}</td>
                    <td>{{ $cour->nom }}</td>
                    <td>{{ $cour->desc }}</td>
                    <td>
                      <form method="POST" action="{{route('cours.destroy', $cour->id)}}">
                        @csrf
                        @method('DELETE')
                        <a href="{{route('cours.edit',$cour->id)}}">
                          <button type="button" class="btn btn-primary"><i class="fa fa-edit"></i></button>
                        </a>
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                      </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th>Code</th>
                <th>Designation</th>
                <th>Qte</th>
                <th>Action</th>
            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
@endsection