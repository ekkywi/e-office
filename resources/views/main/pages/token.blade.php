@extends("main.layouts.main")
@section("title")
    Token {!! "&mdash;" !!} E-Office
@endsection
@section("content")
    <section class="section">
        <div class="section-header">
            <h1>Token</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ url("dashboard") }}">E-Office</a></div>
                <div class="breadcrumb-item"><a href="{{ url("maintenance") }}">Maintenance</a></div>
                <div class="breadcrumb-item active">Token</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Token</h4>
                            <div class="card-header-form">
                                <form>
                                    <div class="input-group">
                                        <input class="form-control" placeholder="Search" type="text">
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-md text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($users as $index => $user)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $user->nama }}</td>
                                        <td>
                                            <button class= "btn btn-info btn-lihat-token" data-id="{{ $user->id }}" data-nama="{{ $user->nama }}" data-token="{{ $user->token }}">
                                                <i class="fas fa-eye"></i>
                                                <span>Lihat</span>
                                            </button>
                                            <button class="btn btn-primary btn-generate-token" data-id="{{ $user->id }}" data-nama="{{ $user->nama }}" data-token="{{ $user->token }}">
                                                <i class="fas fa-key"></i>
                                                <span>Generate</span>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Modal Lihat Token --}}
    <div class="modal fade" id="modal-lihat-token" role="dialog" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Lihat Token</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="lihat-nama">Nama</label>
                        <input class="form-control" id="lihat-nama" readonly type="text">
                    </div>
                    <div class="form-group">
                        <label for="lihat-token">Token</label>
                        <input class="form-control" id="lihat-token" readonly type="text">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" data-dismiss="modal" type="button">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("script")
    {{-- General JavaScript Script --}}
    <script src="{{ asset("modules/jquery/jquery.min.js") }}"></script>
    <script src="{{ asset("modules/popper/popper.js") }}"></script>
    <script src="{{ asset("modules/tooltip/tooltip.js") }}"></script>
    <script src="{{ asset("modules/bootstrap/js/bootstrap.min.js") }}"></script>
    <script src="{{ asset("modules/nicescroll/jquery.nicescroll.min.js") }}"></script>
    <script src="{{ asset("modules/moment/moment.min.js") }}"></script>
    <script src="{{ asset("js/stisla.js") }}"></script>
    {{-- JavaScript Libraries --}}
    <script src="{{ asset("modules/sweetalert/sweetalert.min.js") }}"></script>
    {{-- Template JavaScript Script --}}
    <script src="{{ asset("js/scripts.js") }}"></script>
    <script src="{{ asset("js/custom.js") }}"></script>
    {{-- Function Script --}}

    <script>
        $(document).ready(function() {
            $(".btn-lihat-token").click(function() {
                let id = $(this).data("id");
                let nama = $(this).data("nama");
                let token = $(this).data("token");
                $("#lihat-nama").val(nama);
                $("#lihat-token").val(token);
                $("#modal-lihat-token").modal("show");
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $(".btn-generate-token").click(function() {
                let id = $(this).data("id");
                let nama = $(this).data("nama");
                let url = "{{ url("maintenance/token") }}";
                swal({
                    title: "Generate Token",
                    text: "Apakah Anda yakin ingin mengenerate token untuk " + nama + "?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willGenerate) => {
                    if (willGenerate) {
                        $.ajax({
                            url: url,
                            type: "POST",
                            data: {
                                user_id: id,
                                _token: "{{ csrf_token() }}"
                            },
                            success: function(response) {
                                swal("Token berhasil digenerate!", {
                                    icon: "success",
                                }).then(() => {
                                    location.reload();
                                });
                            },
                            error: function(xhr) {
                                swal("Terjadi kesalahan!", {
                                    icon: "error",
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
