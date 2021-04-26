@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card dark-color-card">
                <div class="card-header"><h2><span id="contour">Contour</span> Clients</h2></div>

                <div class="card-body">

                <div class="container-fluid ">
                    
                  	<div class="row border-bottom pb-2">
	                        <div class="col-md-2">ID</div>
	                        <div class="col">Client</div>

                    </div>
                    
                    <div id="clientList" >
                        
                         @foreach($clients as $client)
  
                            <a href="{{route('showClient',$client->id)}}"><div class="row border-bottom p-2 hover">
                            	<div class="col-md-2 text-white ">{{$client->id}}</div>
                                <div class="col ">{{$client->name}}</div>        
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
