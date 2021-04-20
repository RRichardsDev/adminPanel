@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card col-md-5">

            <div class="card-body">
                <h1>Edit User</h1>
                <div class="row"></div>
                    <form method="post" action="{{route('updateUser', $user->id)}}">
                        @csrf
                        <div class=" form-group m-2">
                            
                                <input class="form-control m-2" type="text" name="name" placeholder="{{$user->name}}">
                                <input class="form-control m-2" type="number" name="phone" placeholder="{{$user->phone}}">
                                <input class="form-control m-2" type="email" name="email" placeholder="{{$user->email}}">
                                <input class="form-control m-2" type="text" name="position" placeholder="Manager">
                            
                            <div class="row justify-content-center mt-4">
                                <button type="submit" class='btn btn-primary justify-content-center col-md-3'>Update</button>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>   
    </div>     
</div>
@endsection
