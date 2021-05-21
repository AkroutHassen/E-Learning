@extends('Admin.layouts.template')

@section('titre')
    Liste des responsable de Cours
@endsection
@section('titrepage')
    responsable de Cours
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header row">
                <h3 class="card-title col-9">Liste des responsable des Cours</h3>
                <a href="{{route('responsablecours.created')}}" class='col-3'> <button type = "button" class= "btn btn-primary pl-2 pr-2" >Ajouter un responsable de Cours</button></a>
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
                        <th>Responsable</th>
                        <th>action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach( $responsablecours as $responsablecour)
                            <tr>
                                <td>{{$responsablecour->cours->diplome->nom}}</td>
                                <td>{{$responsablecour->cours->nom}}</td>
                                <td>{{$responsablecour->enseignant->id .'. '. $responsablecour->enseignant->nom .' '. $responsablecour->enseignant->prenom}}</td> 
                                <td>
                                <?php $msg = [$responsablecour->idEns,$responsablecour->idCours];
                                    $msgs = implode(",",$msg);
                                    ?>
                                    <form method="post" action="{{route('responsablecours.destroy',[$msgs,$responsablecour->idEns])}}">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('responsablecours.editd',[$msgs,$responsablecour->idEns])}}"> <button type = "button" class= "btn btn-primary"><i class="fa fa-edit"></i></button></a>

                                        
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
                        <th>Responsable</th>
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
