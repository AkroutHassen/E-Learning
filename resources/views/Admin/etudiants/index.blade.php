@extends('Admin.layouts.template')

@section('titre')
    Liste des etudiants
@endsection
@section('titrepage')
    Etudiants
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header row">
                <h3 class="card-title col-10">Liste des etudiants</h3>
                <a href="{{route('etudiant.create')}}" class='col-2'> <button type = "button" class= "btn btn-primary pl-2 pr-2" >Ajouter un etudiant</button></a>
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
                        <th>login</th>
                        <th>action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach( $etudiants as $etudiant)
                            <tr>
                                <td>{{ $etudiant->id }}</td>
                                <td>{{ $etudiant->nom}}</td>
                                <td>{{ $etudiant->prenom }}</td>
                                <td>{{ $etudiant->email}}</td>
                                <td>{{ $etudiant->login }}</td>
                                <td> 
                                    <form method="post" action="{{route('etudiant.destroy',$etudiant->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('etudiant.show',$etudiant->id)}}"> <button type = "button" class= "btn btn-primary"><i class="far fa-eye"></i></button></a>
                                    <a href="{{route('etudiant.edit',$etudiant->id)}}"> <button type = "button" class= "btn btn-primary"><i class="fa fa-edit"></i></button></a>

                                        
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
                        <th>login</th>
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
