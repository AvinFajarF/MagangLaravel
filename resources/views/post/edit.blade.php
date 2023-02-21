@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">{{ __('Edit Posts') }}</div>
                    <div class="card-body">
                        <form action="{{route('posts.update', $posts->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            {{-- TITLE --}}
                            <div class="row mb-3">
                                <label for="title"
                                    class="col-md-4 col-form-label text-md-end">{{ __('title') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text"
                                        class="form-control @error('title') is-invalid @enderror" value="{{$posts->title}}" name="title">

                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Content --}}
                            <div class="row mb-3">
                                <label for="content"
                                    class="col-md-4 col-form-label text-md-end">{{ __('content') }}</label>

                                <div class="col-md-6">
                                    <textarea  placeholder="{{$posts->title}}" id="content" type="text" class="form-control @error('content') is-invalid @enderror" name="content"></textarea>

                                    @error('content')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- images --}}
                            <div class="row mb-3">
                                <label for="image"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Foto') }}</label>
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <div>
                                            <input name="image" class="form-control @error('image') is-invalid @enderror"
                                                 type="file"
                                                accept="image/*" id="formFile">
                                            <small for="formFile" class="form-label">Silahkan Upload Foto Anda</small>
                                        </div>
                                    </div>
                                    @if ($errors->has('image'))
                            <span class="text-danger">{{ $errors->first('image') }}</span>
                        @endif
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                              {{-- Check box  Category--}}


                              <div class="row mb-3">
                                <label for="Chategory"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Chategory') }}</label>
                                <div class="col-md-6">

                                    <div class="input-group mb-3" id="check">
                                        <div class="input-group-prepend">
                                          <label class="input-group-text" for="inputGroupSelect01">Chategory</label>
                                        </div>
                                        <select class="custom-select" id="inputGroupSelect01">
                                          <option selected>Choose...</option>
                                          <option value="1">One</option>
                                          <option value="2">Two</option>
                                          <option value="3">Three</option>
                                        </select>
                                      </div>

                                    @error('content')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            {{-- Checkbox Tags --}}
                            <div class="row mb-3">
                                <label for="Tag"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Tag') }}</label>
                                <div class="col-md-6">

                                    <div class="input-group mb-3" id="check">
                                        <div class="input-group-prepend">
                                          <label class="input-group-text" for="inputGroupSelect01">Tag</label>
                                        </div>
                                        <select class="custom-select" id="inputGroupSelect01">
                                          <option selected>Choose...</option>
                                          <option value="1">One</option>
                                          <option value="2">Two</option>
                                          <option value="3">Three</option>
                                        </select>
                                      </div>

                                    @error('content')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            {{-- Save --}}
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-dark">
                                        {{ __('Save') }}
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
