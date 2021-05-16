@extends('Admin.layouts.template')

@section('titre')
    Liste des responsables
@endsection
@section('titrepage')
    Responsables
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header row">
                <h3 class="card-title col-10">Liste des responsables</h3>
                <a href="{{route('responsable.create')}}" class='col-2'> <button type = "button" class= "btn btn-primary pl-1 pr-1" >Ajouter un responsable</button></a>
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
                        <th>Nom Diplome</th>
                        <th>Nom Cours</th>
                        <th>Nom enseignant</th>
                        <th>Prenom Enseignant</th>
                        <th>Responsable</th>
                        <th>action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach( $responsables as $responsable)
                            <tr>
                                <td>{{ $responsable->diplome->nom }}</td>
                                <td>{{ $responsable->cours->nom}}</td>
                                <td>{{ $responsable->enseignant->nom }}</td>
                                <td>{{ $responsable->enseignant->penom}}</td>
                                <td>{{ $responsable->res }}</td>
                                <td> 
                                    <form method="post" action="{{route('responsable.destroy',$responsable->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('responsable.edit',$responsable->id)}}"> <button type = "button" class= "btn btn-primary"><i class="fa fa-edit"></i></button></a>

                                        
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
