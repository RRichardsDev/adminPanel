@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if($alert)<div id="alertBox" class="card mb-2  p-1 alert alert-success text-center none" >{{$alert}}</div>@endif
            <div class="card dark-color-card">
                <div class="card-header"><h2><span class="airal-bold">Contour</span><span class="text-color-red"> Clients</span></h2></div>                
                <div class="card-body">

                <div class="container-fluid ">
                    <form id="seachClients" >
                        @csrf
                       <div class="mb-4 input-group form-group">                            
                            <input id="clientSearchQuery" type="text" class="form-control" placeholder="Search....">
                            <button id= "searchClients" class=" btn-red btn  input-group-append">Search</button></a>
                       </div>
                    </form>
                    
                  	<div class="row border-bottom border-dark px-2 pb-2">
	                        <div class="col-md-3">ID</div>
	                        <div class="col-md-8">Client</div>

                    </div>
                    
                    <div id="clientList" class="gray-hover" >
                        
                         @foreach($clients as $client)
  
                            <a href="{{route('showClient',$client->id)}}"><div class="row border-bottom p-2 hover">
                            	<div class="col-md-3 text-color-red">{{$client->id}}</div>
                                <div class="col-md-8 text-dark">{{$client->name}}</div>        
                           </div></a>                        
                           
                        @endforeach
                    </div>
                    <input type="hidden"id="csrf" value='{{csrf_token()}}'></div>      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
