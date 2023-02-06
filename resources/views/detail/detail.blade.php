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
    <link rel="stylesheet" href="{!! asset('assets/css/users.css') !!}">
    <title>Detail Users</title>
</head>

<body>


    {{$user}}

    <section class="vh-100" style="background-color: #eee;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-12 col-xl-4">

              <div class="card" style="border-radius: 15px;">
                <div class="card-body text-center">
                  <div class="mt-3 mb-4">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava2-bg.webp"
                      class="rounded-circle img-fluid" style="width: 100px;" />
                  </div>
                  <h4 class="mb-2">Julie L. Arsenault</h4>
                  <p class="text-muted mb-4">@Programmer <span class="mx-2">|</span> <a
                      href="#!">mdbootstrap.com</a></p>
                  <div class="mb-4 pb-2">
                    <button type="button" class="btn btn-outline-primary btn-floating">
                      <i class="fab fa-facebook-f fa-lg"></i>
                    </button>
                    <button type="button" class="btn btn-outline-primary btn-floating">
                      <i class="fab fa-twitter fa-lg"></i>
                    </button>
                    <button type="button" class="btn btn-outline-primary btn-floating">
                      <i class="fab fa-skype fa-lg"></i>
                    </button>
                  </div>

                  <a href="/users/update/{{$user}}" class="btn btn-primary btn-rounded btn-lg">Update</a>


            </div>
          </div>
        </div>
      </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
