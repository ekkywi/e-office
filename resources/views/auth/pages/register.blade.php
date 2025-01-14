@extends("auth.layouts.auth")

@section("title")
    Register {!! "&mdash;" !!} E-Office
@endsection

@section("css")
    <link href="{{ asset("modules/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet">
    <link href="{{ asset("modules/fontawesome/css/all.min.css") }}" rel="stylesheet">
    <!-- CSS Libraries -->
    <link href="{{ asset("modules/jquery-selectric/selectric.css") }}" rel="stylesheet">
    <!-- Template CSS -->
    <link href="{{ asset("css/style.css") }}" rel="stylesheet">
    <link href="{{ asset("css/components.css") }}" rel="stylesheet">
@endsection

@section("content")
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                        <div class="login-brand">
                            <a href="login">
                                <img alt="logo" class="shadow-light rounded-circle" src="{{ asset("images/logo.svg") }}" width="100">
                            </a>
                        </div>
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3>Registerasi Akun</h3>
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
                            <div class="card-body">
                                <form action="{{ route("register.submit") }}" class="needs-validation" method="POST" novalidate>
                                    @csrf
                                    <div class="form-divider">
                                        Informasi Akun
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input autofocus class="form-control" id="username" name="username" placeholder="Masukan username Anda" required tabindex="1" type="text">
                                        <div class="invalid-feedback">
                                            Anda belum memasukan username
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label class="d-block" for="password">Password</label>
                                            <input class="form-control pwstrength" data-indicator="pwindicator" id="password" name="password" placeholder="Masukan password Anda" required tabindex="2" type="password">
                                            <div class="invalid-feedback">
                                                Anda belum memasukan password
                                            </div>
                                            <div class="pwindicator" id="pwindicator">
                                                <div class="bar"></div>
                                                <div class="label"></div>
                                            </div>
                                        </div>
                                        <div class="form-group col-6">
                                            <label class="d-block" for="password2">Konfirmasi Password</label>
                                            <input class="form-control" id="password2" name="password_confirmation" placeholder="Konfirmasi password" required tabindex="3" type="password">
                                            <div class="invalid-feedback">
                                                Anda belum memasukan konfirmasi password
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_pegawai">Nomor Pegawai</label>
                                        <input class="form-control" id="no_pegawai" name="no_pegawai" placeholder="Masukan nomor pegawai Anda" required tabindex="5" type="text">
                                        <div class="invalid-feedback">
                                            Anda belum memasukan nomor pegawai
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input class="form-control" id="email" name="email" placeholder="Masukan alamat email Anda, kosongi jika tidak ada" tabindex="6" type="email">
                                        <div class="invalid-feedback">
                                        </div>
                                    </div>
                                    <div class="form-divider">
                                        Informasi Perusahaan
                                    </div>
                                    <div class="form-group">
                                        <label>Divisi</label>
                                        <select class="form-control selectric" name="divisi" required tabindex="7">
                                            @foreach ($divisis as $divisi)
                                                <option value="{{ $divisi->id }}">{{ $divisi->nama_divisi }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Anda belum memilih divisi
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label>Bagian</label>
                                            <select class="form-control selectric" name="bagian" required tabindex="8">
                                                @foreach ($bagians as $bagian)
                                                    <option value="{{ $bagian->id }}">{{ $bagian->nama_bagian }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                Anda belum memilih bagian
                                            </div>
                                        </div>
                                        <div class="form-group col-6">
                                            <label>Jabatan</label>
                                            <select class="form-control selectric" name="jabatan" required tabindex="9">
                                                @foreach ($jabatans as $jabatan)
                                                    <option value="{{ $jabatan->id }}">{{ $jabatan->nama_jabatan }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                Anda belum memilih jabatan
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" id="agree" name="agree" required tabindex="10" type="checkbox">
                                            <label class="custom-control-label" for="agree">
                                                Saya menyetujui <a href="#" target="_blank">syarat dan ketentuan</a> yang berlaku
                                            </label>
                                            <div class="invalid-feedback">
                                                Anda belum menyetujui syarat dan ketentuan
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-lg btn-block" tabindex="11" type="submit">
                                            Register
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="simple-footer">
                            &copy; 2025 E-Office - All Rights Reserved
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section("js")
    <!-- General JS Scripts -->
    <script src="{{ asset("modules/jquery/jquery.min.js") }}"></script>
    <script src="{{ asset("modules/popper/popper.js") }}"></script>
    <script src="{{ asset("modules/tooltip/tooltip.js") }}"></script>
    <script src="{{ asset("modules/bootstrap/js/bootstrap.min.js") }}"></script>
    <script src="{{ asset("modules/nicescroll/jquery.nicescroll.min.js") }}"></script>
    <script src="{{ asset("modules/moment/moment.min.js") }}"></script>
    <script src="{{ asset("js/stisla.js") }}"></script>
    <!-- JS Libraies -->
    <script src="{{ asset("modules/jquery-pwstrength/jquery.pwstrength.min.js") }}"></script>
    <script src="{{ asset("modules/jquery-selectric/jquery.selectric.min.js") }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset("js/pages/auth-register.js") }}"></script>
    <!-- Template JS File -->
    <script src="{{ asset("js/scripts.js") }}"></script>
    <script src="{{ asset("js/custom.js") }}"></script>
@endsection
