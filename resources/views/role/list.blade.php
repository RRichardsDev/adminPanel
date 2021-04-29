@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card dark-color-card">
                <div class="card-header"><h2><span class="airal-bold">Contour</span><span class="text-color-red"> Roles</span></h2></div>

                <div class="card-body pt-0">
                <div class="container-fluid ">

                                                
                        
                        <form id="seachClients">
                        @csrf
                           <div class="mb-4 input-group form-group mt-2 pt-2 ">                            
                                <input id="roleSearchQuery" type="text" class="form-control" placeholder="Search....">
                                <button id= "searchRoles" class=" btn-red btn  input-group-append">Search</button></a>
                        </form>
                                @if(Auth::user()->admin)
                                    <form action="{{route('createRole')}}">
                                        <button class="btn btn-red ml-1 input-group-append">Create Role</button>
                                    </form>
                                @endif 
                            </div>
                        

                        <div class="row border-bottom border-dark px-2 pb-2">
                            <div class="row col-md-12 p-2 mr-0">
                                <div class="col-md-1">ID</div>
                                <div class="col-md-10 ">Name</div>                         
                            </div>
                       
                    </div>
                    
                     
                    
                    
                    
                        
                        <div id="roleList" class="gray-hover" >
                        
                            @foreach($roles as $role)
      
                                <a href="{{route('showRole', $role->id)}}">
                                    <div class="row border-bottom p-2 hover">
                                        <div class="col-md-1 text-color-red">{{$role->id}}</div>
                                        <div class="col-md-10 text-dark">{{$role->name}}</div>
                                       
                                   </div>
                               </a>                        
                               
                            @endforeach
                        </div>


                        
                    </div>
                    <input id="csrf" type="hidden" value='{{csrf_token()}}'></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
