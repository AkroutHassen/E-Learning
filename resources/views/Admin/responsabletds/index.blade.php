@extends('Admin.layouts.template')

@section('titre')
    Liste des responsables des TDs
@endsection
@section('titrepage')
    responsable TDs
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header row">
                <h3 class="card-title col-9">Liste des responsable des TDs</h3>
                <a href="{{route('responsabletd.created')}}" class='col-3'> <button type = "button" class= "btn btn-primary pl-2 pr-2" >Ajouter un responsable de TD</button></a>
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
                        <th>responsable</th>
                        <th>action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach( $responsabletds as $responsabletd)
                            <tr>
                                <td>{{ $responsabletd->diplome->nom }}</td>
                                <td>{{ $responsabletd->cours->nom}}</td>
                                <td>{{ $responsabletd->enseignant->nom }}</td>
                                <td>{{ $responsabletd->enseignant->penom}}</td>
                                <td>{{ $responsabletd->res }}</td>
                                <td> 
                                    <form method="post" action="{{route('responsabletd.destroy',$responsabletd->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('responsabletd.edit',$responsabletd->id)}}"> <button type = "button" class= "btn btn-primary"><i class="fa fa-edit"></i></button></a>

                                        
                                        <button type = "submit" class= "btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                    <tr class="text-capitalize">
                        <th>Nom Diplome</th>
                        <th>Nom Cours</th>
                        <th>Nom enseignant</th>
                        <th>Prenom Enseignant</th>
                        <th>responsable</th>
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
