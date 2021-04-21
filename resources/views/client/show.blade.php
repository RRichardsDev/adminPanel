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
                <form> {{-- {{route('createInstance')}} --}}
                        @csrf
                       <div class="mb-4 input-group">                            
                            <select class="custom-select" name="selectedUser" id="selectedUser">
                                <option disabled selected>User</option>
                                @foreach($users as $user)
                                    <option value={{$user->id}}>{{$user->name}}</option>
                                @endforeach
                            </select> 
                            
                            <select class="custom-select col-4" name="selectedRole" id="selectedRole">
                                <option disabled selected>Role</option>
                                @foreach($roles as $role)
                                    <option value={{$role->id}}>{{$role->name}}</option>
                                @endforeach
                            </select> 
                           <button id= "addUserToInstance" class="btn btn-primary input-group-append">Add</button></a>
                       </div>
                    </form>
                <h5>Associated users:</h5>
                   <div class="row border-bottom pb-2">
                            <div class="col-2">ID</div>
                            <div class="col-2">User</div>
                            <div class="col">Role</div>

                    </div>
                    
                    <div id="clientList" >
                        
                         @foreach($client->users as $user)
  
                            <a href="{{route('client',$user->id)}}"><div class="row border-bottom p-2 hover ">
                                <div class="col-2 ">{{$user->id}}</div>
                                <div class="col-2 text-decoration-none">{{$user->name}}</div> 
                                <div class="col-8 text-muted text-decoration-none">
                                    
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
