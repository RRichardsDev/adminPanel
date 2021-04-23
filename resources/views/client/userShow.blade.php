@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card col-md-10">
            <div class="card-body">
                <div class="m-2">
                    <a href="{{route('showClient', $client->id)}}"><h1 class="display-4">{{$client->name}}</h1></a>
                    <h2>Permissions - <span class="text-muted"> {{$client->users[0]->name}} </span> </h2>
                    <div class="pt-2">
                        <h4>Roles</h4>

                    {{-- @foreach($x=1; $x<=4; $x++)
                        <div class="form-check pt-4 row">
                            <div class="text-muted">
                                <div class="row"> --}}
                                   {{--  <p class="lead col-10" for="flexCheckDefault">Role Group {{$x}}</p>
                                    <div class="text-right col-2">
                                        <input class="form-check-input selectAll" type="checkbox" value="">
                                        <label class="form-check-label" for="flexCheckDefault">Select All</label>
                                    </div> --}}
                                {{-- </div> --}}
                                
                                <div class="border-top col-12 pt-2">
                                    <div class="form-check m-1 d-flex flex-row flex-wrap id=">

                                        @foreach($allRoles as $roleList)
                                            <div class="m-y-1 py-2 col-3 .role border-bottom" >
                                                <input class="form-check-input" type="checkbox" value={{$roleList->id}} 
                                                    @foreach($user as $role)
                                                        {{  ($role->pivot->permission_role_id == $roleList->id ? ' checked' : '') }}
                                                    @endforeach>
                                                <label class="form-check-label" for="flexCheckDefault">{{$roleList->name}}</label>
                                            </div>
                                        @endforeach

                                    </div>  
                                </div> 
                            </div>
                        {{-- </div>
                    @endfor --}}

                    </div>

                    
                </div>
               <div class="p-2">
               
                    
               </div>
            
        </div>   
    </div>     
</div>
@endsection



