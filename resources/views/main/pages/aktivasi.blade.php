@extends("main.layouts.main")

@section("title")
    Aktivasi Akun {!! "&mdash;" !!} E-Office
@endsection

@section("content")
    <section class="section">
        <div class="section-header">
            <h1>Aktivasi Akun</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ url("dashboard") }}"><i class="fas fa-rocket"></i> E-Office</a></div>
                <div class="breadcrumb-item"><a href="{{ url("maintenance") }}"><i class="fas fa-wrench"></i> Maintenance</a></div>
                <div class="breadcrumb-item"><i class="fas fa-user-check"></i> Aktivasi Akun</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Aktivasi Pengguna</h4>
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
                            <div>
                                <button class="btn btn-primary ml-2" data-target="#addUserModal" data-toggle="modal">Tambah Data</button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-border text-center table-hover">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Status Aktivasi</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $index => $user)
                                            <tr>
                                                <td>{{ $users->firstItem() + $index }}</td>
                                                <td>{{ $user->nama }}</td>
                                                <td>
                                                    <span class="{{ $user->status_aktivasi ? "text-success" : "text-danger" }}">
                                                        {{ $user->status_aktivasi ? "Aktif" : "Non-Aktif" }}
                                                    </span>
                                                </td>
                                                <td>
                                                    @if (!$user->is_active)
                                                        <button class="btn btn-{{ $user->status_aktivasi ? "danger" : "success" }} btn-aktivasi" data-id="{{ $user->id }}">
                                                            <i class="fas fa-{{ $user->status_aktivasi ? "times" : "check" }}"></i>
                                                            <span>{{ $user->status_aktivasi ? "Non-Aktifkan" : "Aktivasi" }}</span>
                                                        </button>
                                                    @else
                                                        <span class="badge badge-success">Aktif</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

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
            $(".btn-aktivasi").click(function() {
                let userId = $(this).data("id");
                let url = "{{ route("maintenance.aktivasi.user") }}";

                $.ajax({
                    url: url,
                    type: "POST",
                    data: {
                        user_id: userId,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        if (response.success) {
                            swal("Berhasil!", response.success, "success").then(() => {
                                location.reload();
                            });
                        } else {
                            swal("Gagal!", response.error, "error");
                        }
                    },
                    error: function(xhr) {
                        swal("Gagal!", "Terjadi kesalahan saat mengaktivasi user", "error");
                    }
                });
            });
        });
    </script>
@endsection
