@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><h2><span id="contour">Contour</span> Users</h2></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                <div class="container-fluid ">
                    

                        <div class="m-2 text-right">      
                            <a href="{{route('createUser')}}"><button class="btn btn-primary">Create User</button></a>
                        </div>
                    
                    
                    
                    <table id="userList" class="table table-hover table-striped">
                        <thead>
                            <tr >
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Job Title</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            
                             @foreach($users as $user)
                                
                                <th class="text-justify-centre align-middle nr" scope="row">{{$user->id}}</th>
                                    <td class="text-justify-centre align-middle dynamName">{{$user->name}}</td>
                                    <td class="text-justify-centre align-middle dynamEmail">{{$user->email}}</td>      
                                    <td class="text-justify-centre align-middle dynamPhone">{{$user->phone}}</td>          
                                    <td class="text-justify-centre align-middle dynamPos">Manager</td>
                                    <td class="text-justify-centre align-middle">
                                        <a href="{{route('editUser',$user->id)}}">
                                            <button class="btn btn-outline-info btnEdit" name="edit">Edit</button>
                                        </a>
                                    </td>
                                    <td class="text-justify-centre align-middle"><button class="btn btn-outline-danger btnDelete" name="delete">Delete</button></td>
                                </tr>
                                
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
