<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{!! asset('assets/css/detail.css') !!}">

    <title>{{$users->name}}</title>
  </head>
  <body>


    <section class="section about-section gray-bg" id="about">
        <div class="container">
            <div class="row align-items-center flex-row-reverse">
                <div class="col-lg-6">
                    <div class="about-text go-to">
                        <h3 class="dark-color">Details users</h3>
                        <div class="row about-list">
                            <div class="col-md-6">
                                <div class="media">
                                    <label>Tanggal Lahir: </label>
                                    <p>{{ $users->tanggal_lahir }}</p>
                                </div>
                                <div class="media">
                                    <label>role: </label>
                                    <p>{{ $users->role }}</p>
                                </div>

                                <div class="media">
                                    <label>Username: </label>
                                    <p>{{ $users->name }}</p>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="media">
                                    <label>E-mail: </label>
                                    <p>{{ $users->email }}</p>
                                </div>
                                <div class="media">
                                    <label>Jenis Kelamin: </label>
                                    <p>{{ $users->jenis_kelamin }}</p>
                                </div><br>
                                <a href="/user" class="btn btn-warning"><< Back</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-avatar">
                        @if ($users->images == '')
                        <img id="image" class="rounded-circle shadow-4-strong" src="{{ asset('images/person-default-23122312.gif') }}" title="" alt="">
                        @endif
                        <img id="image" class="rounded-circle shadow-4-strong" src="{{ asset('images/' . $users->images) }}" title="" alt="">

                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
