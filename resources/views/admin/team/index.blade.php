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
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-6 d-flex align-items-center">
                        <h6 class="text-uppercase mb-0">{{$title}}</h6>
                    </div>
                    <div class="col-6 text-end">
                        <a class="btn bg-gradient-primary mb-0" href="{{ route('team.create') }}"><i class="icofont-plus me-2"></i>Tambah</a>
                    </div>
                </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                @if($teams->count() == 0)
                <hr class="horizontal dark">
                <div class="text-center mb-2">Data team belum tersedia</div>
                @else
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Identitas</th>
                                <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Posisi</th>
                                <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Mulai Bekerja</th>
                                <th class="text-dark opacity-7"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($teams as $team)
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div>
                                            <img src="/admin-assets/img/teams/{{$team->foto_profil}}" class="avatar avatar-sm me-3" alt="team image">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm text-uppercase">{{$team->nama_lengkap}}</h6>
                                            <p class="text-xs text-secondary mb-0">{{$team->email}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-xs text-secondary mb-0">{{$team->posisi}}</p>
                                </td>
                                <td class="align-middle">
                                    <span class="text-secondary text-xs font-weight-bold">{{$team->mulai_bekerja}}</span>
                                </td>
                                <td class="align-middle ms-auto text-center">
                                    <a class="btn btn-link text-dark px-2 mb-0" href="{{ route('team.edit', $team->id) }}"><i class="icofont-pencil-alt-2 text-dark me-2" aria-hidden="true"></i>Edit</a>

                                    <a href="#" class="btn btn-link text-danger text-gradient px-2 mb-0 btn-delete" data-id="{{$team->id}}">
                                        <form action="{{ route('team.destroy', $team->id) }}" method="post" id="delete{{$team->id}}">
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