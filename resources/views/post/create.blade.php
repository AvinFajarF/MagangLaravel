@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-bold">{{ __('Create Category') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('tag.StoreTag') }}">
                        @csrf

                        {{-- Images --}}
                        <div class="row mb-3">
                            <label
                                for="images"
                                class="col-md-4 col-form-label text-md-end"
                            >{{ __('Foto') }}</label>
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <div>
                                        @if (auth()->user()->photo)
                                            <img src="{{ Storage::url(auth()->user()->photo) }}" class="img-fluid mb-3 rounded">
                                        @endif
                                        <input
                                            name="images"
                                            class="form-control @error('images') is-invalid @enderror"
                                            value=""
                                            type="file"
                                            accept="image/*"
                                            id="formFile"
                                            required
                                        >
                                        <small
                                            for="formFile"
                                            class="form-label"
                                        >Silahkan Upload Foto Anda</small>
                                    </div>
                                </div>
                                @error('images')
                                    <span
                                        class="invalid-feedback"
                                        role="alert"
                                    >
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- title --}}
                        <div class="row mb-3">
                            <label for="category" class="col-md-2 col-form-label text-center">{{ __('Category Name') }}</label>

                            <div class="col-md-10">
                                <input id="category" required type="text" class="form-control @error('category') is-invalid @enderror" name="name" value="{{ old('category') }}" autocomplete="category">

                                @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Content --}}
                        <div class="row mb-3">
                            <label for="category" class="col-md-2 col-form-label text-center">{{ __('Category Name') }}</label>

                            <div class="col-md-10">
                                {{-- <input id="category" required type="text" class="form-control @error('category') is-invalid @enderror" name="name" value="{{ old('category') }}" autocomplete="category"> --}}

                                <label for="exampleFormControlTextarea1">Example textarea</label>
                                <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3"></textarea>

                                @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-5">
                                <button type="submit" class="btn btn-secondary">
                                    {{ __('Create') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
