@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card dark-color-card col-md-10">
            <div class="card-body">
                <div class="m-2 text-color-red-hover">
                    <div class="row">
                        <div class="col-md-12">
                            
                            <h1 class="display-5 text-color-red">Edit role</h1>
                            <form action="{{route('updateRole', $role->id)}}"method="post">
                                @csrf
                                 @method('PATCH')
                            	<div class="form-group pt-2">
                            		<label for="name" >Name:</label>
                            		<input type="text" class="form-control" name = "name" value="{{$role->name}}">
                            		<small class="form-text text-muted">Please chooose a unique name</small>
                            	</div>
                            	<div class="form-group">
                            		<label for="description" >Description:</label>
                            		<textarea class="form-control" name = "description" rows="5" >{{$role->description}}</textarea>
                            	</div>
                                <div class="row justify-content-center">
                                    <div class="col-4 text-right">
                                    <button class="btn col-md-6 text-center dark-btn m-1" type="submit">Confirm</button>
                            </form>
                                    </div>
                                    <div class="col-4">
                                        <form action="{{route('showRole', $role->id)}}">
                                             <button class="btn btn-secondary col-md-6 text-center m-1" type="submit">Cancel</button>
                                        </form>
                                    </div>  
                                </div>
                           		

                            <div class="row text-center mt-2">
                                <div class="col">
                                    <button class="btn btn-red"> Delete</button>
                                </div>
                            </div>
                        </div>
                            	
                            	
                            
                        </div>
                    </div>
                </div>
            </div>            
        </div>   
    </div>     
</div>
@endsection



