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

                        <div class="form-group m-1 row mb-4">
                            <div class="col-md-5">
                                <label for="name" class="">{{ __('Name') }}</label>                            
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-7">
                                <label for="email" class="">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                                              
                        </div>

                        <div class="form-group m-1 row mb-4">
                            <div class="col-md-6">
                                <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
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
