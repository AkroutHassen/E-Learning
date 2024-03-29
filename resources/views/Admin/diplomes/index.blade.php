@extends('Admin.layouts.template')

@section('titre')
    Liste des diplomes
@endsection
@section('titrepage')
    Diplomes
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header row">
                <h3 class="card-title col-10">Liste des diplomes</h3>
                <a href="{{route('diplome.create')}}" class='col-2'> <button type = "button" class= "btn btn-primary pl-2 pr-2" >Ajouter un diplome</button></a>
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
                            <th >description</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $diplomes as $diplome)
                            <tr>
                                <td>{{ $diplome->id }}</td>
                                <td>{{ $diplome->nom}}</td>
                                <td ><p style='width:400px'>{{ $diplome->desc }}</p></td>
                                <td> 
                                    <form method="post" action="{{route('diplome.destroy',$diplome->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('diplome.edit',$diplome->id)}}"> <button type = "button" class= "btn btn-primary"><i class="fa fa-edit"></i></button></a>
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
                            <th >description</th>
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
