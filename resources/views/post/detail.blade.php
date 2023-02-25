<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Konten</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
</head>

<body>
    {{-- Navbar --}}
    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">Carousel</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Back</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

{{-- Content --}}
    <div class="container d-flex align-items-center justify-content-center text-center" style="margin-top: 20vh; margin-left: 23%">
        <div class="row">
            <div class="col-lg-8">
                <img src="{{asset('images/'.$data->image)}}" class="img-fluid mb-4" alt="Gambar Konten">
                <h1 class="mb-3">{{$data->title}}</h1>
                <p class="text-muted mb-3">Diposting oleh <i>{{$data->created_by}}</i> pada <span
                    class="text-secondary">{{$data->created_at}}</span></p>
                <hr>
                <div class="content mb-5">
                    <p>{{$data->content}}</p>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>