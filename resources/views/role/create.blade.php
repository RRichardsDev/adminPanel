@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                    <h2 ><span class="airal-bold">Create</span><span class="text-color-red"> Role</span></h2>
                </div>
            <div class="card-body">
                
                
                <div class="m-2 text-color-red-hover">
                    <div class="row">
                        <div class="col-md-12">
                            
                            <form class="needs-validation" action="{{route('storeRole')}}" novalidate>
                                @csrf
                            	<div class="form-group">

                            		<label for="name" >Name:</label>
                            		<input type="text" class="form-control" name = "name" placeholder="Role name..." required>
                            		@error('name')
                                    <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                            	</div>
                            	<div class="form-group">
                            		<label for="description" >Description:</label>
                            		<textarea class="form-control" required name = "description" rows="5" placeholder="Enter a decription of the role...."></textarea>
                                    @error('description')
                                    <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                            	</div>
                           		<div class="text-center col-md-12 p-2">
                                 	<button class="btn btn-red col-md-4 text-center" type="submit">Confirm</button>
                            	</div>
                            	
                            	
                            </form>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
        </div>
    </div>     
</div>
@endsection



