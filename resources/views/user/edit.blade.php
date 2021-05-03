@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card col-md-10 dark-color-card">

            <div class="card-body">
                <h1>Edit User</h1>
                <div class="row"></div>
                    <form id="editUserForm"method="post" action="{{route('updateUser',$user->id)}}">
                        <input type="hidden" id="userID" name="id"value={{$user->id}}>
                        @csrf     
                         <div class="m-2 row">
                            <div class="col-md-12">
                                <label for="name">Name</label>
                                <input class="form-control" type="text" name="name" id="editUserName" value="{{$user->name}}">
                            </div>
                            
                         </div>   
                        <div class="m-2 row">
                            <div class="col-md-12">
                                <label for="email">Email address</label>
                                <input class="form-control" type="email" name="email" id="resetPasswordEmail" value="{{$user->email}}">
                            </div>
                            
                        </div>
                        <div class="m-2 row">
                            <div class="col-md-12">
                                <label for="selectedStatus">Status</label>
                            </div>
                             
                        </div>
                        <div id="passwordResetRow" class="m-2 row pb-2">
                           
                            <div class="col-md-6">
                                <select class="form-control" name="status" id="selectedStatus"@if(!Auth::user()->admin)disabled @endif>
                                    <option disabled selected>{{$user->status->name}}</option>
                                        @foreach($statuses as $status)
                                            <option value={{$status->id}}>{{$status->name}}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div id ="passwordResetCol"class="col-md-6 mb-2"> 
                                @if(Auth::user()->admin)
                                <div class="row">
                                    <div class="col-md-7 text-right">
                                          <p id="showPassword" class="text-muted"></p>
                                          <p id="showMessage"class="small text-muted"></p>
                                    </div>
                                    <div class="col-md-5 text-right">
                                        <button id="resetPassword" class="btn btn-secondary">Password Reset</button>
                                        <p id="showCopyMessage"class="small text-danger"></p>
                                    </div>
                                </div>
                                @endif
                                
                            </div>

                        </div>
                        @if(Auth::user()->id === $user->id)
                         <div class="m-2 row border-top pt-4"><div class="col-md-12"><label for="selectedStatus">Change password</label></div></div>
                                <div class="m-2 row">

                                    <div class="col-md-6">
                                        <input type="password" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="password" class="form-control" placeholder="Confirm Password">
                                    </div>
                                </div>
                            @endif                   
                        <div class="row mt-2"></div>

                        
                        <div class="row justify-content-center mt-4">
                            <div class="col-md-6 text-center">
                                <button type="submit" class='btn btn-primary col-md-6' value=>Update</button>
                            </div>

                            <div class="col-md-6 text-center">
                                <button id="deleteUser" class='btn btn-danger col-md-6'>Delete</button>
                            </div>
                        </div>
                        
                    </form>
                    <div id="alertDelete"></div>
                    <input id="csrf" type="hidden" value='{{csrf_token()}}'></div> 
                {{-- <div id="confirmAlert" class="alert alert-danger" style="display: none;" role="alert">
                  <p> Confirm deleteing <b>{{$user->name}}</b> from the system! </p>
                    <div class="text-center"><button class="btn btn-dangercol-md-3" id="confrim">Confim</button></div>
                </div> --}}
                </div>
            </div>
        </div>   
    </div>     
</div>
@endsection
