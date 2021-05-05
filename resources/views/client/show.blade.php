@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card col-md-10">
            <div class="card-body">
               {{-- <form id="addUserToInstanceForm" method="post" action="{{route('clientAddUser', ['clientID'=>$client->id])}}"> --}}
                <div class="m-2 row">

                  <div class="col-md-8 px-0">
                    <h1 class="display-4 text-color-red" >{{$client->name}}</h1>
                  </div>

                  
                </div>
              </form>
                  
                    
              

                
               <div class="p-2">
                <form id="searchUsersToAdd" method="post" action="#">
                <div class="row p-2">                  
                    <div class="input-group offset-md-8 col-md-4 p-1">
                      @csrf                     
                      <input id ="txtSearchUsersToAdd"type="text" class="form-control" placeholder="Search users to add">
                      <button id= "btnSearchUsersToAdd" class=" btn-red btn input-group-append ">Search</button></a>
                    </div>                  
                </div>
                </form>
               @if(Auth::user()->admin)
               
                 {{-- <form id="addUserToInstanceForm" method="post" action="{{route('clientAddUser', ['clientID'=>$client->id])}}">
                  @csrf
                  <div class="col-md-6 pl-0">
                     <div class="mb-4 input-group">                            
                        <input type="text" class="form-control" placeholder="Search users...">
                       <button id= "addUserToInstance" class=" btn-red btn input-group-append ">Search</button></a>
                     </div>
                   </div>
                </form> --}}
               
               
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
