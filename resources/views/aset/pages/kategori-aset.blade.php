@extends("aset.layouts.app")

@section("title")
    Kategori Aset {!! "&mdash;" !!} ITAM
@endsection

@section("content")
    <section class="section">
        <div class="section-header">
            <h1>Kategori Aset</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ url("itam/dashboard") }}"><i class="fas fa-laptop"></i> IT Asset Management</a></div>
                <div class="breadcrumb-item"><i class="fas fa-cog"></i> Pengaturan</div>
                <div class="breadcrumb-item active"><i class="fas fa-list"></i> Kategori Aset</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Jenis Kategori Aset</h2>
            <p class="section-lead">Daftar kategori pengelompokan jenis aset.</p>

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
                            <th>Nama Kategori</th>
                            <th>Jenis Kategori</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Komputer</td>
                            <td>
                                <div class="badge badge-success">Fisik</div>
                            </td>
                            <td>Aset fisik berupa komputer</td>
                            <td><a class="btn btn-primary" href="#">Edit</a> <a class="btn btn-danger" href="#">Delete</a></td>
                        </tr>
                        <tr>
                            <td>Laptop</td>
                            <td>
                                <div class="badge badge-success">Fisik</div>
                            </td>
                            <td>Aset fisik berupa laptop</td>
                            <td><a class="btn btn-primary" href="#">Edit</a> <a class="btn btn-danger" href="#">Delete</a></td>
                        </tr>
                        <tr>
                            <td>Monitor</td>
                            <td>
                                <div class="badge badge-success">Fisik</div>
                            </td>
                            <td>Aset fisik berupa monitor</td>
                            <td><a class="btn btn-primary" href="#">Edit</a> <a class="btn btn-danger" href="#">Delete</a></td>
                        </tr>
                        <tr>
                            <td>Printer</td>
                            <td>
                                <div class="badge badge-success">Fisik</div>
                            </td>
                            <td>Aset fisik berupa printer</td>
                            <td><a class="btn btn-primary" href="#">Edit</a> <a class="btn btn-danger" href="#">Delete</a></td>
                        </tr>
                        <tr>
                            <td>Scanner</td>
                            <td>
                                <div class="badge badge-success">Fisik</div>
                            </td>
                            <td>Aset fisik berupa scanner</td>
                            <td><a class="btn btn-primary" href="#">Edit</a> <a class="btn btn-danger" href="#">Delete</a></td>
                        </tr>
                        <tr>
                            <td>Toner</td>
                            <td>
                                <div class="badge badge-success">Fisik</div>
                            </td>
                            <td>Aset fisik berupa toner</td>
                            <td><a class="btn btn-primary" href="#">Edit</a> <a class="btn btn-danger" href="#">Delete</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
