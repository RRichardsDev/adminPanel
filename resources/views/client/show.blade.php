@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card col-md-10">
            <div class="card-body">
                <div class="m-2">
                    <h1 class="display-4 text-color-red" >{{$client->name}}</h1>
                </div>

                
               <div class="p-2">
               @if(Auth::user()->admin)
                <form id="addUserToInstanceForm" method="post" action="{{route('clientAddUser', ['clientID'=>$client->id])}}">
                        @csrf
                       <div class="mb-4 input-group">                            
                            <select class="custom-select" name="selectedUser" id="selectedUser">
                                <option disabled selected>Add new user....</option>
                                @foreach($userList as $user)
                                    <option value={{$user->id}}>{{$user->name}}</option>
                                @endforeach
                            </select> 
                           <button id= "addUserToInstance" class=" btn-red btn  input-group-append">Add</button></a>
                           
                       </div>
                    </form>
                @endif
                    
               
                   <div class="row border-bottom pb-2">
                            <div class="col-md-2">ID</div>
                            <div class="col-md-7">User</div>
                            
                            <div class="col">Joined</div>

                    </div>
                     
                    <div id="clientList" class="gray-hover">
                        
                         @foreach($uniqueUsers as $user)
  
                            <a href="{{route('clientShowUser',['clientID'=>$client->id,'userID'=>$user->id])}}">
                                <div class="row border-bottom p-2 hover ">
                                <div class="col-md-2 text-color-red">{{$user->id}}</div>
                                <div class="col-md-7 text-dark">{{$user->name}}</div> 
                               
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
