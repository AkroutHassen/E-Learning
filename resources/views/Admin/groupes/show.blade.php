@extends('Admin.layouts.template')

@section('titre')
    Liste des Etudiants
@endsection
@section('titrepage')
    Liste des Etudiants
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header row">
                <h3 class="card-title col-11">Liste des Etudiants</h3>
                <a href="{{route('groupe.index')}}" class='col-1'> <button type = "button" class= "btn btn-primary pl-2 pr-2" >Retour</button></a>

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
                        <th>Code Etudiant</th>
                        <th>Nom Etudiant</th>
                        <th>prenom Etudiant</th>
                        
                        
                    </tr>
                    </thead>
                    <tbody id="contenu">
                        @foreach( $etudiants as $etudiant)
                            <tr>
                                <td>{{ $etudiant->id }}</td>
                                <td>{{$etudiant->nom}} </td>
                                <td>{{$etudiant->prenom}}</td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                    <tr class="text-capitalize">
                        <th>Code Etudiant</th>
                        <th>Nom Etudiant</th>
                        <th>prenom Etudiant</th>
                       
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
