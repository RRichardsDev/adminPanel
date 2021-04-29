@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card dark-color-card col-md-10">
            <div class="card-body">
                <div class="m-2 text-color-red-hover">
                    <div class="row">
                        <div class="col-md-10">
                            <h1 class="display-5"><span class="">{{$role->name}}</span></h1>
                        </div>
                         
                         @if(Auth::user()->admin)
                            <div class="col-md-2 text-right d-flex">
                                <a href="{{route('editRole', $role->id)}}"><button class="btn btn-outline-red">Edit</button></a>
                                <form action="{{route('deleteRole', $role->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a><button class="btn btn-outline-red ml-1" type="submit">Delete</button> </a>
                                </form>
                                 
                            </div>
                        @endif
                    </div>
                   
                    <p class="text-muted">{{$role->description}}</p>
                    <div class="pt-2 ">
                        <h4 class="text-color-red">Permissions</h4>
                        <form action="{{route('updatePermissionRoles', $role->id)}}" method="POST" id="roleSelect">
                            @csrf
                            <div class="border-top border-dark col-md-12 pt-2 ">
                                <div class="form-check m-1 d-flex flex-row flex-wrap">
                                    @foreach($permissions as $permission)
                                        <div class="m-y-1 py-2 col-md-3 .role border-bottom" >
                                            <input class="form-check-input" name="{{$permission->id}}" type="checkbox" 

                                              @foreach($role->permissions as $rolePermission)
                                                    {{  ($rolePermission->id === $permission->id ? ' checked' : '') }}
                                                @endforeach

                                                @if(Auth::user()->admin !== 1)
                                                    disabled
                                                @endif

                                                >

                                            <label class="form-check-label" for="flexCheckDefault">{{$permission->name}}</label>
                                        </div>
                                    @endforeach
                                </div>  
                            </div> 
                            <div class="text-center col-md-12 p-2">
                                @if(Auth::user()->admin)
                                    <button class="btn btn-red col-md-4 text-center" type="submit">Confirm</button>
                                    <div class="text-right">
                                         
                                       
                                       
                                     </div>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
{{-- 
                <input id="clientID" type="hidden" value='{{$client->id}}'></div>
                <input id="userID" type="hidden" value='{{$user->id}}'></div>
                <input id="csrf" type="hidden" value='{{csrf_token()}}'></div> --}}
                
                    
                </div>
                

               
               
                    
               </div>
            
        </div>   
    </div>     
</div>
@endsection



