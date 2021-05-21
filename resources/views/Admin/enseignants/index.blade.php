@extends('Admin.layouts.template')

@section('titre')
    Liste des enseignants
@endsection
@section('titrepage')
    enseignants
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header row">
                <h3 class="card-title col-10">Liste des enseignants</h3>
                <a href="{{route('enseignant.create')}}"> <button type = "button" class= "btn btn-primary pl-1 pr-1" >Ajouter un enseignant</button></a>
            </div>
            <!-- /.card-header -->
            @if($msg=Session::get('success'))
                <div class="alert alert-success">
                    <p>{{$msg}}</p>
                </div>
            @endif

            
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr class="text-capitalize">
                        <th>Code</th>
                        <th>nom</th>
                        <th>prenom</th>
                        <th>email</th>
                        <th>grade</th>
                        <th>action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach( $enseignants as $enseignant)
                            <tr>
                                <td>{{ $enseignant->id }}</td>
                                <td>{{ $enseignant->nom}}</td>
                                <td>{{ $enseignant->prenom }}</td>
                                <td>{{ $enseignant->email}}</td>
                                <td>{{ $enseignant->grade }}</td>
                                <td> 
                                    <form method="post" action="{{route('enseignant.destroy',$enseignant->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('enseignant.show',$enseignant->id)}}"> <button type = "button" class= "btn btn-primary"><i class="far fa-eye"></i></button></a>
                                    <a href="{{route('enseignant.edit',$enseignant->id)}}"> <button type = "button" class= "btn btn-primary"><i class="fa fa-edit"></i></button></a>
                                        <button type = "submit" class= "btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                    <tr class="text-capitalize">
                        <th>Code</th>
                        <th>nom</th>
                        <th>prenom</th>
                        <th>email</th>
                        <th>grade</th>
                        <th>action</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>          
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
    
    
@endsection
