@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><h2><span id="contour">Contour</span> Users</h2></div>

                <div class="card-body">
                <div class="container-fluid ">
                    
                    @if(Auth::user()->admin)
                        <div class="m-2 text-right">      
                            <a href="{{route('createUser')}}"><button class="btn btn-primary">Create User</button></a>
                        </div>
                    @endif 
                    
                    
                    <div class="row col-12 border-bottom ">
        
                        <div class="col-2">ID</div>
                        <div class="col-4">Name</div>
                        <div class="col-5">Email</div>                                
                        <div class="col-1"></div>

                    </div>
                    <div id="userList" class="row col-12 px-2 mx-2 ">

                        @foreach($users as $user)
                            <div class="row col-12 border-bottom p-2">
                                <div class="col-2 nr">{{$user->id}}</div>
                                <div class="col-4 dynamName">{{$user->name}}</div>
                                <div class="col-5 dynamEmail">{{$user->email}}</div>            
                                <div class="col-1">
                                    @if(Auth::user()->admin)
                                        <a href="{{route('editUser',$user->id)}}">
                                            <button class="btn btn-outline-info btn-sm btnEdit " name="edit">Edit</button>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        @endforeach

                        </div>
                    </div>
                    <input id="csrf" type="hidden" value='{{csrf_token()}}'></div>      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
