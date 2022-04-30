@extends('layouts.auth.master')
@section('content')
<div class="card card-plain">
    <div class="card-header pb-0 text-start">
        <h4 class="font-weight-bolder">401 - Error</h4>
        <h5 class="mb-0">Unauthorized</h5>
        <p class="mb-0">Sorry the user does not have access to the URL you requested.</p>

    </div>
    <div class="card-body">
        <div class="text-center">
            <a href="{{ route('dashboard') }}" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Back To Dashboard</a>
        </div>
    </div>

</div>
@endsection