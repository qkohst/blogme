@extends('layouts.admin.master')
@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class=" breadcrumb-item text-sm text-white active" aria-current="page">{{$title}}</li>
    </ol>
</nav>
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">

        <!-- Tab Menu  -->
        <div class="card shadow-lg card-profile-bottom">
            <div class="card-body p-3">
                <div class="row gx-4">
                    <div class="col-auto">
                        <h6 class="text-uppercase mb-1">{{$title}}</h6>
                        <p class="mb-0 font-weight-bold text-sm">
                            Data Program Academy
                        </p>
                    </div>

                    <div class="col-md-8 col-lg-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                        <div class="nav-wrapper position-relative end-0">
                            <ul class="nav nav-pills nav-fill p-1" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link mb-0 px-0 py-1 active d-flex align-items-center justify-content-center " data-bs-toggle="tab" href="#academy" role="tab" aria-selected="true">
                                        <i class="icofont-group-students"></i>
                                        <span class="ms-2">Kelas</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center " data-bs-toggle="tab" href="#kategory" role="tab" aria-selected="false">
                                        <i class="icofont-layers"></i>
                                        <span class="ms-2">Ketegori</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center " data-bs-toggle="tab" href="#fasilitas" role="tab" aria-selected="false">
                                        <i class="icofont-license"></i>
                                        <span class="ms-2">Fasilitas</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center " data-bs-toggle="tab" href="#tools" role="tab" aria-selected="false">
                                        <i class="icofont-tools"></i>
                                        <span class="ms-2">Tools</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center " data-bs-toggle="tab" href="#teknologi" role="tab" aria-selected="false">
                                        <i class="icofont-architecture-alt"></i>
                                        <span class="ms-2">Teknologi</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Tab Menu  -->

        <!-- Tab Content  -->
        <div class="col-md-12 pt-4">
            <div class="tab-content">
                <!-- Tab Academy  -->
                <div class="active tab-pane" id="academy">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <h6 class="text-uppercase mb-0">Kelas Kursus</h6>
                                </div>
                                <div class="col-6 text-end">
                                    <a class="btn bg-gradient-primary mb-0" href="{{ route('academy.create') }}"><i class="icofont-plus me-2"></i>Tambah</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            @if($academies->count() == 0)
                            <hr class="horizontal dark">
                            <div class="text-center mb-2">Data kelas belum tersedia</div>
                            @else
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Kelas</th>
                                            <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Kategori</th>
                                            <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Silabus</th>
                                            <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                                            <th class="text-dark opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($academies as $academy)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="/admin-assets/img/academies/{{$academy->gambar}}" class="avatar avatar-md me-3" alt="academy image">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm" title="{{$academy->nama_kelas}}">
                                                            {!! substr(strip_tags($academy->nama_kelas), 0, 30) !!}
                                                        </h6>
                                                        <p class="text-xs text-secondary mb-0">Level : {{$academy->level}}
                                                            | Jenis Kelas : {{$academy->jenis_kelas}}
                                                            | 150 siswa
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs text-secondary mb-0">{{$academy->kategories->nama_kategori}}</p>
                                            </td>
                                            <td class="align-middle">

                                                @if($academy->count_silabus == 0)
                                                <span class="badge badge-sm bg-gradient-danger">{{$academy->count_silabus}} silabus</span>
                                                @elseif($academy->count_silabus <= 3) <span class="badge badge-sm bg-gradient-warning">{{$academy->count_silabus}} silabus</span>
                                                    @else
                                                    <span class="badge badge-sm bg-gradient-success">{{$academy->count_silabus}} silabus</span>
                                                    @endif

                                            </td>
                                            <td class="align-middle">
                                                @if($academy->status == 'on')
                                                <span class="badge badge-sm bg-gradient-success">Aktif</span>
                                                @else
                                                <span class="badge badge-sm bg-gradient-dark">Tidak Aktif</span>
                                                @endif
                                            </td>
                                            <td class="align-middle ms-auto text-center">
                                                <a class="btn btn-link text-primary px-2 mb-0" href="{{ route('academy.show', $academy->id) }}" title="Detail"><i class="icofont-eye-alt text-primary me-1" aria-hidden="true"></i>Detail</a>
                                                <a href="#" class="btn btn-link text-danger text-gradient px-2 mb-0 btn-delete" title="Hapus" data-id="{{$academy->id}}">
                                                    <form action="{{ route('academy.destroy', $academy->id) }}" method="post" id="delete{{$academy->id}}">
                                                        @csrf
                                                        @method('delete')
                                                    </form>
                                                    <i class="icofont-ui-delete me-1"></i> Hapus
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- Tab Kategory  -->
                <div class="tab-pane" id="kategory">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <h6 class="text-uppercase mb-0">Data Kategori Kursus</h6>
                                </div>
                                <div class="col-6 text-end">
                                    <a class="btn bg-gradient-primary mb-0" data-bs-toggle="modal" data-bs-target="#modalTambahKetegory"><i class="icofont-plus me-2"></i>Tambah</a>
                                </div>
                                <!-- Modal Tambah Kategory-->
                                <div class="modal fade" id="modalTambahKetegory" aria-labelledby="exampleModalLabel">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                                            </div>
                                            <form action="{{ route('kategory.academy.store') }}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <p class="text-uppercase text-sm">Kategori Academy</p>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="example-text-input" class="form-control-label">Nama Kategori</label>
                                                                <input class="form-control" type="text" name="nama_kategori" value="{{old('nama_kategori')}}" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="example-text-input" class="form-control-label">Gambar</label>
                                                                <input class="form-control" type="file" name="gambar" accept="image/png, image/jpeg" value="{{old('gambar')}}" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="example-text-input" class="form-control-label">Deskripsi</label>
                                                                <textarea class="form-control" name="deskripsi" required>{{old('deskripsi')}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            @if($kategories->count() == 0)
                            <hr class="horizontal dark">
                            <div class="text-center mb-2">Data kategori belum tersedia</div>
                            @else
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Kategori</th>
                                            <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Deskripsi</th>
                                            <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                                            <th class="text-dark opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($kategories as $kategory)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="/admin-assets/img/kategory/{{$kategory->gambar}}" class="avatar avatar-md me-3" alt="kategory image">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm text-uppercase">{{$kategory->nama_kategori}}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs text-secondary mb-0" title="{{$kategory->deskripsi}}">
                                                    {!! substr(strip_tags($kategory->deskripsi), 0, 45) !!}...
                                                </p>
                                            </td>
                                            <td class="align-middle text-sm">
                                                @if($kategory->status == "on")
                                                <span class="badge badge-sm bg-gradient-success">Aktif</span>
                                                @else
                                                <span class="badge badge-sm bg-gradient-dark">Non Aktif</span>
                                                @endif
                                            </td>
                                            <td class="align-middle ms-auto text-center">
                                                <a class="btn btn-link text-dark px-2 mb-0" data-bs-toggle="modal" data-bs-target="#modalEditKategori{{$kategory->id}}"><i class="icofont-pencil-alt-2 text-dark me-2" aria-hidden="true"></i>Edit</a>

                                                <a href="#" class="btn btn-link text-danger text-gradient px-2 mb-0 btn-delete" data-id="kategori{{$kategory->id}}">
                                                    <form action="{{ route('kategory.academy.destroy', $kategory->id) }}" method="post" id="deletekategori{{$kategory->id}}">
                                                        @csrf
                                                        @method('delete')
                                                    </form>
                                                    <i class="icofont-ui-delete me-2"></i>Hapus
                                                </a>
                                            </td>
                                        </tr>
                                        <!-- Modal Edit Kategori-->
                                        <div class="modal fade" id="modalEditKategori{{$kategory->id}}" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
                                                    </div>
                                                    <form id="formEditKategori{{$kategory->id}}" action="{{ route('kategory.academy.update', $kategory->id) }}" method="post" enctype="multipart/form-data">
                                                        {{ method_field('PATCH') }}
                                                        @csrf
                                                        <div class="modal-body">
                                                            <p class="text-uppercase text-sm">Kategori Academy</p>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="example-text-input" class="form-control-label">Nama Ketegori</label>
                                                                        <input class="form-control" type="text" name="nama_kategori" value="{{$kategory->nama_kategori}}" disabled>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="example-text-input" class="form-control-label">Deskripsi</label>
                                                                        <textarea class="form-control" name="deskripsi">{{$kategory->deskripsi}}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group form-check form-switch">
                                                                        <input class="form-check-input" type="checkbox" id="rememberMe" name="status" @if ($kategory->status == 'on') checked @endif>
                                                                        <label class="form-check-label" for="rememberMe">Aktif</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                            <a href="#" class="btn btn-primary btn-save" data-id="Kategori{{$kategory->id}}">Simpan</a>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- Tab Fasilitas  -->
                <div class="tab-pane" id="fasilitas">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <h6 class="text-uppercase mb-0">Data Fasilitas Academy</h6>
                                </div>
                                <div class="col-6 text-end">
                                    <a class="btn bg-gradient-primary mb-0" data-bs-toggle="modal" data-bs-target="#modalTambahFasilitas"><i class="icofont-plus me-2"></i>Tambah</a>
                                </div>
                            </div>
                            <!-- Modal Tambah Kategory-->
                            <div class="modal fade" id="modalTambahFasilitas" aria-labelledby="exampleModalLabel">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Fasilitas</h5>
                                        </div>
                                        <form action="{{ route('fasilitas.academy.store') }}" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <p class="text-uppercase text-sm">Fasilitas Academy</p>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="example-text-input" class="form-control-label">Nama Fasilitas</label>
                                                            <input class="form-control" type="text" name="nama_fasilitas" value="{{old('nama_fasilitas')}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="example-text-input" class="form-control-label">Icon <span> <a href="https://icofont.com/icons" target="_black">(* icofont.com)</a> </span> </label>
                                                            <input class="form-control" type="text" name="icon" placeholder="<i class=''icofont-.*''></i>" value="{{old('icon')}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="example-text-input" class="form-control-label">Deskripsi</label>
                                                            <textarea class="form-control" name="deskripsi">{{old('deskripsi')}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="horizontal dark">
                        <div class="card-body px-0 pt-0 pb-2">
                            @if($data_fasilitas->count() == 0)
                            <hr class="horizontal dark">
                            <div class="text-center mb-2">Data fasilitas belum tersedia</div>
                            @else
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <tbody>
                                        @foreach($data_fasilitas as $fasilitas)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="icon icon-shape icon-md me-3 bg-gradient-primary shadow text-center">
                                                        {!!$fasilitas->icon!!}
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm text-uppercase">{{$fasilitas->nama_fasilitas}}</h6>
                                                        <p class="text-xs text-secondary mb-0">{{$fasilitas->deskripsi}}</p>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="align-middle ms-auto text-center">
                                                <a class="btn btn-link text-dark px-2 mb-0" data-bs-toggle="modal" data-bs-target="#modalEditFasilitas{{$fasilitas->id}}"><i class="icofont-pencil-alt-2 text-dark me-2" aria-hidden="true"></i>Edit</a>

                                                <a href="#" class="btn btn-link text-danger text-gradient px-2 mb-0 btn-delete" data-id="fasilitas{{$fasilitas->id}}">
                                                    <form action="{{ route('fasilitas.academy.destroy', $fasilitas->id) }}" method="post" id="deletefasilitas{{$fasilitas->id}}">
                                                        @csrf
                                                        @method('delete')
                                                    </form>
                                                    <i class="icofont-ui-delete me-2"></i>Hapus
                                                </a>
                                            </td>
                                        </tr>
                                        <!-- Modal Edit Fasilitas-->
                                        <div class="modal fade" id="modalEditFasilitas{{$fasilitas->id}}" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Fasilitas</h5>
                                                    </div>
                                                    <form id="formEditFasilitas{{$fasilitas->id}}" action="{{ route('fasilitas.academy.update', $fasilitas->id) }}" method="post">
                                                        {{ method_field('PATCH') }}
                                                        @csrf
                                                        <div class="modal-body">
                                                            <p class="text-uppercase text-sm">Fasilitas Academy</p>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="example-text-input" class="form-control-label">Nama Fasilitas</label>
                                                                        <input class="form-control" type="text" name="nama_fasilitas" value="{{$fasilitas->nama_fasilitas}}" disabled>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="example-text-input" class="form-control-label">Icon <span> <a href="https://icofont.com/icons" target="_black">(* icofont.com)</a> </span> </label>
                                                                        <input class="form-control" type="text" name="icon" placeholder="<i class=''icofont-.*''></i>" value="{{$fasilitas->icon}}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="example-text-input" class="form-control-label">Deskripsi</label>
                                                                        <textarea class="form-control" name="deskripsi">{{$fasilitas->deskripsi}}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                            <a href="#" class="btn btn-primary btn-save" data-id="Fasilitas{{$fasilitas->id}}">Simpan</a>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- Tab Tools  -->
                <div class="tab-pane" id="tools">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <h6 class="text-uppercase mb-0">Data Tools Belajar</h6>
                                </div>
                                <div class="col-6 text-end">
                                    <a class="btn bg-gradient-primary mb-0" data-bs-toggle="modal" data-bs-target="#modalTambahTools"><i class="icofont-plus me-2"></i>Tambah</a>
                                </div>
                            </div>
                            <!-- Modal Tambah Tools-->
                            <div class="modal fade" id="modalTambahTools" aria-labelledby="exampleModalLabel">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Tools</h5>
                                        </div>
                                        <form action="{{ route('tools.academy.store') }}" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <p class="text-uppercase text-sm">Tools Belajar</p>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="example-text-input" class="form-control-label">Nama Tools</label>
                                                            <input class="form-control" type="text" name="nama_tool" value="{{old('nama_tool')}}">
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
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="horizontal dark">
                        <div class="card-body px-0 pt-0 pb-2">
                            @if($tools->count() == 0)
                            <div class="text-center mb-2">Data tools belum tersedia</div>
                            @else
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <tbody>
                                        @foreach($tools as $tool)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="icon icon-shape icon-md me-3 bg-gradient-primary shadow text-center">
                                                        {!!$tool->icon!!}
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{$tool->nama_tool}}</h6>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="align-middle ms-auto text-center">
                                                <a href="#" class="btn btn-link text-danger text-gradient px-2 mb-0 btn-delete" data-id="tool{{$tool->id}}">
                                                    <form action="{{ route('tools.academy.destroy', $tool->id) }}" method="post" id="deletetool{{$tool->id}}">
                                                        @csrf
                                                        @method('delete')
                                                    </form>
                                                    <i class="icofont-ui-delete me-2"></i>Hapus
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- Tab Teknologi  -->
                <div class="tab-pane" id="teknologi">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <h6 class="text-uppercase mb-0">Data Teknologi Belajar</h6>
                                </div>
                                <div class="col-6 text-end">
                                    <a class="btn bg-gradient-primary mb-0" data-bs-toggle="modal" data-bs-target="#modalTambahTeknologi"><i class="icofont-plus me-2"></i>Tambah</a>
                                </div>
                            </div>
                            <!-- Modal Tambah Teknologi-->
                            <div class="modal fade" id="modalTambahTeknologi" aria-labelledby="exampleModalLabel">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Tools</h5>
                                        </div>
                                        <form action="{{ route('technology.academy.store') }}" method="post">
                                            @csrf
                                            <div class="modal-body">
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
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="horizontal dark">
                        <div class="card-body px-0 pt-0 pb-2">
                            @if($technologies->count() == 0)
                            <div class="text-center mb-2">Data teknologi belum tersedia</div>
                            @else
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <tbody>
                                        @foreach($technologies as $technology)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="icon icon-shape icon-md me-3 bg-gradient-primary shadow text-center">
                                                        {!!$technology->icon!!}
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{$technology->nama_teknologi}}</h6>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="align-middle ms-auto text-center">
                                                <a href="#" class="btn btn-link text-danger text-gradient px-2 mb-0 btn-delete" data-id="technology{{$technology->id}}">
                                                    <form action="{{ route('technology.academy.destroy', $technology->id) }}" method="post" id="deletetechnology{{$technology->id}}">
                                                        @csrf
                                                        @method('delete')
                                                    </form>
                                                    <i class="icofont-ui-delete me-2"></i>Hapus
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Tab Content  -->

    </div>

    @endsection

    @section('scripts')
    <!-- Sweet Alert -->
    <script src="/admin-assets/js/plugins/sweetalert/sweetalert.min.js"></script>

    <script>
        //== Class definition
        var SweetAlert2Demo = function() {
            //== Demos
            var initDemos = function() {

                $('.btn-delete').click(function(e) {
                    id = e.target.dataset.id;
                    swal({
                        title: 'Apakah anda yakin ?',
                        text: "Hapus data secara permanen !",
                        type: 'warning',
                        buttons: {
                            confirm: {
                                text: 'Hapus',
                                className: 'btn bg-gradient-primary'
                            },
                            cancel: {
                                visible: true,
                                text: 'Batal',
                                className: 'btn btn-outline-danger'
                            }
                        }
                    }).then((Delete) => {
                        if (Delete) {
                            $(`#delete${id}`).submit();
                        } else {
                            swal.close();
                        }
                    });
                });
                $('.btn-save').click(function(e) {
                    id = e.target.dataset.id;
                    swal({
                        title: 'Apakah anda yakin ?',
                        text: "Simpan perubahan data !",
                        type: 'warning',
                        buttons: {
                            confirm: {
                                text: 'Simpan',
                                className: 'btn bg-gradient-primary'
                            },
                            cancel: {
                                visible: true,
                                text: 'Batal',
                                className: 'btn btn-outline-danger'
                            }
                        }
                    }).then((Delete) => {
                        if (Delete) {
                            $(`#formEdit${id}`).submit();
                        } else {
                            swal.close();
                        }
                    });
                });
            };
            return {
                //== Init
                init: function() {
                    initDemos();
                },
            };
        }();
        //== Class Initialization
        jQuery(document).ready(function() {
            SweetAlert2Demo.init();
        });
    </script>
    @endsection