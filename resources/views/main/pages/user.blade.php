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
                                <table class="table table-striped text-center table-md">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Nomor Pegawai</th>
                                        <th>Email</th>
                                        <th>Divisi</th>
                                        <th>Bagian</th>
                                        <th>Jabatan</th>
                                        <th colspan="2">Action</th>
                                    </tr>
                                    @foreach ($users as $index => $user)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $user->nama }}</td>
                                            <td>{{ $user->no_pegawai }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->divisi->nama_divisi ?? "-" }}</td>
                                            <td>{{ $user->bagian->nama_bagian ?? "-" }}</td>
                                            <td>{{ $user->jabatan->nama_jabatan ?? "-" }}</td>
                                            <td>
                                                <button class="btn btn-primary btn-edit-user" data-bagian_id="{{ $user->bagian_id }}" data-divisi_id="{{ $user->divisi_id }}" data-email="{{ $user->email }}" data-id="{{ $user->id }}" data-jabatan_id="{{ $user->jabatan_id }}" data-nama="{{ $user->nama }}" data-no_pegawai="{{ $user->no_pegawai }}" data-username="{{ $user->username }}">
                                                    <i class="fas fa-edit"></i>
                                                    <span>Edit</span>
                                                </button>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger btn-delete-user" data-id="{{ $user->id }}" data-username="{{ $user->username }}">
                                                    <i class="fas fa-trash"></i>
                                                    <span>Hapus</span>
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
                <form action="{{ route("maintenance.user.add") }}" method="POST">
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
                            <label for="nama">Nama</label>
                            <input class="form-control" id="nama" name="nama" required type="text">
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
                                    <option value="{{ $divisi->id }}">{{ $divisi->nama_divisi }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="bagian_id">Bagian</label>
                            <select class="form-control" id="bagian_id" name="bagian_id">
                                @foreach ($bagians as $bagian)
                                    <option value="{{ $bagian->id }}">{{ $bagian->nama_bagian }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jabatan_id">Jabatan</label>
                            <select class="form-control" id="jabatan_id" name="jabatan_id">
                                @foreach ($jabatans as $jabatan)
                                    <option value="{{ $jabatan->id }}">{{ $jabatan->nama_jabatan }}</option>
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
                <form action="{{ route("maintenance.user.edit") }}" id="editUserForm" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input id="edit_user_id" name="id" type="hidden">
                        <div class="form-group">
                            <label>Username</label>
                            <input class="form-control" id="edit_username" name="username" required type="text">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" name="password" placeholder="Kosongkan jika tidak ingin mengubah password" type="password">
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input class="form-control" id="edit_nama" name="nama" required type="text">
                        </div>
                        <div class="form-group">
                            <label>No Pegawai</label>
                            <input class="form-control" id="edit_no_pegawai" name="no_pegawai" required type="text">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" id="edit_email" name="email" type="email">
                        </div>
                        <div class="form-group">
                            <label>Divisi</label>
                            <select class="form-control" id="edit_divisi_id" name="divisi_id" required>
                                @foreach ($divisis as $divisi)
                                    <option value="{{ $divisi->id }}">{{ $divisi->nama_divisi }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Bagian</label>
                            <select class="form-control" id="edit_bagian_id" name="bagian_id" required>
                                @foreach ($bagians as $bagian)
                                    <option value="{{ $bagian->id }}">{{ $bagian->nama_bagian }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jabatan</label>
                            <select class="form-control" id="edit_jabatan_id" name="jabatan_id" required>
                                @foreach ($jabatans as $jabatan)
                                    <option value="{{ $jabatan->id }}">{{ $jabatan->nama_jabatan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal" type="button">Batal</button>
                        <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
        {{-- Delete Form --}}
        <form id="deleteForm" method="POST" style="display: none;">
            @csrf
        </form>
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
            $('.btn-edit-user').on('click', function() {
                var id = $(this).data('id');
                var username = $(this).data('username');
                var email = $(this).data('email');
                var nama = $(this).data('nama');
                var no_pegawai = $(this).data('no_pegawai');
                var divisi_id = $(this).data('divisi_id');
                var bagian_id = $(this).data('bagian_id');
                var jabatan_id = $(this).data('jabatan_id');
                $('#edit_user_id').val(id);
                $('#edit_username').val(username);
                $('#edit_email').val(email);
                $('#edit_nama').val(nama);
                $('#edit_no_pegawai').val(no_pegawai);
                $('#edit_divisi_id').val(divisi_id);
                $('#edit_bagian_id').val(bagian_id);
                $('#edit_jabatan_id').val(jabatan_id);
                $('#editUserModal').modal('show');
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.btn-delete-user').click(function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                var username = $(this).data('username');

                swal({
                    title: 'Apakah Anda Yakin?',
                    text: "Akan menghapus user " + username,
                    icon: 'warning',
                    buttons: {
                        cancel: {
                            text: "Batal",
                            value: null,
                            visible: true
                        },
                        confirm: {
                            text: "Hapus",
                            value: true,
                            visible: true
                        }
                    },
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        var form = $('#deleteForm');
                        form.attr('action', '/maintenance/user/delete/' + id);
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
