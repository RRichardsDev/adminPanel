@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><h2><span id="contour">Contour</span> Instances</h2></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                <div class="container-fluid ">
                    

                        <div class="m-2 text-right">      
                            <a href="{{route('createUser')}}"><button class="btn btn-primary">Create Instance</button></a>
                        </div>
                    
                    
                    
                    <table id="userList" class="table table-hover table-striped">
                        <thead>
                            <tr >
                                <th scope="col">ID</th>
                                <th scope="col">Client</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                             @foreach($instances as $instance)
                             <div>
                                <a href="{{route('instance',$instance->id)}}">
                                <tr>
                                	<th class="text-justify-centre align-middle nr" scope="row">{{$instance->id}}</th>
                                    <td class="text-justify-centre align-middle dynamEmail">{{$instance->client->name}}</td>              
                               
                                </tr>
                            </a></div>	
                                
                                
                            @endforeach

                        </tbody>
                    </table>
                    <input id="csrf" value='{{csrf_token()}}'></div>      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
