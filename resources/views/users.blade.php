    @extends('layouts.app')

    @section('content')
        @if (Session::has('status'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('message') }}
            </div>
        @endif

        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center mb-5"><br>
                        <h2 class="heading-section fst-italic fw-bold">List User</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-wrap">
                            <table class="table table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Jenis Kelamin</th>
                                        <th scope="col">Tanggal Lahir</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                @foreach ($users as $item)
                                    <tr class="alert" role="alert">
                                        <th scope="row">{{ $loop->index }}</th>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->jenis_kelamin }}</td>
                                        <td>{{ $item->tanggal_lahir }}</td>
                                        <form action="/users/delete/{{ $item->id }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <td><button class="btn btn-danger"><i class="bi bi-trash3"> </i></button>
                                            </td>
                                        </form>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection
