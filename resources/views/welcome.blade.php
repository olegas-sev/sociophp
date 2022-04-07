@extends('layouts.master')

@section('title')
    Welcome!
@endsection


@section('content')
    @include('includes.message-block')
    <div class="row mt-2">
        <div class="col-md-6">
            <h3>Sign Up</h3>
            <form class="needs-validation" action="{{ route('signup') }}" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" id="email" value="{{ Request::old('email') }}">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="first_name" class="form-label">Name</label>
                    <input type="text" name="first_name" class="form-control {{ $errors->has('first_name') ? 'is-invalid' : ''}}" id="first_name" value="{{ Request::old('first_name') }}">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}" name="password" id="password" value="{{ Request::old('password') }}">
                </div>
{{--                <div class="mb-3 form-check">--}}
{{--                    <input type="checkbox" class="form-check-input" id="check">--}}
{{--                    <label class="form-check-label" for="check">Check me out</label>--}}
{{--                </div>--}}
                <button type="submit" class="btn btn-primary">Sign Up</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
        <div class="col-md-6">
            <h3>Sign In</h3>
            <form action="{{ route('signin') }}" method="post">
                <div class="mb-3">
                    <label for="emailLogin" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" id="emailLogin" value="{{ Request::old('email') }}">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="passwordLogin" class="form-label">Password</label>
                    <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}" id="passwordLogin" name="password" value="{{ Request::old('password') }}">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>
@endsection
