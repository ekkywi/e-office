@extends("main.layouts.main")
@section("title")
    Maintenance {!! "&mdash;" !!} E-Office
@endsection
@section("content")
    <section class="section">
        <div class="section-body">
            <div class="row">

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card card-menu">
                        <a class="card-body text-center" href="{{ url("maintenance/user") }}">
                            <i class="fas fa-user-cog custom-icon-size mb-3"></i>
                            <h5 class="card-title">Pengguna</h5>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card card-menu">
                        <a class="card-body text-center" href="{{ url("maintenance/divisi") }}">
                            <i class="fas fa-sitemap custom-icon-size mb-3"></i>
                            <h5 class="card-title">Divisi</h5>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card card-menu">
                        <a class="card-body text-center" href="{{ url("maintenance/bagian") }}">
                            <i class="fas fa-building custom-icon-size mb-3"></i>
                            <h5 class="card-title">Bagian</h5>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card card-menu">
                        <a class="card-body text-center" href="{{ url("maintenance/jabatan") }}">
                            <i class="fas fa-briefcase custom-icon-size mb-3"></i>
                            <h5 class="card-title">Jabatan</h5>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card card-menu">
                        <a class="card-body text-center" href="{{ url("maintenance/aktivasi") }}">
                            <i class="fas fa-user-check custom-icon-size mb-3"></i>
                            <h5 class="card-title">Aktivasi</h5>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card card-menu">
                        <a class="card-body text-center" href="{{ url("maintenance/token") }}">
                            <i class="fas fa-key custom-icon-size mb-3"></i>
                            <h5 class="card-title">Token</h5>
                        </a>
                    </div>
                </div>

    </section>
@endsection
