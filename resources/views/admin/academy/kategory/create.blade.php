@extends('layouts.admin.master')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header pb-0">
                <h6 class="text-uppercase">{{$title}}</h6>
            </div>
            <form action="{{ route('kategory.academy.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body pt-2">
                    <p class="text-uppercase text-sm">Kategori Academy</p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nama Kategori</label>
                                <input class="form-control" type="text" name="nama_kategori" value="{{old('nama_kategori')}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Gambar</label>
                                <input class="form-control" type="file" name="gambar" accept="image/png, image/jpeg" value="{{old('gambar')}}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Deskripsi</label>
                                <textarea class="form-control" name="deskripsi">{{old('deskripsi')}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="rememberMe" name="status" checked>
                                <label class="form-check-label" for="rememberMe">Aktif</label>
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