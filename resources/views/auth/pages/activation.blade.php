@extends("auth.layouts.auth")

@section("title")
    Aktivasi Akun {!! "&mdash;" !!} E-Office
@endsection

@section("css")
    <!-- General CSS Files -->
    <link href="{{ asset("modules/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet">
    <link href="{{ asset("modules/fontawesome/css/all.min.css") }}" rel="stylesheet">
    <!-- Template CSS -->
    <link href="{{ asset("css/style.css") }}" rel="stylesheet">
    <link href="{{ asset("css/components.css") }}" rel="stylesheet">
@endsection

@section("content")
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <a href="{{ route("auth.login") }}">
                                <img alt="logo" class="shadow-light rounded-circle" src="{{ asset("images/logo.svg") }}" width="100">
                            </a>
                        </div>
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3>Aktivasi Akun</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route("auth.activate.user") }}" class="needs-validation" method="POST" novalidate>
                                    @csrf
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input autofocus class="form-control" id="username" name="username" placeholder="Masukan username Anda" required tabindex="1" type="text">
                                        <div class="invalid-feedback">
                                            Anda belum memasukan username
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <p class="text-muted text-center text-small">Silakan menghubungi Administator Sistem untuk mendapatkan token</p>
                                        <label for="token">Token</label>
                                        <input class="form-control" id="token" name="token" placeholder="Masukan token" required tabindex="2" type="text">
                                        <div class="invalid-feedback">
                                            Anda belum memasukan token
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-lg btn-block" tabindex="3" type="submit">
                                            Aktivasi
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
    <!-- Template JS File -->
    <script src="{{ asset("js/scripts.js") }}"></script>
    <script src="{{ asset("js/custom.js") }}"></script>
    <!-- JS Libraies -->
    <script src="{{ asset("modules/sweetalert/sweetalert.min.js") }}"></script>
    <script>
        $(document).ready(function() {
            // Handle success message
            @if (session("success"))
                swal({
                    icon: "success",
                    title: "Aktivasi Akun Berhasil!",
                    text: "{{ session("success") }}",
                    type: "success",
                    confirmButtonText: "OK"
                });
            @endif

            // Handle validation errors
            @if ($errors->any())
                swal({
                    icon: "error",
                    title: "Aktivasi Akun Gagal!",
                    text: "{!! implode('\n', $errors->all()) !!}",
                    type: "error",
                    confirmButtonText: "OK"
                });
            @endif

            // Handle error message
            @if (session("error"))
                swal({
                    icon: "error",
                    title: "Sistem Aktivasi Akun Gagal!",
                    text: "{{ session("error") }}",
                    type: "error",
                    confirmButtonText: "OK"
                });
            @endif
        });
    </script>
@endsection
