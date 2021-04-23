@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card col-md-10">
            <div class="card-body">
                <div class="m-2">
                    <h1>{{$client->name}}</h1>
                </div>

                
               <div class="p-2">
               @if(Auth::user()->admin)
                <form id="addUserToInstanceForm" method="post" action="{{route('clientAddUser', ['clientID'=>$client->id])}}">
                        @csrf
                       <div class="mb-4 input-group">                            
                            <select class="custom-select" name="selectedUser" id="selectedUser">
                                <option disabled selected>User</option>
                                @foreach($userList as $user)
                                    <option value={{$user->id}}>{{$user->name}}</option>
                                @endforeach
                            </select> 
                            
                            {{-- <select class="custom-select col-4" name="selectedRole" id="selectedRole">
                                <option disabled selected>Role Group</option>
                                @foreach($roles as $role)
                                    <option value={{$role->id}}>{{$role->name}}</option>
                                @endforeach
                                
                            </select>  --}}
                           <button id= "addUserToInstance" class="btn btn-primary input-group-append">Add</button></a>
                       </div>
                    </form>
                @endif
                    
                <h5>Associated users:</h5>
                   <div class="row border-bottom pb-2">
                            <div class="col-2">ID</div>
                            <div class="col-7">User</div>
                            
                            <div class="col">Joined</div>

                    </div>
                    
                    <div id="clientList" >
                        
                         @foreach($uniqueUsers as $user)
  
                            <a href="{{route('clientShowUser',['clientID'=>$client->id,'userID'=>$user->id])}}">
                                <div class="row border-bottom p-2 hover ">
                                <div class="col-2 ">{{$user->id}}</div>
                                <div class="col-7 text-decoration-none">{{$user->name}}</div> 
                               
                                <div class="col text-muted text-decoration-none">
                                    {{$user->pivot->created_at}}
                                </div>        
                           </div></a>                        
                           
                           {{-- EmailToolUser, ApiMarketingSMSRole, ApiMarketingEmailRole --}}

                        @endforeach
                    </div>
               </div>
            
        </div>   
    </div>     
</div>
@endsection
