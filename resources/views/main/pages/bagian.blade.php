@extends("main.layouts.main")

@section("title")
    Bagian {!! "&mdash;" !!} E-Office
@endsection

@section("content")
    <section class="section">
        <div class="section-header">
            <h1>Bagian</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ url("dashboard") }}"><i class="fas fa-rocket"></i> E-Office</a></div>
                <div class="breadcrumb-item"><a href="{{ url("maintenance") }}"><i class="fas fa-wrench"></i> Maintenance</a></div>
                <div class="breadcrumb-item active"><i class="fa fa-building"></i> Bagian</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Daftar Bagian</h4>
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
                                <button class="btn btn-primary ml-2" data-target="#addBagianModal" data-toggle="modal">Tambah Data</button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-border text-center table-hover">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Bagian</th>
                                            <th>Kelola</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bagians as $index => $bagian)
                                            <tr>
                                                <td>{{ $bagians->firstItem() + $index }}</td>
                                                <td>{{ $bagian->nama_bagian }}</td>
                                                <td>
                                                    <button class="btn btn-primary btn-edit-bagian" data-id="{{ $bagian->id }}" data-name="{{ $bagian->nama_bagian }}" data-target="#editBagianModal" data-toggle="modal">
                                                        <i class="fas fa-edit"></i>
                                                        <span>Edit</span>
                                                    </button>
                                                    <button class="btn btn-danger btn-delete-bagian" data-id="{{ $bagian->id }}" data-name="{{ $bagian->nama_bagian }}">
                                                        <i class="fas fa-trash"></i>
                                                        <span>Hapus</span>
                                                    </button>
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
                                    @if ($bagians->onFirstPage())
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1">Sebelumnya</a>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $bagians->previousPageUrl() }}" tabindex="-1">Sebelumnya</a>
                                        </li>
                                    @endif

                                    {{-- Pagination Elements --}}
                                    @foreach ($bagians->getUrlRange(1, $bagians->lastPage()) as $page => $url)
                                        @if ($page == $bagians->currentPage())
                                            <li class="page-item active">
                                                <a class="page-link" href="#">{{ $page }} <span class="sr-only">(current)</span></a>
                                            </li>
                                        @else
                                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                        @endif
                                    @endforeach

                                    {{-- Next Page Link --}}
                                    @if ($bagians->hasMorePages())
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $bagians->nextPageUrl() }}">Selanjutnya</a>
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

    <!-- Modal Tambah Bagian -->
    <div aria-hidden="true" aria-labelledby="addBagianModalLabel" class="modal fade" id="addBagianModal" role="dialog" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addBagianModalLabel">Tambah Data Bagian</h5>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route("maintenance.bagian.add") }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_bagian">Nama Bagian</label>
                            <input class="form-control" id="nama_bagian" name="nama_bagian" required type="text">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal" type="button">Batal</button>
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit Bagian -->
    <div aria-hidden="true" aria-labelledby="editBagianModalLabel" class="modal fade" id="editBagianModal" role="dialog" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editBagianModalLabel">Edit Data Bagian</h5>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route("maintenance.bagian.edit") }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input id="edit_bagian_id" name="id" type="hidden">
                        <div class="form-group">
                            <label for="edit_nama_bagian">Nama Bagian</label>
                            <input class="form-control" id="edit_nama_bagian" name="nama_bagian" required type="text">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal" type="button">Batal</button>
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Form -->
    <form id="deleteForm" method="POST" style="display: none;">
        @csrf
    </form>
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
            $('.btn-edit-bagian').on('click', function() {
                var id = $(this).data('id');
                var name = $(this).data('name');
                $('#edit_bagian_id').val(id);
                $('#edit_nama_bagian').val(name);
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.btn-delete-bagian').on('click', function() {
                var id = $(this).data('id');
                var name = $(this).data('name');

                swal({
                    title: 'Apakah anda yakin?',
                    text: 'Ingin menghapus bagian ' + name + '?',
                    icon: 'warning',
                    buttons: {
                        cancel: {
                            text: 'Batal',
                            value: null,
                            visible: true,
                            className: 'btn btn-secondary',
                            closeModal: true,
                        },
                        confirm: {
                            text: 'Hapus!',
                            value: true,
                            visible: true,
                            className: 'btn btn-primary',
                            closeModal: true
                        }
                    },
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        var form = $('#deleteForm');
                        form.attr('action', '/maintenance/bagian/delete/' + id);
                        form.submit();
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Handle success message
            @if (session("success"))
                swal({
                    icon: "success",
                    title: "Berhasil!",
                    text: "{{ session("success") }}",
                    type: "success",
                    timer: 1500,
                    button: false
                });
            @endif

            // Handle validation errors
            @if ($errors->any())
                swal({
                    icon: "error",
                    title: "Gagal!",
                    text: "{!! implode('\n', $errors->all()) !!}",
                    type: "error",
                    timer: 1500,
                    buttons: false
                });
            @endif

            // Handle error message
            @if (session("error"))
                swal({
                    icon: "error",
                    title: "Sistem Gagal!",
                    text: "{{ session("error") }}",
                    type: "error",
                    timer: 1500,
                    buttons: false
                });
            @endif
        });
    </script>
@endsection
