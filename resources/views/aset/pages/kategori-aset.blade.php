@extends("aset.layouts.app")

@section("title")
    Kategori Aset {!! "&mdash;" !!} ITAM
@endsection

@section("content")
    <section class="section">
        <div class="section-header">
            <h1>Status Aset</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ url("itam/dashboard") }}"><i class="fas fa-laptop"></i> IT Asset Management</a></div>
                <div class="breadcrumb-item"><i class="fas fa-cog"></i> Pengaturan</div>
                <div class="breadcrumb-item active"><i class="fas fa-lightbulb"></i> Status Aset</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Jenis Status Aset</h2>
            <p class="section-lead">Daftar status yang dapat digunakan pada aset.</p>

            <div class="row mb-3">
                <div class="col-md-4">
                    <div class="input-group">
                        <input class="form-control" placeholder="Search" type="text">
                        <div class="input-group-append">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 text-right">
                    <button class="btn btn-primary" data-target="#" data-toggle="modal">Tambah Data</button>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nama Status</th>
                            <th>Tag Status</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Sedang Digunakan</td>
                            <td>
                                <div class="badge badge-success">Active</div>
                            </td>
                            </td>
                            <td>Aset sedang digunakan dan memiliki PIC</td>
                            <td><a class="btn btn-primary" href="#">Edit</a> <a class="btn btn-danger" href="#">Delete</a></td>
                        </tr>
                        <tr>
                            <td>Dipinjam</td>
                            <td>
                                <div class="badge badge-success">Active</div>
                            </td>
                            <td>Aset sedang digunakan dan memiliki PIC berbeda dari pemiliknya</td>
                            <td><a class="btn btn-primary" href="#">Edit</a> <a class="btn btn-danger" href="#">Delete</a></td>
                        </tr>
                        <tr>
                            <td>Tanpa PIC</td>
                            <td>
                                <div class="badge badge-info">Idle</div>
                            </td>
                            <td>Aset sedang tidak digunakan dan tidak memiliki PIC</td>
                            <td><a class="btn btn-primary" href="#">Edit</a> <a class="btn btn-danger" href="#">Delete</a></td>
                        </tr>

                        <tr>
                            <td>Perbaikan</td>
                            <td>
                                <div class="badge badge-warning">Not Active</div>
                            </td>
                            <td>Aset sedang dalam perbaikan dan tidak dapat digunakan</td>
                            <td><a class="btn btn-primary" href="#">Edit</a> <a class="btn btn-danger" href="#">Delete</a></td>
                        </tr>
                        <tr>
                            <td>Rusak</td>
                            <td>
                                <div class="badge badge-warning">Not Active</div>
                            </td>
                            <td>Aset dalam keadaan rusak dan tidak dapat digunakan</td>
                            <td><a class="btn btn-primary" href="#">Edit</a> <a class="btn btn-danger" href="#">Delete</a></td>
                        </tr>
                        <tr>
                            <td>Dimusnahkan</td>
                            <td>
                                <div class="badge badge-danger">Dismantle</div>
                            </td>
                            <td>Aset sudah dimusnahkan</td>
                            <td><a class="btn btn-primary" href="#">Edit</a> <a class="btn btn-danger" href="#">Delete</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
