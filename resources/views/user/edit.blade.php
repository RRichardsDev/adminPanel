@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card col-md-5">

            <div class="card-body">
                <h1>Edit User</h1>
                <div class="row"></div>
                    <form id="editUserForm"method="post" action="/submit">
                        @csrf
                        <div class=" form-group m-2">
                                <input type="hidden" id="userID" name="id"value={{$user->id}}>
                                <label for="name">Name</label>
                                <input class="form-control m-2" type="text" name="name" placeholder="{{$user->name}}">
                                <label for="email">Email address</label>
                                <input class="form-control m-2" type="email" name="email" placeholder="{{$user->email}}">
                                
                            
                            <div class="row justify-content-center mt-4">
                                <div class="col-6 text-center">
                                    <button type="submit" class='btn btn-primary col-6' value=>Update</button>
                                </div>

                                <div class="col-6 text-center">
                                    <button id="deleteUser" class='btn btn-danger col-6'>Delete</button>
                                </div>
                                
                                
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>   
    </div>     
</div>
@endsection
