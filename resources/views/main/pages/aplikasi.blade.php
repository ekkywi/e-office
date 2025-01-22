@extends("main.layouts.main")
@section("title")
    Aplikasi {!! "&mdash;" !!} E-Office
@endsection
@section("content")
    <section class="section">
        <div class="section-body">
            <div class="row">

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card card-menu">
                        <a class="card-body text-center" href="#">
                            <i class="fas fa-envelope custom-icon-size mb-3"></i>
                            <h5 class="card-title">E-Mail</h5>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card card-menu">
                        <a class="card-body text-center" href="#">
                            <i class="fas fa-comments custom-icon-size mb-3"></i>
                            <h5 class="card-title">Chat</h5>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card card-menu">
                        <a class="card-body text-center" href="{{ url("itam/dashboard") }}">
                            <i class="fas fa-laptop custom-icon-size mb-1"></i>
                            <h5 class="card-title">IT Asset Management</h5>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card card-menu">
                        <a class="card-body text-center" href="#">
                            <i class="fas fa-server custom-icon-size mb-3"></i>
                            <h5 class="card-title">Aktivitas Harian</h5>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card card-menu">
                        <a class="card-body text-center" href="#">
                            <i class="fas fa-diagram-project custom-icon-size mb-3"></i>
                            <h5 class="card-title">Manajemen Proyek</h5>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card card-menu">
                        <a class="card-body text-center" href="#">
                            <i class="fas fa-globe custom-icon-size mb-3"></i>
                            <h5 class="card-title">Manajemen Jaringan</h5>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card card-menu">
                        <a class="card-body text-center" href="#">
                            <i class="fas fa-network-wired custom-icon-size mb-3"></i>
                            <h5 class="card-title">Monitoring Jaringan</h5>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
