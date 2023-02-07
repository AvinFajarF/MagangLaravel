<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSS Link --}}

    <link rel="stylesheet" href="{!! asset('assets/css/profile.css') !!}">

    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{!! asset('assets/css/users.css') !!}">
    <title>Detail Users</title>
</head>

<body>



    <div class="container">

        <section class="section about-section gray-bg" id="about">
            <div class="container">
                <div class="row align-items-center flex-row-reverse">
                    <div class="col-lg-6">
                        <div class="about-text go-to">
                            <h3 class="dark-color">Details users</h3>
                            <div class="row about-list">
                                <div class="col-md-6">
                                    <div class="media">
                                        <label>Tanggal Lahir</label>
                                        <p>{{ $users->tanggal_lahir }}</p>
                                    </div>
                                    <div class="media">
                                        <label>role</label>
                                        <p>{{ $users->role }}</p>
                                    </div>

                                    <div class="media">
                                        <label>Username </label>
                                        <p>{{ $users->name }}</p>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="media">
                                        <label>E-mail</label>
                                        <p>{{ $users->email }}</p>
                                    </div>
                                    <div class="media">
                                        <label>Jenis Kelamin</label>
                                        <p>{{ $users->jenis_kelamin }}</p>
                                    </div><br>
                                    <a href="/users/update/{{ $users->id }}" class="btn btn-primary">Update</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-avatar">
                            <img id="image" class="rounded-circle shadow-4-strong" src="{{ asset('storage/images/' . $users->images) }}" title="" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>


        {{-- <p class="text-center"><strong>Detail User</strong></p><br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">tanggal lahir</th>
                    <th scope="col">role</th>
                    <th scope="col">alamat</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>{{ $users->name }}</td>
                    <td>{{ $users->email }}</td>
                    <td>{{ $users->tanggal_lahir }}</td>
                    <td>{{ $users->role }}</td>
                    <td>{{ $users->alamat }}</td>
                    <td><a href="/users/update/{{ $users->id }}" class="btn btn-primary">Update</a></td>
                </tr>
            </tbody>
        </table>
        <img class="rounded mx-auto d-block" src="{{ asset('storage/images/' . $users->images) }}" width="200" alt="" srcset=""> --}}

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
