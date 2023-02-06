<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{!! asset('assets/css/update.css') !!}">
    <title>Detail Users</title>
</head>

<body>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <!-- START FORM -->
    <div class="card">
        <div class="update">
            <div class="continer">
                <form action='/users/update/submit' method='POST' enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    {{-- name --}}
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text"
                                class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ Session::get('username')}}"  autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="tanggal_lahir"
                            class="col-md-4 col-form-label text-md-end">{{ __('tanggal_lahir') }}</label>

                        <div class="col-md-6">
                            <input id="tanggal_lahir" value="{{ Session::get('tanggal_lahir')}}" type="date"
                                class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir"
                                >

                            @error('tanggal_lahir')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    {{-- Jenis Kelamin --}}
                    <div class="row mb-3">
                        <label for="jenis_kelamin"
                            class="col-md-4 col-form-label text-md-end">{{ __('jenis_kelamin') }}</label>

                        <div class="col-md-6">

                            <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect01">jenis kelamin</label>
                                <select class="form-select" value="{{ Session::get('jenis_kelamin')}}" name="jenis_kelamin" id="inputGroupSelect01">
                                    <option selected hidden> {{Session::get('jenis_kelamin')}} </option>
                                    <option value="laki-laki">laki-laki</option>
                                    <option value="wanita">wanita</option>
                                </select>
                            </div>

                            @error('jenis_kelamin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    {{-- images --}}
                    <div class="row mb-3">
                        <label for="images"
                            class="col-md-4 col-form-label text-md-end">{{ __('images') }}</label>

                        <div class="col-md-6">

                            <div class="input-group mb-3">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Silahkan upload foto anda </label>
                                    <input name="images" class="form-control" type="file" id="formFile">
                                  </div>
                            </div>

                            @error('images')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    {{-- alamat --}}
                    <div class="row mb-3">
                        <label for="alamat" class="col-md-4 col-form-label text-md-end">{{ __('alamat') }}</label>

                        <div class="col-md-6">
                            <input id="alamat" value="{{ Session::get('alamat')}}" type="alamat"
                                class="form-control @error('alamat') is-invalid @enderror" name="alamat" required>

                            @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="mb-3 row">
                        <label for="jurusan" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <button type="submit" id="tombol" class="btn btn-primary">submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
