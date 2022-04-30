@extends('layouts.auth.master')
@section('content')
<div class="card card-plain">
    <div class="card-header pb-0 text-start">
        <h4 class="font-weight-bolder">Login</h4>
        <p class="mb-0">Enter your email and password to login</p>
    </div>
    <div class="card-body">
        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="mb-3">
                <input type="email" class="form-control form-control-lg" placeholder="Email" aria-label="Email" name="email">
            </div>
            <div class="mb-3">
                <input type="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" name="password">
            </div>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="rememberMe">
                <label class="form-check-label" for="rememberMe">Remember me</label>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Login</button>
            </div>
        </form>
    </div>
    <div class="card-footer text-center pt-0 px-lg-2 px-1">
        <p class="mb-4 text-sm mx-auto">
            Don't have an account?
            <a href="{{ route('register') }}" class="text-primary text-gradient font-weight-bold">Register</a>
        </p>
    </div>
</div>
@endsection