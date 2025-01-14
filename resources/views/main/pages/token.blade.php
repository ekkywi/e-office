@extends("main.layouts.main")
@section("title")
    Token {!! "&mdash;" !!} E-Office
@endsection
@section("content")
    <section class="section">
        <div class="section-header">
            <h1>Token</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ url("dashboard") }}">E-Office</a></div>
                <div class="breadcrumb-item"><a href="{{ url("maintenance") }}">Maintenance</a></div>
                <div class="breadcrumb-item active">Token</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Token</h4>
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
                                        <th>Action</th>
                                    </tr>
                                    <!-- Add your table rows here -->
                                    <tr>
                                        <td>
                                            <div class="custom-checkbox custom-control">
                                                <input class="custom-control-input" data-checkboxes="mygroup" id="checkbox-1" type="checkbox">
                                                <label class="custom-control-label" for="checkbox-1">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>Contoh Nama</td>
                                        <td>
                                            <button class="btn btn-success btn-generate-token" data-id="1">Generate Token</button>
                                        </td>
                                    </tr>
                                    <!-- Add more rows as needed -->
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div aria-hidden="true" aria-labelledby="addUserModalLabel" class="modal fade" id="addUserModal" role="dialog" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Tambah Data Pengguna</h5>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" method="POST">
                    @csrf
                    <div class="modal-body">
                        <!-- Form fields here -->
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal" type="button">Close</button>
                        <button class="btn btn-primary" type="submit">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
