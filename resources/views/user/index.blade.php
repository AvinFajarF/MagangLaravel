@extends('layouts.app')
@push('styles')
    <link rel="stylesheet" href="{{ asset('vendor/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/toastr/toastr.min.css') }}">
@endpush

@if (session('success'))
<div class="container-fluid">
    <div class="row">
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    </div>
</div>
@endif
@section('content')

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col table-responsive">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>foto</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('include.modal-delete')
@endsection

@push('scripts')
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        let userDatatable;
        $(document).ready(function() {
            userDatatable = $('table').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: "{{ route('user.list') }}",
                order: [],
                columns: [{
                        data: 'DT_RowIndex',
                        searchable: false,
                        sortable: false,
                    },
                    {
                        data: 'images',
                        sortable: false,
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'email'
                    },
                    {
                        data: 'role'
                    },
                    {
                        data: 'status'
                    },
                    {
                        data: 'action',
                        sortable: false,
                    },
                    // { data: 'detail', sortable: false,},
                ],
            });
        });
    </script>
    <script src="{{ asset('assets/js/user/delete.js') }}"></script>
    <script src="{{ asset('vendor/toastr/toastr.min.js') }}"></script>
    <script>
        const successMessage = "{{ session()->get('success') }}";
        if (successMessage) {
            toastr.success(successMessage)
        }
    </script>
@endpush
