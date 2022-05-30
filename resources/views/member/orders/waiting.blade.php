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
                    <td>
                        <div class="row">
                            <div class="col-lg-2 d-none d-lg-block">
                                <img src="/admin-assets/img/academies/{{$pesanan->academies->gambar}}" class="rounded" alt="Images" height="105px">
                            </div>
                            <div class="col-lg-10">
                                <p class="my-1"><a href="{{ route('courses.show', $pesanan->academies_id) }}" title="Lihat detail kelas">{{$pesanan->academies->nama_kelas}}</a></p>
                                <p class="mt-1">{!! substr(strip_tags($pesanan->academies->deskripsi), 0, 60) !!} ...</p>

                                @if(is_null($pesanan->bukti_transfer))
                                <a href="#" class="btn btn-dark btn-sm mr-1" title="Upload Bukti Pembayaran" data-bs-toggle="modal" data-bs-target="#modalUpload{{$pesanan->id}}"><i class="icofont-upload-alt"></i> Upload</a>

                                <a href="#" class="btn btn-outline-danger btn-sm btn-delete" title="Hapus Pesanan" data-id="{{$pesanan->id}}">
                                    <form action="{{ route('orders.destroy', $pesanan->id) }}" method="post" id="delete{{$pesanan->id}}">
                                        @csrf
                                        @method('delete')
                                    </form>
                                    <i class="icofont-ui-delete"></i> Hapus
                                </a>
                                @else
                                <span class="badge badge-info"><i class="icofont-spinner"></i> Proses Verifikasi</span>
                                @endif
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