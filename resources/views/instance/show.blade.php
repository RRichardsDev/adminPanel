@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card col-md-10">
            <div class="card-body">

                <h1><a href="{{route('editClient', $instance->client->id)}}">{{$instance->client->name}}</a></h1>
                <div class="row mt-4">
                    
                <table class="table">
                	<thead>
                		<tr>
                			<th scope="col">ID</th>
                			<th scope="col"> name </th>
	                		<th scope="col"> Admin </th>
	                		<th scope="col"> Role </th>
	                		<th scope="col">  </th>
	                		
                		</tr>                	
                	</thead>
                    <h3>Team Members:</h3>
                	<tbody>
                		@foreach($users as $user)
                			<tr>
                				<th scope="row">{{$user->id}}</th>
                				<td>
                					{{$user->name}}
                				</td>
                				<td class="text-center">
                					<input type="radio" class='form-check-input' checked disabled="true">
                				</td>
                				<td>
                					<input type="radio" class='form-check-input' disabled="ture">
                				</td>
                				<td>
                					<input type="radio" class='form-check-input' checked disabled="true">
                				</td>
                				

                				
                			</tr>
                		@endforeach

                	</tbody>
                		
                </table>
                   
                

            </div>
        </div>   
    </div>     
</div>
@endsection
