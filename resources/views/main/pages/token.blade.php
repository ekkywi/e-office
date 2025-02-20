@extends("main.layouts.main")
@section("title")
    Token {!! "&mdash;" !!} E-Office
@endsection
@section("content")
    <section class="section">
        <div class="section-header">
            <h1>Token</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ url("dashboard") }}"><i class="fas fa-rocket"></i> E-Office</a></div>
                <div class="breadcrumb-item"><a href="{{ url("maintenance") }}"><i class="fas fa-wrench"></i> Maintenance</a></div>
                <div class="breadcrumb-item active"><i class="fas fa-key"></i> Token</div>
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
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-border text-center table-hover">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $index => $user)
                                            <tr>
                                                <td>{{ $users->firstItem() + $index }}</td>
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
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        {{-- Pagination --}}
                        <div class="card-body">
                            <nav aria-label="...">
                                <ul class="pagination justify-content-center">
                                    {{-- Previous Page Link --}}
                                    @if ($users->onFirstPage())
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1">Sebelumnya</a>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $users->previousPageUrl() }}" tabindex="-1">Sebelumnya</a>
                                        </li>
                                    @endif

                                    {{-- Pagination Elements --}}
                                    @foreach ($users->getUrlRange(1, $users->lastPage()) as $page => $url)
                                        @if ($page == $users->currentPage())
                                            <li class="page-item active">
                                                <a class="page-link" href="#">{{ $page }} <span class="sr-only">(current)</span></a>
                                            </li>
                                        @else
                                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                        @endif
                                    @endforeach

                                    {{-- Next Page Link --}}
                                    @if ($users->hasMorePages())
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $users->nextPageUrl() }}">Selanjutnya</a>
                                        </li>
                                    @else
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#">Selanjutnya</a>
                                        </li>
                                    @endif
                                </ul>
                            </nav>
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
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button">Copy</button>
                    <button class="btn btn-primary" data-dismiss="modal" type="button">Tutup</button>
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
        // Lihat Token
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
        // Generate Token
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
    <script>
        // Copy Token
        $(document).ready(function() {
            $(".modal-footer .btn-secondary").click(function() {
                let token = $("#lihat-token").val();
                navigator.clipboard.writeText(token).then(function() {
                    swal("Token berhasil disalin!", {
                        icon: "success",
                    });
                }, function(err) {
                    swal("Gagal menyalin token!", {
                        icon: "error",
                    });
                });
            });
        });
    </script>
@endsection
