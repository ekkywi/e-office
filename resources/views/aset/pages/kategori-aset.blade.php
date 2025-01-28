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
            <p class="section-lead">Daftar kategori pengelompokan jenis aset</p>

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
                            <th>Kategori</th>
                            <th>Tipe</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Komputer</td>
                            <td>
                                <div class="badge badge-success">Hardware</div>
                            </td>
                            <td>Aset hardware berupa komputer</td>
                            <td><a class="btn btn-primary" href="#">Edit</a> <a class="btn btn-danger" href="#">Delete</a></td>
                        </tr>
                        <tr>
                            <td>Laptop</td>
                            <td>
                                <div class="badge badge-success">Hardware</div>
                            </td>
                            <td>Aset hardware berupa laptop</td>
                            <td><a class="btn btn-primary" href="#">Edit</a> <a class="btn btn-danger" href="#">Delete</a></td>
                        </tr>
                        <tr>
                            <td>Monitor</td>
                            <td>
                                <div class="badge badge-success">Hardware</div>
                            </td>
                            <td>Aset hardware berupa monitor</td>
                            <td><a class="btn btn-primary" href="#">Edit</a> <a class="btn btn-danger" href="#">Delete</a></td>
                        </tr>
                        <tr>
                            <td>Printer</td>
                            <td>
                                <div class="badge badge-success">Hardware</div>
                            </td>
                            <td>Aset hardware berupa printer</td>
                            <td><a class="btn btn-primary" href="#">Edit</a> <a class="btn btn-danger" href="#">Delete</a></td>
                        </tr>
                        <tr>
                            <td>Scanner</td>
                            <td>
                                <div class="badge badge-success">Hardware</div>
                            </td>
                            <td>Aset hardware berupa scanner</td>
                            <td><a class="btn btn-primary" href="#">Edit</a> <a class="btn btn-danger" href="#">Delete</a></td>
                        </tr>
                        <tr>
                            <td>Toner</td>
                            <td>
                                <div class="badge badge-success">Hardware</div>
                            </td>
                            <td>Aset hardware berupa toner</td>
                            <td><a class="btn btn-primary" href="#">Edit</a> <a class="btn btn-danger" href="#">Delete</a></td>
                        </tr>
                        <tr>
                            <td>Processor</td>
                            <td>
                                <div class="badge badge-primary">Komponen</div>
                            </td>
                            <td>Aset komponen berupa processor</td>
                            <td><a class="btn btn-primary" href="#">Edit</a> <a class="btn btn-danger" href="#">Delete</a></td>
                        </tr>
                        <tr>
                            <td>RAM</td>
                            <td>
                                <div class="badge badge-primary">Komponen</div>
                            </td>
                            <td>Aset komponen berupa RAM</td>
                            <td><a class="btn btn-primary" href="#">Edit</a> <a class="btn btn-danger" href="#">Delete</a></td>
                        </tr>
                        <tr>
                            <td>Harddisk</td>
                            <td>
                                <div class="badge badge-primary">Komponen</div>
                            </td>
                            <td>Aset komponen berupa harddisk</td>
                            <td><a class="btn btn-primary" href="#">Edit</a> <a class="btn btn-danger" href="#">Delete</a></td>
                        </tr>
                        <tr>
                            <td>SSD</td>
                            <td>
                                <div class="badge badge-primary">Komponen</div>
                            </td>
                            <td>Aset komponen berupa SSD</td>
                            <td><a class="btn btn-primary" href="#">Edit</a> <a class="btn btn-danger" href="#">Delete</a></td>
                        </tr>
                        <tr>
                            <td>VGA</td>
                            <td>
                                <div class="badge badge-primary">Komponen</div>
                            </td>
                            <td>Aset komponen berupa VGA</td>
                            <td><a class="btn btn-primary" href="#">Edit</a> <a class="btn btn-danger" href="#">Delete</a></td>
                        </tr>
                        <tr>
                            <td>Power Supply</td>
                            <td>
                                <div class="badge badge-primary">Komponen</div>
                            </td>
                            <td>Aset komponen berupa power supply</td>
                            <td><a class="btn btn-primary" href="#">Edit</a> <a class="btn btn-danger" href="#">Delete</a></td>
                        </tr>
                        <tr>
                            <td>Keyboard</td>
                            <td>
                                <div class="badge badge-secondary">Aksesoris</div>
                            </td>
                            <td>Aset aksesoris berupa keyboard</td>
                            <td><a class="btn btn-primary" href="#">Edit</a> <a class="btn btn-danger" href="#">Delete</a></td>
                        </tr>
                        <tr>
                            <td>Mouse</td>
                            <td>
                                <div class="badge badge-secondary">Aksesoris</div>
                            </td>
                            <td>Aset aksesoris berupa mouse</td>
                            <td><a class="btn btn-primary" href="#">Edit</a> <a class="btn btn-danger" href="#">Delete</a></td>
                        </tr>
                        <tr>
                            <td>Speaker</td>
                            <td>
                                <div class="badge badge-secondary">Aksesoris</div>
                            </td>
                            <td>Aset aksesoris berupa speaker</td>
                            <td><a class="btn btn-primary" href="#">Edit</a> <a class="btn btn-danger" href="#">Delete</a></td>
                        </tr>
                        <tr>
                            <td>Webcam</td>
                            <td>
                                <div class="badge badge-secondary">Aksesoris</div>
                            </td>
                            <td>Aset aksesoris berupa webcam</td>
                            <td><a class="btn btn-primary" href="#">Edit</a> <a class="btn btn-danger" href="#">Delete</a></td>
                        </tr>
                        <tr>
                            <td>Sistem Operasi</td>
                            <td>
                                <div class="badge badge-info">Lisensi</div>
                            </td>
                            <td>Aset lisensi sistem operasi</td>
                            <td><a class="btn btn-primary" href="#">Edit</a> <a class="btn btn-danger" href="#">Delete</a></td>
                        </tr>
                        <tr>
                            <td>Aplikasi</td>
                            <td>
                                <div class="badge badge-info">Lisensi</div>
                            </td>
                            <td>Aset lisensi aplikasi</td>
                            <td><a class="btn btn-primary" href="#">Edit</a> <a class="btn btn-danger" href="#">Delete</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
