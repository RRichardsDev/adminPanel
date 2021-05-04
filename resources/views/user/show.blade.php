@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card dark-color-card col-md-10">
            <div class="card-body">
                <div class="m-2 text-color-red-hover">
                   
                    <div class="pt-2 col-md-12">
                        
                        <form action="{{route('editUser', $user->id)}}">
                            <div class="row">
                                <div class="col-md-11">
                                     <h1><b>{{$user->name}}</b><span class="text-muted"> - Clients</span> </h1>
                                </div>
                                <div class="col-md-1">
                                    @if(Auth::user()->admin || Auth::user()->id == $user->id)
                                    <button type="submit" class="btn btn-outline-red text-center">Edit</button>

                                    @endif
                                </div>
                                <div class="row ml-2 pl-3">
                                    <p class="text-muted">{{$user->email}}  -</p>
                                </div>
                                <div class="row ml-2 pl-3">
                                    <p class="
                                    @if($user->status->id === 1)text-success @endif
                                    @if($user->status->id === 2)text-danger @endif
                                    @if($user->status->id === 3)text-primary @endif
                                    @if($user->status->id === 4)text-warning @endif
                                    ">{{$user->status->name}}</p>
                                </div>
                            </div>

                        </form>
                        
                        	
                                 
                        <div class="row border-bottom border-dark pb-2">
                            <div class="col-md-2">ID</div>
                            <div class="col">Client</div>

                        </div>
                        <div id="clientList" class="gray-hover">
                        
		                    @foreach($user->clients->unique() as $client)

		                        <a href="{{route('clientShowUser',['clientID'=>$client->id,'userID'=>$user->id])}}">
		                        	<div class="row border-bottom p-2 hover">
		                            	<div class="col-md-2 text-color-red ">{{$client->id}}</div>
		                                <div class="col-md-8 text-dark">{{$client->name}}</div>        
		                           </div>
		                       </a>                        
		                    @endforeach
                            @if($user->clients->count() == 0)
                                <div class="row mt-4 p-2">
                                        <div class="col-md-2 text-muted ">No clients...</div>    
                                   </div>
                            @endif

		                </div>

		                
                    </div>
                </div>
                {{-- <div id="alertDelete"></div>
                <input id="clientID" type="hidden" value='{{$client->id}}'></div>
                <input id="userID" type="hidden" value='{{$user->id}}'></div>
                <input id="csrf" type="hidden" value='{{csrf_token()}}'></div> --}}
                
                    
                </div>
                

               
               
                    
               </div>
            
        </div>   
    </div>     
</div>
@endsection



