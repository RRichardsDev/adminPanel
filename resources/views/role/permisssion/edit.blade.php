@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card dark-color-card col-md-10">
            <div class="card-body">
                <div class="m-2 text-color-red-hover">
                    <div class="row">
                        <div class="col-md-10">
                            <h1 class="display-4">Rol - <span class="text-color-red">{{$role->name}}</span></h1>
                        </div>
                         
                         <div class="col-md-2 text-right"><button class="btn btn-outline-red">Edit</button></div>
                    </div>
                   
                    <p class="text-muted">{{$role->description}}</p>
                    <div class="pt-2 ">
                        <h4 class="text-color-red">Permissions</h4>
                        <form action="/role/1/permissions" method="POST" id="roleSelect">
                            @csrf
                            <div class="border-top col-md-12 pt-2 ">
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
                            <div class="text-centercol-md-12 p-2">
                                @if(Auth::user()->admin)
                                    <button class="btn btn-redcol-md-4 text-center" type="submit">Confirm</button>
                                    <div class="text-right">
                                         
                                        <button id="deleteClientUser" class="btn btn-redcol-md-1 text-center">X</button> 
                                       
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



