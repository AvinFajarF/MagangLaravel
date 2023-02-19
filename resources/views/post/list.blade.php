@extends('layouts.app')
@push('styles')
    <link rel="stylesheet" href="{{ asset('vendor/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
@endpush

@section('content')
    @if (session('success'))
        <div class="container-fluid">
            <div class="row">
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            </div>
        </div>
    @endif

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Created By</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('table').DataTable({
                 responsive: true,
                processing: true,
                serverSide: true,
                ajax: "{{ route('tag.listTag') }}",
                order: [],
                columns: [{
                        data: 'DT_RowIndex',
                        searchable: false,
                        sortable: false,
                    },
                    {
                        data: 'name',
                        sortable: true,
                    },
                    {
                        data: 'created_by',
                        sortable: true,
                    },
                    {
                        data: 'action',
                        sortable: false,
                    },
                ],
            });
        });
    </script>
@endpush