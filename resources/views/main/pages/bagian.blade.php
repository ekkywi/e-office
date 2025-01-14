@extends("main.layouts.main")

@section("title")
    Bagian {!! "&mdash;" !!} E-Office
@endsection

@section("content")
    <section class="section">
        <div class="section-header">
            <h1>Bagian</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ url("dashboard") }}">E-Office</a></div>
                <div class="breadcrumb-item"><a href="{{ url("maintenance") }}">Maintenance</a></div>
                <div class="breadcrumb-item active">Bagian</div>
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
                                <table class="table table-striped">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Bagian</th>
                                        <th>Kelola</th>
                                    </tr>
                                    @foreach ($bagians as $index => $bagian)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $bagian->name }}</td>
                                            <td>
                                                <button class="btn btn-primary btn-edit-bagian" data-id="{{ $bagian->id }}" data-name="{{ $bagian->name }}" data-target="#editBagianModal" data-toggle="modal">Edit</button>
                                                <button class="btn btn-danger" data-id="{{ $bagian->id }}" data-name="{{ $bagian->nama_bagian }}" data-target="#deleteBagianModal" data-toggle="modal">Hapus</button>
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
                <form action="{{ route("bagian.store") }}" method="POST">
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
                <form action="{{ route("bagian.update") }}" method="POST">
                    @csrf
                    @method("PUT")
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

    <!-- Modal Hapus Bagian -->
    <div aria-hidden="true" aria-labelledby="deleteBagianModalLabel" class="modal fade" id="deleteBagianModal" role="dialog" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteBagianModalLabel">Konfirmasi Hapus Bagian</h5>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route("bagian.destroy") }}" method="POST">
                    @csrf
                    @method("DELETE")
                    <div class="modal-body">
                        <input id="delete_bagian_id" name="id" type="hidden">
                        <p>Apakah Anda yakin ingin menghapus bagian <strong id="delete_bagian_name"></strong>?</p>
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
        $('#editBagianModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var name = button.data('name');

            var modal = $(this);
            modal.find('#edit_bagian_id').val(id);
            modal.find('#edit_nama_bagian').val(name);
        });

        $('#deleteBagianModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var name = button.data('name');

            var modal = $(this);
            modal.find('#delete_bagian_id').val(id);
            modal.find('#delete_bagian_name').text(name);
        });
    </script>
@endsection
