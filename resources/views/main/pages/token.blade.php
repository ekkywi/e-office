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
                                <table class="table table-striped table-md text-center">
                                    <tr>
                                        <th>
                                            No
                                        </th>
                                        <th>Nama</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach ($users as $index => $user)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $user->nama }}</td>
                                            <td>
                                                <button class="btn btn-primary btn-generate-token" data-id="{{ $user->id }}" data-nama="{{ $user->nama }}" data-token="{{ $user->token }}">
                                                    <i class="fas fa-key"></i>
                                                    <span>Generate Token</span>
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

    {{-- Modal Generate Token --}}
    <div aria-hidden="true" aria-labelledby="tokenModalLabel" class="modal fade" id="tokenModal" role="dialog" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tokenModalLabel">Token for <span id="userName"></span></h5>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Token:</label>
                        <input class="form-control" id="userToken" readonly type="text">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal" type="button">Close</button>
                </div>
            </div>
        </div>
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
            $('.btn-generate-token').on('click', function() {
                let btn = $(this);
                let userId = btn.data('id');
                let userName = btn.data('nama');

                // Show loading state
                btn.prop('disabled', true);
                btn.html('<i class="fas fa-spinner fa-spin"></i> Generating...');

                $.ajax({
                    url: `/token/generate/${userId}`,
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.success) {
                            $('#userName').text(userName);
                            $('#userToken').val(response.token);
                            $('#tokenModal').modal('show');

                            // Update button data attribute
                            btn.data('token', response.token);
                        } else {
                            swal('Error', 'Failed to generate token', 'error');
                        }
                    },
                    error: function() {
                        swal('Error', 'Server error occurred', 'error');
                    },
                    complete: function() {
                        // Reset button state
                        btn.prop('disabled', false);
                        btn.html('<i class="fas fa-key"></i> Generate Token');
                    }
                });
            });
        });
    </script>
@endsection
