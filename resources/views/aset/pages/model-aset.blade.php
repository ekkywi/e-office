@extends("aset.layouts.app")

@section("title")
    Model Aset {!! "&mdash;" !!} ITAM
@endsection

@section("content")
    <section class="section">
        <div class="section-header">
            <h1>Model Aset</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ url("itam/dashboard") }}"><i class="fas fa-laptop"></i> IT Asset Management</a></div>
                <div class="breadcrumb-item"><i class="fas fa-cog"></i> Pengaturan</div>
                <div class="breadcrumb-item active"><i class="fas fa-spa"></i> Model Aset</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Jenis Model Aset</h2>
            <p class="section-lead">Daftar model aset</p>

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
                            <th>Nama Model</th>
                            <th>Gambar</th>
                            <th>Seri</th>
                            <th>Nomor Model</th>
                            <th>Merk</th>
                            <th>Kategori</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Dell Optiplex 780</td>
                            <td><img alt="" height="50" src="{{ asset("images/assets/dell-optiplex-780.jpg") }}"></td>
                            <td>Optiplex</td>
                            <td>780</td>
                            <td>Dell</td>
                            <td>
                                <div class="badge badge-success">Komputer</div>
                            </td>
                            <td><a class="btn btn-primary" href="#">Edit</a> <a class="btn btn-danger" href="#">Delete</a></td>
                        </tr>
                        <tr>
                            <td>Lenovo Thinkpad T460</td>
                            <td><img alt="" height="50" src="{{ asset("images/assets/thinkpad-t460.png") }}"></td>
                            <td>Thinkpad</td>
                            <td>T460</td>
                            <td>Lenovo</td>
                            <td>
                                <div class="badge badge-success">Laptop</div>
                            </td>
                            <td><a class="btn btn-primary" href="#">Edit</a> <a class="btn btn-danger" href="#">Delete</a></td>
                        </tr>
                        <tr>
                            <td>Samsung Essential Monitor S3</td>
                            <td><img alt="" height="50" src="{{ asset("images/assets/samsung-essential-monitor-s3.jpg") }}"></td>
                            <td>Essential Monitor</td>
                            <td>S3</td>
                            <td>Samsung</td>
                            <td>
                                <div class="badge badge-success">Monitor</div>
                            </td>
                            <td><a class="btn btn-primary" href="#">Edit</a> <a class="btn btn-danger" href="#">Delete</a></td>
                        </tr>
                        <tr>
                            <td>Epson L Series L121</td>
                            <td><img alt="" height="50" src="{{ asset("images/assets/epson-l121.jpg") }}"></td>
                            <td>L Series</td>
                            <td>L121</td>
                            <td>Epson</td>
                            <td>
                                <div class="badge badge-success">Printer</div>
                            </td>
                            <td><a class="btn btn-primary" href="#">Edit</a> <a class="btn btn-danger" href="#">Delete</a></td>
                        </tr>
                        <tr>
                            <td>Epson Workforce DS-50000</td>
                            <td><img alt="" height="50" src="{{ asset("images/assets/epson-workforce-ds-50000.png") }}"></td>
                            <td>Workforce</td>
                            <td>DS-50000</td>
                            <td>Epson</td>
                            <td>
                                <div class="badge badge-success">Scanner</div>
                            </td>
                            <td><a class="btn btn-primary" href="#">Edit</a> <a class="btn btn-danger" href="#">Delete</a></td>
                        </tr>
                        <tr>
                            <td>Toner Printer Epson Laserjet 85A</td>
                            <td><img alt="" height="50" src="{{ asset("images/assets/toner-85a.jpg") }}"></td>
                            <td>Laserjet</td>
                            <td>85A</td>
                            <td>Epson</td>
                            <td>
                                <div class="badge badge-success">Toner</div>
                            </td>
                            <td><a class="btn btn-primary" href="#">Edit</a> <a class="btn btn-danger" href="#">Delete</a></td>
                        </tr>
                        <tr>
                            <td>Intel Core i7 14400K</td>
                            <td><img alt="" height="50" src="{{ asset("images/assets/core-i7-14400k.jpg") }}"></td>
                            <td>Core Series</td>
                            <td>14400K</td>
                            <td>Intel</td>
                            <td>
                                <div class="badge badge-primary">Processor</div>
                            </td>
                            <td><a class="btn btn-primary" href="#">Edit</a> <a class="btn btn-danger" href="#">Delete</a></td>
                        </tr>
                        <tr>
                            <td>Corsair Vengeance LPX 16GB DDR4</td>
                            <td><img alt="" height="50" src="{{ asset("images/assets/corsair-vengeance-lpx.jpg") }}"></td>
                            <td>Vengeance Series</td>
                            <td>LPX</td>
                            <td>Corsair</td>
                            <td>
                                <div class="badge badge-primary">RAM</div>
                            </td>
                            <td><a class="btn btn-primary" href="#">Edit</a> <a class="btn btn-danger" href="#">Delete</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
