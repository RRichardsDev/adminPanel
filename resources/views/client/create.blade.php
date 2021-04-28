@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card col-md-10">
            <div class="card-body">
                <div class="row mb-2">
                    <h1>New instance</h1>
                </div>
                <div class="row p-2">
                    <h2>{{$client->name}}</h2>
                </div>
                <div>
                    <form> {{-- {{route('createInstance')}} --}}
                        @csrf
                       <div class="mb-4 input-group">                            
                            <select class="custom-select" name="selectedUser" id="selectedUser">
                                <option disabled selected>User</option>
                                @foreach($users as $user)
                                    <option value={{$user->id}}>{{$user->name}}</option>
                                @endforeach
                            </select> 
                            
                            <select class="custom-selectcol-md-4" name="selectedRole" id="selectedRole">
                                <option disabled selected>Role</option>
                                @foreach($roles as $role)
                                    <option value={{$role->id}}>{{$role->name}}</option>
                                @endforeach
                            </select> 
                           <button id= "addUserToInstance" class="btn btn-primary input-group-append">Add</button></a>
                       </div>
                    </form>
                </div>
                
                <div class="container mt-4 p-2" id="createInstanceUserList">
                    {{-- User list div --}}
                    </div>
                <input type="hidden" name="csrf" id="csrf" value="{{csrf_token()}}">

                <div class="text-center">
                    <button class="btn btn-primarycol-md-4" type="submit">Confirm</button></a>
                </div>

                    
                    </div>

                </div>
            </div>   
        </div>   
    </div>     
</div>
@endsection
