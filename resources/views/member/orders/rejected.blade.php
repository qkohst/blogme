@extends('member.orders.orders-nav')


@section('pages')

<div class="card">
    <div class="card-header text-lg">
        {{$title}}
    </div>

    <div class="card-body p-3">
        @if($pesanan_kelas->count() == 0)
        <div class="text-center mb-2">Pesanan belum tersedia</div>
        @else
        <table class="table">
            <thead>
                <tr class="main-hading">
                    <th>DETAIL PESANAN</th>
                    <th>TOTAL</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pesanan_kelas as $pesanan)
                <tr>
                    <td class="me-1">
                        <div class="row">
                            <div class="col-lg-2 d-none d-lg-block">
                                <img src="/admin-assets/img/academies/{{$pesanan->academies->gambar}}" class="rounded" alt="Images" height="90px">
                            </div>
                            <div class="col-lg-10">
                                <div class="row">
                                    <div class="col-12">
                                        <p class="mb-1"><a href="{{ route('courses.show', $pesanan->academy_id) }}" title="Lihat detail kelas">{{$pesanan->academies->nama_kelas}}</a></p>
                                        <small class="float-left text-dark mr-2"><i class="icofont-clock-time"></i> {{round($pesanan->academies->silabus_academies->sum('waktu_belajar')/60)}} Jam Belajar</small>
                                        <small class="float-left text-dark mr-2"><i class="icofont-chart-histogram"></i> {{$pesanan->academies->level}}</small>
                                        <small class="float-left text-dark mr-2"><i class="icofont-layers"></i> {{$pesanan->academies->kategories->nama_kategori}}</small>
                                        <small class="float-left text-dark mr-2"> Diperbarui : {{$pesanan->updated_at->diffForHumans()}}</small> <br>

                                        <span class="badge badge-warning">{{$pesanan->catatan_verifikasi}}</span>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-12">
                                        <a href="#" class="btn btn-dark btn-sm mt-1 mr-1" title="Upload Bukti Pembayaran" data-bs-toggle="modal" data-bs-target="#modalUpload{{$pesanan->id}}"><i class="icofont-upload-alt"></i> Upload Ulang</a>

                                        <a href="#" class="btn btn-outline-danger btn-sm mt-1 btn-delete" title="Hapus Pesanan" data-id="{{$pesanan->id}}">
                                            <form action="{{ route('orders.destroy', $pesanan->id) }}" method="post" id="delete{{$pesanan->id}}">
                                                @csrf
                                                @method('delete')
                                            </form>
                                            <i class="icofont-ui-delete"></i> Hapus
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td data-title="Price"><span>Rp.{{$pesanan->academies->biaya}} </span></td>
                </tr>

                <!-- Modal Upload -->
                <div class="modal fade" id="modalUpload{{$pesanan->id}}" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                Upload Bukti Pembayaran
                            </div>
                            <form id="formUpload{{$pesanan->id}}" action="{{ route('orders.update', $pesanan->id) }}" method="post" enctype="multipart/form-data">
                                {{ method_field('PATCH') }}
                                @csrf
                                <div class="modal-body">
                                    <div class="row">
                                        <div id="divImageMediaPreview{{$pesanan->id}}" class="col-lg-12">
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="align-text-bottom">
                                                <div class="file-drop-area">
                                                    <span class="choose-file-button">Pilih File</span>
                                                    <span class="file-message">atau seret dan lepas file di sini</span>
                                                    <input type="file" class="file-input" name="bukti_transfer" accept="image/png, image/jpeg" data-id="{{$pesanan->id}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-dark">Upload</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach

            </tbody>
        </table>
        @endif
    </div>

</div>

@endsection

@section('page_scripts')
<!-- bootstrap -->
<script src="/admin-assets/js/core/bootstrap.min.js"></script>
<!-- Sweet Alert -->
<script src="/admin-assets/js/plugins/sweetalert/sweetalert.min.js"></script>

<script>
    $(document).on('change', '.file-input', function(e) {
        id = e.target.dataset.id;

        var filesCount = $(this)[0].files.length;

        var textbox = $(this).prev();

        if (filesCount === 1) {
            var fileName = $(this).val().split('\\').pop();
            textbox.text(fileName);
        } else {
            textbox.text(filesCount + ' files selected');
        }



        if (typeof(FileReader) != "undefined") {
            var dvPreview = $(`#divImageMediaPreview${id}`);
            dvPreview.html("");
            $($(this)[0].files).each(function() {
                var file = $(this);
                var reader = new FileReader();
                reader.onload = function(e) {
                    var img = $("<img />");
                    img.attr("style", "width: 100%; border-radius: 0.25rem;");
                    img.attr("src", e.target.result);
                    dvPreview.append(img);
                }
                reader.readAsDataURL(file[0]);
            });
        } else {
            alert("This browser does not support HTML5 FileReader.");
        }


    });

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
                            className: 'btn btn-dark'
                        },
                        cancel: {
                            visible: true,
                            text: 'Batal',
                            className: 'btn btn-outline-dark'
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