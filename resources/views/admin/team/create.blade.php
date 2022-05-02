@extends('layouts.admin.master')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header pb-0">
                <h6 class="text-uppercase">{{$title}}</h6>
            </div>
            <form action="{{ route('team.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body pt-2">
                    <p class="text-uppercase text-sm">Identitas Tim</p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nama Lengkap</label>
                                <input class="form-control" type="text" name="nama_lengkap" value="{{old('nama_lengkap')}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Email</label>
                                <input class="form-control" type="email" name="email" value="{{old('email')}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Posisi</label>
                                <input class="form-control" type="text" name="posisi" value="{{old('posisi')}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Mulai Bekerja</label>
                                <input class="form-control" type="date" name="mulai_bekerja" value="{{old('mulai_bekerja')}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Foto Profil</label>
                                <input class="form-control" type="file" name="foto_profil" accept="image/png, image/jpeg" value="{{old('foto_profil')}}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Deskripsi Pekerjaan</label>
                                <textarea class="form-control" name="deskripsi">{{old('deskripsi')}}</textarea>
                            </div>
                        </div>
                    </div>

                    <hr class="horizontal dark">
                    <p class="text-uppercase text-sm">Link Sosial Media</p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Twitter</label>
                                <input class="form-control" type="url" pattern="https://.*" name="twitter" placeholder="https://twitter.com/username" value="{{old('twitter')}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Facebook</label>
                                <input class="form-control" type="url" pattern="https://.*" name="facebook" placeholder="https://web.facebook.com/username" value="{{old('facebook')}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Instagram</label>
                                <input class="form-control" type="url" pattern="https://.*" name="instagram" placeholder="https://www.instagram.com/username" value="{{old('instagram')}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">LinkedIn</label>
                                <input class="form-control" type="url" pattern="https://.*" name="linkedin" placeholder="https://www.linkedin.com/in/username" value="{{old('linkedin')}}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer pt-0 pb-2">
                    <button class="btn bg-gradient-primary btn-sm ms-auto" type="submit">Simpan</button>
                    <a href="{{ route('team.index') }}" class="btn btn-outline-primary btn-sm ms-auto">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection