@extends('layouts.admin.master')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header pb-0">
                <h6 class="text-uppercase">{{$title}}</h6>
            </div>
            <form action="{{ route('technology.academy.store') }}" method="post">
                @csrf
                <div class="card-body pt-2">
                    <p class="text-uppercase text-sm">Teknologi Belajar</p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nama Teknologi</label>
                                <input class="form-control" type="text" name="nama_teknologi" value="{{old('nama_teknologi')}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Icon <span> <a href="https://icofont.com/icons" target="_black">(* icofont.com)</a> </span> </label>
                                <input class="form-control" type="text" name="icon" placeholder="<i class=''icofont-.*''></i>" value="{{old('icon')}}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer pt-0 pb-2">
                    <button class="btn bg-gradient-primary btn-sm ms-auto" type="submit">Simpan</button>
                    <a href="{{ route('academy.index') }}" class="btn btn-outline-primary btn-sm ms-auto">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection