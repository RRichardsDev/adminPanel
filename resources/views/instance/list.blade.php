@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><h2><span id="contour">Contour</span> Instances</h2></div>

                <div class="card-body">
                <div class="container-fluid ">
                    <form method="post" action="{{route('createInstance')}}">
                        @csrf
                       <div class="mb-4 input-group">
                            <select class="custom-select" name="selectedClient">
                                @foreach($clients as $client)
                                    <option value={{$client->id}}>{{$client->name}}</option>
                                @endforeach
                            </select> 
                           <button class="btn btn-primary input-group-append" type="submit">Create Instance</button></a>
                       </div>
                    </form>
                  	<div class="row border-bottom pb-2">
	                        <div class="col-md-2">ID</div>
	                        <div class="col">Client</div>

                    </div>
                    
                    <div id="instanceList" >
                        
                         @foreach($instances as $instance)
  
                            <a href="{{route('instance',$instance->id)}}"><div class="row border-bottom p-2">
                            	<div class="col-md-2 ">{{$instance->id}}</div>
                                <div class="col ">{{-- {{$instance->client->name}} --}}</div>        
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
