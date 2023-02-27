<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Konten</title>
    <link rel="stylesheet" href="{!! asset('assets/css/comments.css') !!}">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
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
    <div class="container d-flex align-items-center justify-content-center text-center"
        style="margin-top: 20vh; margin-left: 23%">
        <div class="row">
            <div class="col-lg-8">
                <img src="{{ asset('images/' . $data->image) }}" class="rounded border border-3 img-fluid mb-4"
                    alt="Gambar Konten">
                <h1 class="mb-3">{{ $data->title }}</h1>
                <p class="text-muted mb-3">Diposting oleh <i>{{ $data->created_by }}</i> pada <span
                        class="text-secondary">{{ $data->created_at }}</span></p>
                <hr>
                <div class="content mb-5">
                    <p>{{ $data->content }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-5"></div>



    <!-- resources/views/posts/index.blade.php -->


    <section class="content-item" id="comments">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <form action="{{route('comments')}}" method="POST">
                        @csrf
                        <h3 class="pull-left">New Comment</h3>
                        <button type="submit" class="btn btn-normal pull-right">Submit</button>
                        <fieldset>
                            <div class="row">
                                <div class="col-sm-3 col-lg-2 hidden-xs">
                                    @if (Auth::user()->images)
                                        <img class="img-responsive" src="{{ asset('images/' . Auth::user()->images) }}"
                                            width="100" alt="">
                                    @else
                                        <img class="img-responsive"
                                            src="{{ asset('images/person-default-23122312.gif') }}" width="100"
                                            alt="">
                                    @endif
                                </div>
                                <div class="form-group col-xs-12 col-sm-9 col-lg-10">
                                    <input type="hidden" name="post_id" value="{{ $data->id }}">
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <textarea class="form-control" name="content" id="message" placeholder="Your message" required=""></textarea>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                    <h3>{{$comments->count()}} Comments</h3>
                    @foreach ($comments as $item)
                    <div class="media">
                        <img class="img-responsive" src="{{ asset('images/' . $item->user->images) }}"
                        width="100" alt="">
                        <div class="media-body">

                            <h4 class="media-heading mt-4">{{$item->user->name}}</h4>
                            <p>{{$item->content}}
                            </p>
                            <ul class="list-unstyled list-inline media-detail pull-left">
                                <li><i class="fa fa-calendar"></i>{{$item->created_at}}</li>
                            </ul>
                        </div>
                    </div>

                    @endforeach


                </div>
            </div>
        </div>
    </section>






    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>
