@extends("main.layouts.main")
@section("title")
    Divisi {!! "&mdash;" !!} E-Office
@endsection
@section("content")
    <section class="section">
        <div class="section-header">
            <h1>Divisi</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="#">E-Office</a></div>
                <div class="breadcrumb-item"><a href="#">Maintenance</a></div>
                <div class="breadcrumb-item active">Divisi</div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Divisi</h4>
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
                                <button class="btn btn-primary ml-2" data-target="#addDivisiModal" data-toggle="modal">Tambah Data</button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Divisi</th>
                                        <th>Kelola</th>
                                    </tr>
                                    {{-- @foreach ($divisis as $index => $divisi)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $divisi->name }}</td>
                                            <td>
                                                <button class="btn btn-primary btn-edit-divisi" data-id="{{ $divisi->id }}" data-name="{{ $divisi->name }}" data-target="#editDivisiModal" data-toggle="modal">Edit</button>
                                                <button class="btn btn-danger btn-delete-divisi" data-id="{{ $divisi->id }}">Hapus</button>
                                            </td>
                                        </tr>
                                    @endforeach --}}
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Modal Tambah Divisi -->
    <div aria-hidden="true" aria-labelledby="addDivisiModalLabel" class="modal fade" id="addDivisiModal" role="dialog" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDivisiModalLabel">Tambah Data Divisi</h5>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_divisi">Nama Divisi</label>
                            <input class="form-control" id="nama_divisi" name="nama_divisi" required type="text">
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

    <!-- Modal Edit Divisi -->
    <div aria-hidden="true" aria-labelledby="editDivisiModalLabel" class="modal fade" id="editDivisiModal" role="dialog" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editDivisiModalLabel">Edit Data Divisi</h5>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" method="POST">
                    @csrf
                    @method("PUT")
                    <div class="modal-body">
                        <input id="edit_divisi_id" name="id" type="hidden">
                        <div class="form-group">
                            <label for="edit_nama_divisi">Nama Divisi</label>
                            <input class="form-control" id="edit_nama_divisi" name="nama_divisi" required type="text">
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.btn-edit-divisi').forEach(function(button) {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const name = this.getAttribute('data-name');
                    document.getElementById('edit_divisi_id').value = id;
                    document.getElementById('edit_nama_divisi').value = name;
                });
            });
        });
    </script>
@endsection
