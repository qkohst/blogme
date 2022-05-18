@extends('layouts.auth.master')
@section('content')
<div class="card card-plain">
    <div class="card-header pb-0 text-start">
        <h4 class="font-weight-bolder">Daftar</h4>
        <p class="mb-0">Masukkan data diri anda</p>
    </div>

    <div class="card-body">
        <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="mb-2">
                <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" placeholder="Name" aria-label="Name" name="name" value="{{old('name')}}">
                @error('name')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-2">
                <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" placeholder="Email" aria-label="Email" name="email" value="{{old('email')}}">
                @error('email')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-2">
                <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="Password" aria-label="Password" name="password">
                @error('password')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-2">
                <input type="password" class="form-control form-control-lg @error('confirm_password') is-invalid @enderror" placeholder="Confirm Password" aria-label="Confirm Password" name="confirm_password">
                @error('confirm_password')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-check form-check-info text-start">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked required>
                <label class="form-check-label" for="flexCheckDefault">
                    Saya setuju dengan <a href="javascript:;" class="text-dark font-weight-bolder">syarat & ketentuan</a>
                </label>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-3 mb-0">Daftar</button>
            </div>
        </form>
    </div>
    <div class="card-footer text-center pt-0 px-lg-2 px-1">
        <p class="mb-0 text-sm mx-auto">
            Sudah punya akun ?
            <a href="{{ route('login') }}" class="text-primary text-gradient font-weight-bold">Masuk</a>
        </p>
    </div>

</div>
@endsection