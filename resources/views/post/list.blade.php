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
                        <table class="table ">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>image</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Created By</th>
                                    <th>Action</th>
                                    <th>Pinned</th>
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
            userDatatable =  $('table').DataTable({
                 responsive: true,
                processing: true,
                serverSide: true,
                ajax: "{{ route('posts.list') }}",
                order: [],
                columns: [{
                        data: 'DT_RowIndex',
                        searchable: false,
                        sortable: false,
                    },
                    {
                        data: 'image',
                        sortable: false,
                    },
                    {
                        data: 'title',
                        sortable: true,
                    },
                    {
                        data: 'content',
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
                    {
                        data: 'is_pinned',
                        sortable: false
                    },
                ],
            });
        });
    </script>

<script src="{{ asset('assets/js/user/delete.js') }}"></script>

@endpush
