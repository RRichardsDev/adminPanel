@extends('layouts.app')

@section('content')
<div class="container"> 
    <div class="row justify-content-center">
        <div class="card dark-color-card col-md-10">
            <div class="card-body">
                <div class="m-2">
                    <div class="row align-items-center">
                    <div class="col">
                        <h1 class="display-4 text-color-red red-black-hover"><a class="text-color-red red-black-hover" href="{{route('showClient', $client->id)}}">{{$client->name}}</a></h1>
                    </div>
                        
                    <div class="text-right col-md-2">
                         <button id="deleteClientUser" class="btn btn-outline-red text-center">Delete</button>
                     </div>
                    </div>
                    

                    <h2 class="text-dark">Permissions - <span class="text-muted"><b> {{$user->name}} </b></span> </h2>
                    <div class="pt-2 ">
                        <h4 class="text-color-red">Roles</h4>
                        <form action="{{route('updateUserRoles', ['clientID'=>$client->id, 'userID'=>$user->id])}}" method="POST" id="roleSelect">
                            @csrf
                            <div class="border-top col-md-12 pt-2 text-dark">
                                <div class="form-check m-1 d-flex flex-row flex-wrap">
                                    @foreach($allRoles as $roleList)
                                        <div class="m-y-1 py-2 col-md-3 .role border-bottom" >
                                            <input class="form-check-input" name="{{$roleList->id}}" type="checkbox" 
                                                

                                                @foreach($userRoles as $role)
                                                    {{  ($role === $roleList->id ? ' checked' : '') }}
                                                @endforeach>

                                            <label class="form-check-label" for="flexCheckDefault">{{$roleList->name}}</label>
                                        </div>
                                    @endforeach
                                </div>  
                            </div> 
                            <div class="text-center col-md-12 p-2">
                                 <button class="btn btn-red col-md-4 text-center" type="submit">Confirm</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div id="alertDelete"></div>
                <input id="clientID" type="hidden" value='{{$client->id}}'></div>
                <input id="userID" type="hidden" value='{{$user->id}}'></div>
                <input id="csrf" type="hidden" value='{{csrf_token()}}'></div>
                
                    
                </div>
                

               
               
                    
               </div>
            
        </div>   
    </div>     
</div>
@endsection



