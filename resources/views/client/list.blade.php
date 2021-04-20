@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><h2><span id="contour">Contour</span> Clients</h2></div>

                <div class="card-body">
                <div class="container-fluid ">
                    <div class="m-2 text-right">      
                        <a href="{{route('createClient')}}"><button class="btn btn-primary">Create Client</button></a>
                    </div>
                    {{-- Table header --}}
                    <table id="clientList" class="table table-hover table-striped">
                        <thead>
                            <tr >
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone Number</th>                                
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>                            
                        {{-- Looping through clients then displaying details on table --}}
                             @foreach($clients as $client)                                
                                <th class="text-justify-centre align-middle nr" scope="row">{{$client->id}}</th>
                                    <td class="text-justify-centre align-middle dynamName">{{$client->name}}</td>
                                    <td class="text-justify-centre align-middle dynamEmail">{{$client->email}}</td>      
                                    <td class="text-justify-centre align-middle dynamPhone">{{$client->phone}}</td>          
                                    {{-- Link to edit client passing through client ID --}}
                                    <td class="text-justify-centre align-middle">
                                        <a href="{{route('editClient',$client->id)}}">
                                            <button class="btn btn-outline-info btnEdit" name="edit">Edit</button>
                                        </a>
                                    </td>
                                    <td class="text-justify-centre align-middle"><button class="btn btn-outline-danger btnDelete" name="delete">Delete</button></td>
                                </tr>
                                
                            @endforeach

                        </tbody>
                    </table>
                    {{-- hidden csrf token for ajax delete --}}
                    <input id="csrf" value='{{csrf_token()}}'></div>      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
