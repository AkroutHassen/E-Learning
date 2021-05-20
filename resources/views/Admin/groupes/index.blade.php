@extends('Admin.layouts.template')

@section('titre')
    Liste des groupes
@endsection
@section('titrepage')
    Groupes
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header row">
                <h3 class="card-title col-10">Liste des groupes</h3>
                <a href="{{route('groupe.create')}}" class='col-2'> <button type = "button" class= "btn btn-primary pl-2 pr-2" >Ajouter un groupe</button></a>
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
                        <th>Numéro TD</th>
                        <th>action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach( $groupes as $groupe)
                            <tr>
                                <td>{{ $nomDip[$groupe->codeDip] }}</td>
                                <td>{{ $groupe->id}}</td>
                                <td> 
                                    <form method="post" action="{{route('groupe.destroy',$groupe->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <?php $msg = [$groupe->id,$groupe->codeDip];
                                    $msgs = implode(",",$msg);
                                    ?>
                                    <a href="{{route('groupe.show',[$msgs,$groupe->id])}}"> <button type = "button" class= "btn btn-primary"><i class="far fa-eye"></i></button></a>
                                    <a href="{{route('groupe.edit',[$msgs,$groupe->id])}}"> 
                                    {{-- <a href="{{route('groupe.edite',[$groupe->codeDip,$groupe->id])}}"> --}}
                                        <button type = "button" class= "btn btn-primary"><i class="fa fa-edit"></i></button>
                                    {{-- </a> --}}
                                    </a>         
                                        <button type = "submit" class= "btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                    <tr class="text-capitalize">
                        <th>Nom Diplome</th>
                        <th>Numéro TD</th>
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
