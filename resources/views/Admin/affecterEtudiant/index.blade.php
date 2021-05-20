@extends('Admin.layouts.template')

@section('titre')
    Affecter Etudiants
@endsection
@section('titrepage')
    Affecter Etudiants
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
        <form method="post" action="{{route('affecter.update', $idEtu)}}" onsubmit="vider()" id="form">
                @csrf
                @method('PUT')
            <div class="card-header row">
                <h3 class="card-title col-10">Affectation</h3>
                <button type = "submit" class= "btn btn-primary pl-2 pr-2 col-2" >Valider</button>
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
                        <th>Nom Etudiant</th>
                        <th>Nom Diplome</th>
                        <th>Numéro TD</th>
                        
                    </tr>
                    </thead>
                    <tbody id="contenu">
                        @php
                        $i=0;
                        @endphp
                        @foreach( $affectes as $affect)
                            @php
                                $i++;
                            @endphp
                            <tr>
                                <td>{{ $affect->id. '. ' . $affect->nom .' ' . $affect->prenom}}</td>
                                <td>{{ $affect->codeDip }}</td>
                                <td>                                  
                                        <select id="groupe" class="form-control" name="{{'numGroupe'.$i}}">
                                                <option  value="{{null}}">Choisir un Groupe</option>
                                                @foreach($groupes as $groupe)
                                                    @if($groupe->codeDip == $affect->codeDip)
                                                        <option value="{{$groupe->id}}">{{'TD ' . $groupe->id}}</option>
                                                    @endif
                                                @endforeach
                                        </select>      
                                </td>
                                
                                {{-- <td>  --}}
                                  
                                    {{-- <a href="">  --}}
                                    {{-- <a href="{{route('groupe.edite',[$groupe->codeDip,$groupe->id])}}"> --}}
                                        {{-- <button type = "button" class= "btn btn-primary"><i class="fa fa-edit"></i></button> --}}
                                    {{-- </a> --}}
                                    {{-- </a>          --}}
                                       
                                {{-- </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                    <tr class="text-capitalize">
                        <th>Nom Etudiant</th>
                        <th>Nom Diplome</th>
                        <th>Numéro TD</th>
                                
                    </tr>
                    </tfoot>
                     
                </table>
               
               
            </div>
            <!-- /.card-body -->
                </form>
        </div>          
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->

    
@endsection
