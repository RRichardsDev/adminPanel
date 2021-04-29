@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><h2><span class="airal-bold">Create</span><span class="text-color-red"> User</span></h2></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('createUser') }}">
                        @csrf

                        <div class="form-group m-1 mb-4">
                            <label class="py-1"for="name" >Name</label>
                            <input id="name" name="name"type="text" class="form-control" placeholder="Example Person">
                            <label class="py-1"for="selectedStatus">Status</label>
                                <select class="form-control" name="status" id="selectedStatus">
                                    <option disabled selected>Select</option>
                                    @foreach($statuses as $status)
                                        <option value={{$status->id}}>{{$status->name}}</option>
                                    @endforeach
                                </select>          
                            <label class="py-1"for="email">Email</label>
                                <input id="email" type="email" name="email" class="form-control " required autocomplete="email" placeholder="example@email.com">
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label for="password">{{ __('Password') }}</label>
                                <input id="password" name="password"type="password" class="form-control" name="password" required autocomplete="new-password" placeholder="">
                            </div>
                            <div class="col-md-6">
                                <label for="password-confirm" >{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row p-4">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-red col-md-2">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
