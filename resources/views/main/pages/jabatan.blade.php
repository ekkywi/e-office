@extends("main.layouts.main")

@section("title")
    Jabatan {!! "&mdash;" !!} E-Office
@endsection

@section("content")
    <section class="section">
        <div class="section-header">
            <h1>Jabatan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ url("dashboard") }}">E-Office</a></div>
                <div class="breadcrumb-item"><a href="{{ url("maintenance") }}">Maintenance</a></div>
                <div class="breadcrumb-item active">Jabatan</div>
            </div>
        </div>

        @if (session("success"))
            <div class="alert alert-success">
                {{ session("success") }}
            </div>
        @endif
        @if (session("error"))
            <div class="alert alert-danger">
                {{ session("error") }}
            </div>
        @endif

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Daftar Jabatan</h4>
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
                                <button class="btn btn-primary ml-2" data-target="#addJabatanModal" data-toggle="modal">Tambah Data</button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Jabatan</th>
                                        <th>Kelola</th>
                                    </tr>
                                    @foreach ($jabatans as $index => $jabatan)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $jabatan->name }}</td>
                                            <td>
                                                <button class="btn btn-primary btn-edit-bagian" data-id="{{ $jabatan->id }}" data-name="{{ $jabatan->name }}" data-target="#editJabatanModal" data-toggle="modal">Edit</button>
                                                <button class="btn btn-danger" data-id="{{ $jabatan->id }}" data-name="{{ $jabatan->nama_jabatan }}" data-target="#deleteJabatanModal" data-toggle="modal">Hapus</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Tambah Jabatan -->
    <div aria-hidden="true" aria-labelledby="addJabatanModalLabel" class="modal fade" id="addJabatanModal" role="dialog" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addJabatanModalLabel">Tambah Data Jabatan</h5>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route("jabatan.store") }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_jabatan">Nama Jabatan</label>
                            <input class="form-control" id="nama_jabatan" name="nama_jabatan" required type="text">
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

    <!-- Modal Edit Jabatan -->
    <div aria-hidden="true" aria-labelledby="editJabatanModalLabel" class="modal fade" id="editJabatanModal" role="dialog" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editJabatanModalLabel">Edit Data Jabatan</h5>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route("jabatan.update") }}" method="POST">
                    @csrf
                    @method("PUT")
                    <div class="modal-body">
                        <input id="edit_jabatan_id" name="id" type="hidden">
                        <div class="form-group">
                            <label for="edit_nama_jabatan">Nama Jabatan</label>
                            <input class="form-control" id="edit_nama_jabatan" name="nama_jabatan" required type="text">
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

    <!-- Modal Hapus Jabatan -->
    <div aria-hidden="true" aria-labelledby="deleteJabatanModalLabel" class="modal fade" id="deleteJabatanModal" role="dialog" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteJabatanModalLabel">Konfirmasi Hapus Jabatan</h5>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route("jabatan.destroy") }}" method="POST">
                    @csrf
                    @method("DELETE")
                    <div class="modal-body">
                        <input id="delete_jabatan_id" name="id" type="hidden">
                        <p>Apakah Anda yakin ingin menghapus jabatan <strong id="delete_jabatan_name"></strong>?</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal" type="button">Batal</button>
                        <button class="btn btn-danger" type="submit">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section("scripts")
    <!-- General JS Scripts -->
    <script src="{{ asset("modules/jquery/jquery.min.js") }}"></script>
    <script src="{{ asset("modules/popper/popper.js") }}"></script>
    <script src="{{ asset("modules/tooltip/tooltip.js") }}"></script>
    <script src="{{ asset("modules/bootstrap/js/bootstrap.min.js") }}"></script>
    <script src="{{ asset("modules/nicescroll/jquery.nicescroll.min.js") }}"></script>
    <script src="{{ asset("modules/moment/moment.min.js") }}"></script>
    <script src="{{ asset("js/stisla.js") }}"></script>

    <!-- Template JS File -->
    <script src="{{ asset("js/scripts.js") }}"></script>
    <script src="{{ asset("js/custom.js") }}"></script>

    <!-- JS Libraies -->
    <script src="{{ asset("modules/jquery-ui/jquery-ui.min.js") }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset("js/pages/components-table.js") }}"></script>

    <script>
        $('#editJabatanModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var name = button.data('name');

            var modal = $(this);
            modal.find('#edit_jabatan_id').val(id);
            modal.find('#edit_nama_jabatan').val(name);
        });

        $('#deleteJabatanModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var name = button.data('name');

            var modal = $(this);
            modal.find('#delete_jabatan_id').val(id);
            modal.find('#delete_jabatan_name').text(name);
        });
    </script>
@endsection
