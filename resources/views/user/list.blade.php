@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card dark-color-card">
                <div class="card-header"><h2><span class="airal-bold">Contour</span><span class="text-color-red"> Users</span></h2></div>

                <div class="card-body pt-0">
                <div class="container-fluid ">
                    <form id="seachClients">
                        @csrf
                       <div class="mb-4 input-group form-group mt-2 pt-2">                            
                            <input id="userSearchQuery" type="text" class="form-control" placeholder="Search....">
                            <button id= "searchUsers" class=" btn-red btn  input-group-append">Search</button></a>
                    </form>
                            @if(Auth::user()->admin)
                        <form action="{{route('createUser')}}">
                            <button class="btn btn-red ml-1 input-group-append">Create User</button>
                        </form>
                            @endif 
                       </div>
                    
                    
                    
                    
                    <div class="row col-md-12 border-bottom border-dark p-2 mr-0">
        
                        <div class="col-md-1">ID</div>
                        <div class="col-md-4 text-color-red">Name</div>
                        <div class="col-md-5 text-color-red">Email</div>                                
                        

                    </div>
                        
                        <div id="userList" class="gray-hover" >
                        
                            @foreach($users as $user)
      
                                <a href="{{route('showUser', $user->id)}}">
                                    <div class="row border-bottom p-2 hover">
                                        <div class="col-md-1 text-color-red ">{{$user->id}}</div>
                                        <div class="col-md-4 text-dark">{{$user->name}}</div>
                                        <div class="col-md-5 text-dark">{{$user->email}}</div>
                                   </div>
                               </a>                        
                               
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
