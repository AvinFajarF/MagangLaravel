{{-- @extends('auth.app')

@section('content')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}





<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{!! asset('assets/css/login.css') !!}">
    <title>Hello, world!</title>

    <style>
        $font-src: "../font/";

        @font-face {
            font-family: 'Hornbach';
            src: url('#{$font-src}/KaushanScript-Regular.otf') format('truetype');
        }
    </style>
</head>

<body>


    <nav class="navbar navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand">Navbar</a>
            <a href="" class="d-flex btn btn-warning rounded-pill">Register</a>
        </div>
    </nav>


    <div class="container">
        <div class="row py-2 mt-1 align-items-center">
            <!-- For Demo Purpose -->
            <div class="col-md-5 pr-lg-5 mb-5 mb-md-0">
                <img src="{!! asset('images/testerr.jpg') !!}" alt="" class="img-fluid mb-3 d-none d-md-block foto">
                {{-- <h1 class="ms-4">Login</h1>
                    <p class="font-italic text-muted mb-0 ms-5">Silahkan login dahulu.</p> --}}

            </div>

            <!-- Registeration Form -->
            <div class="col-md-7 col-lg-6 ml-auto forum">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <h5 id="logind">Log In</h5>
                    <p id="loginss">Silahkan login terlebih dahulu agar dapat bisa mengakses web</p>
                    <div class="login">
                        <div class="row mb-3">
                            <input type="email" id="email" type="email"
                                class="rounded-pill w-75 form-control @error('email') is-invalid @enderror"
                                placeholder="email" name="email" value="{{ old('email') }}" required
                                autocomplete="email" autofocus>
                        </div>

                        <div class="row mb-3">
                            <input id="password" type="password"
                                class="rounded-pill w-75 form-control @error('password') is-invalid @enderror"
                                placeholder="password" name="password" required autocomplete="current-password">
                        </div>
                    </div>
            </div>

            <button class="btn btn-primary w-25 rounded-pill" id="btns" type="submit">
                {{ __('Login') }}</button>

            </form>
        </div>
    </div>
    </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
