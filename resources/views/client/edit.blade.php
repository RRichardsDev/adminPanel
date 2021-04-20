@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card col-md-5">

            <div class="card-body">
                <h1>Edit Client</h1>
                <div class="row"></div>
                    <form method="post" action="{{route('updateClient', $client->id)}}">
                        @csrf
                        <div class="form-group m-2">
                            
                                <input class="form-control m-2" type="text" name="name" placeholder="{{$client->name}}">
                                <input class="form-control m-2" type="number" name="phone" placeholder="{{$client->phone}}">
                                <input class="form-control m-2" type="email" name="email" placeholder="{{$client->email}}">
                                <input class="form-control m-2" type="text"  name="address_1" placeholder={{$client->address_1}}>
                                <input class="form-control m-2" type="text"  name="address_2" placeholder="{{$client->address_2}}">
                                <input class="form-control m-2" type="text"  name="address_postcode" placeholder="{{$client->address_postcode}}">
                            
                            <div class="row justify-content-center mt-4">
                                <button type="submit" class='btn btn-primary justify-content-center col-md-3'>Update</button>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>   
    </div>     
</div>
@endsection
