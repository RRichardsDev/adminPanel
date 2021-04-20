@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card col-md-5">

            <div class="card-body">
                <h1>Create Client</h1>
                <div class="row"></div>
                    <form method="post" action="{{route('createClient')}}">
                        @csrf
                        <div class=" form-group m-2">
                            
                                <input class="form-control m-2" type="text" name="name" placeholder="Name">
                                <input class="form-control m-2" type="number" name="phone" placeholder="Phone Number">
                                <input class="form-control m-2" type="email" name="email" placeholder="Email">
                                <input class="form-control m-2" type="text"  name="address_1" placeholder="Address Line 1">
                                <input class="form-control m-2" type="text"  name="address_2" placeholder="Address Line 2">
                                <input class="form-control m-2" type="text"  name="address_postcode" placeholder="Postcode">
                            
                            <div class="row justify-content-center mt-4">
                                <button type="submit" class='btn btn-primary justify-content-center col-md-3'>Create</button>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>   
    </div>     
</div>
@endsection
