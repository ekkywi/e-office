@extends("main.layouts.main")

@section("title")
    User {!! "&mdash;" !!} E-Office
@endsection

@section("content")
    <section class="section">
        <div class="section-header">
            <h1>Pengguna</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ url("dashboard") }}">E-Office</a></div>
                <div class="breadcrumb-item"><a href="{{ url("maintenance") }}">Maintenance</a></div>
                <div class="breadcrumb-item active">Pengguna</div>
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
                            <h4>Data Pengguna Aplikasi</h4>
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
                                <table class="table table-striped">
                                    <tr>
                                        <th>
                                            <div class="custom-checkbox custom-control">
                                                <input class="custom-control-input" data-checkbox-role="dad" data-checkboxes="mygroup" id="checkbox-all" type="checkbox">
                                                <label class="custom-control-label" for="checkbox-all">&nbsp;</label>
                                            </div>
                                        </th>
                                        <th>Nama</th>
                                        <th>Nomor Pegawai</th>
                                        <th>Email</th>
                                        <th>Divisi</th>
                                        <th>Bagian</th>
                                        <th>Jabatan</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>
                                                <div class="custom-checkbox custom-control">
                                                    <input class="custom-control-input" data-checkboxes="mygroup" id="checkbox-{{ $user->id }}" type="checkbox">
                                                    <label class="custom-control-label" for="checkbox-{{ $user->id }}">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->no_pegawai }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->divisi->name ?? "-" }}</td>
                                            <td>{{ $user->bagian->name ?? "-" }}</td>
                                            <td>{{ $user->jabatan->name ?? "-" }}</td>
                                            <td>
                                                <button class="btn btn-primary btn-edit-user" data-bagian_id="{{ $user->bagian_id }}" data-divisi_id="{{ $user->divisi_id }}" data-email="{{ $user->email }}" data-id="{{ $user->id }}" data-jabatan_id="{{ $user->jabatan_id }}" data-name="{{ $user->name }}" data-no_pegawai="{{ $user->no_pegawai }}" data-target="#editUserModal" data-toggle="modal" data-username="{{ $user->username }}">Edit</button>
                                                <button class="btn btn-danger" data-id="{{ $user->id }}" data-name="{{ $user->name }}" data-target="#deleteUserModal" data-toggle="modal">Hapus</button>
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

    <!-- Modal Tambah User -->
    <div aria-hidden="true" aria-labelledby="addUserModalLabel" class="modal fade" id="addUserModal" role="dialog" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Tambah Data Pengguna</h5>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route("user.store") }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input class="form-control" id="username" name="username" required type="text">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input class="form-control" id="password" name="password" required type="password">
                        </div>
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input class="form-control" id="name" name="name" required type="text">
                        </div>
                        <div class="form-group">
                            <label for="no_pegawai">Nomor Pegawai</label>
                            <input class="form-control" id="no_pegawai" name="no_pegawai" required type="text">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" id="email" name="email" type="email">
                        </div>
                        <div class="form-group">
                            <label for="divisi_id">Divisi</label>
                            <select class="form-control" id="divisi_id" name="divisi_id">
                                @foreach ($divisis as $divisi)
                                    <option value="{{ $divisi->id }}">{{ $divisi->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="bagian_id">Bagian</label>
                            <select class="form-control" id="bagian_id" name="bagian_id">
                                @foreach ($bagians as $bagian)
                                    <option value="{{ $bagian->id }}">{{ $bagian->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jabatan_id">Jabatan</label>
                            <select class="form-control" id="jabatan_id" name="jabatan_id">
                                @foreach ($jabatans as $jabatan)
                                    <option value="{{ $jabatan->id }}">{{ $jabatan->name }}</option>
                                @endforeach
                            </select>
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

    <!-- Modal Edit User -->
    <div aria-hidden="true" aria-labelledby="editUserModalLabel" class="modal fade" id="editUserModal" role="dialog" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModalLabel">Edit Data Pengguna</h5>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route("user.update") }}" method="POST">
                    @csrf
                    @method("PUT")
                    <div class="modal-body">
                        <input id="edit_user_id" name="id" type="hidden">
                        <div class="form-group">
                            <label for="edit_username">Username</label>
                            <input class="form-control" id="edit_username" name="username" required type="text">
                        </div>
                        <div class="form-group">
                            <label for="edit_password">Password</label>
                            <input class="form-control" id="edit_password" name="password" type="password">
                        </div>
                        <div class="form-group">
                            <label for="edit_name">Nama</label>
                            <input class="form-control" id="edit_name" name="name" required type="text">
                        </div>
                        <div class="form-group">
                            <label for="edit_no_pegawai">Nomor Pegawai</label>
                            <input class="form-control" id="edit_no_pegawai" name="no_pegawai" required type="text">
                        </div>
                        <div class="form-group">
                            <label for="edit_email">Email</label>
                            <input class="form-control" id="edit_email" name="email" type="email">
                        </div>
                        <div class="form-group">
                            <label for="edit_divisi_id">Divisi</label>
                            <select class="form-control" id="edit_divisi_id" name="divisi_id">
                                @foreach ($divisis as $divisi)
                                    <option value="{{ $divisi->id }}">{{ $divisi->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit_bagian_id">Bagian</label>
                            <select class="form-control" id="edit_bagian_id" name="bagian_id">
                                @foreach ($bagians as $bagian)
                                    <option value="{{ $bagian->id }}">{{ $bagian->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit_jabatan_id">Jabatan</label>
                            <select class="form-control" id="edit_jabatan_id" name="jabatan_id">
                                @foreach ($jabatans as $jabatan)
                                    <option value="{{ $jabatan->id }}">{{ $jabatan->name }}</option>
                                @endforeach
                            </select>
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

    <!-- Modal Hapus User -->
    <div aria-hidden="true" aria-labelledby="deleteUserModalLabel" class="modal fade" id="deleteUserModal" role="dialog" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteUserModalLabel">Konfirmasi Hapus Pengguna</h5>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">&times;</span>
                </div>
                <form action="{{ route("user.destroy") }}" method="POST">
                    @csrf
                    @method("DELETE")
                    <div class="modal-body">
                        <input id="delete_user_id" name="id" type="hidden">
                        <p>Apakah Anda yakin ingin menghapus pengguna <strong id="delete_user_name"></strong>?</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal" type="button">Batal</button>
                        <button class="btn btn-danger" type="submit">Hapus</button>
                    </div>
                </form>
            </div>
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
        $('#editUserModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var username = button.data('username');
            var name = button.data('name');
            var no_pegawai = button.data('no_pegawai');
            var email = button.data('email');
            var divisi_id = button.data('divisi_id');
            var bagian_id = button.data('bagian_id');
            var jabatan_id = button.data('jabatan_id');

            var modal = $(this);
            modal.find('#edit_user_id').val(id);
            modal.find('#edit_username').val(username);
            modal.find('#edit_name').val(name);
            modal.find('#edit_no_pegawai').val(no_pegawai);
            modal.find('#edit_email').val(email);
            modal.find('#edit_divisi_id').val(divisi_id);
            modal.find('#edit_bagian_id').val(bagian_id);
            modal.find('#edit_jabatan_id').val(jabatan_id);
        });

        $('#deleteUserModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var name = button.data('name');

            var modal = $(this);
            modal.find('#delete_user_id').val(id);
            modal.find('#delete_user_name').text(name);
        });
    </script>
@endsection
