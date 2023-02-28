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





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>
<body>
    <div class="2xl:container h-screen m-auto">
        <div hidden class="fixed inset-0 w-7/12 lg:block">


            <video class="w-full h-full object-cover" loop autoplay src="{{asset("assets/images/video.mp4")}}" poster="../public/images/bg.jpg"></video>
        </div>
        <div hidden role="hidden" class="fixed inset-0 w-6/12 ml-auto bg-white bg-opacity-70 backdrop-blur-xl lg:block"></div>
        <div class="relative h-full ml-auto lg:w-6/12">
            <div class="m-auto py-12 px-6 sm:p-20 xl:w-10/12">
                <div class="space-y-4">
                    <img class="w-80 mx-auto sm:w-auto" src="{{asset("assets/images/password.jpeg")}}" alt="" srcset="">
                    <p class=" font-medium text-lg text-gray-600">Welcome to Portal Berita ! Login first</p>
                </div>





                <form method="POST" action="{{ route('login') }}" class=" space-y-6 py-6">
                    @csrf
                    <div>
                        <input
                        name="email"
                        type="email"
                        placeholder="Email"
                        class="border shadow-lg w-full py-3 px-6 ring-1 ring-gray-300 rounded-xl placeholder-gray-600 bg-transparent transition disabled:ring-gray-200 disabled:bg-gray-100 disabled:placeholder-gray-400 invalid:ring-red-400 focus:invalid:outline-none"
                        >
                    </div>

                    <div class="flex flex-col items-end">
                        <input
                        name="password"
                                type="password"
                                placeholder="Password"
                                class="shadow-lg w-full py-3 px-6 ring-1 ring-gray-300 rounded-xl placeholder-gray-600 bg-transparent transition disabled:ring-gray-200 disabled:bg-gray-100 disabled:placeholder-gray-400 invalid:ring-red-400 focus:invalid:outline-none"
                        >
                        @if (Route::has('password.request'))
                        <button type="reset" class="w-max p-3 -mr-3">
                            <a class="text-sm tracking-wide text-blue-600" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        </button>
                        @endif
                    </div>

                    <div>
                        <button type="submit" class="shadow-lg border w-full px-6 py-3 rounded-xl bg-sky-500 transition hover:bg-sky-600 focus:bg-sky-600 text-white active:bg-sky-800">
                            {{ __('Login') }}
                        </button>
                        <a href="/register" type="reset" class="w-max p-3 -ml-3">
                            <span class="text-sm tracking-wide text-blue-600">Create new account</span>
                        </a>
                    </div>
                </form>


            </div>
        </div>
    </div>
</body>
</html>
