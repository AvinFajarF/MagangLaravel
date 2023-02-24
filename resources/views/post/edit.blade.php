@extends('layouts.app')

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

@endpush

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header bg-success">{{ __('Edit Posts') }}</div>
                    <div class="card-body">
                        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            {{-- TITLE --}}
                            <div class="row mb-3">
                                <label for="title"
                                    class="col-md-4 col-form-label text-md-end">{{ __('title') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text"
                                        class="form-control @error('title') is-invalid @enderror"
                                        value="{{ $post->title }}" name="title">

                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="content"
                                    class="col-md-4 col-form-label text-md-end">{{ __('content') }}</label>
                                <div class="col-md-6">
                                    <textarea id="summernote" name="content">{{$post->content}}</textarea>


                                    @error('content')
                                       <span class="text-danger"> {{ $message }}</span>
                                    @enderror


                                </div>
                            </div>


                            {{-- Category --}}
                            <div class="row mb-3">
                                <label for="category"
                                    class="col-md-4 col-form-label text-md-end">{{ __('category') }}</label>
                                <div class="col-md-6 mt-2">
                                    <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                        @foreach ($categories as $category)
                                            <input type="checkbox" name="categories[]" class="btn-check me-4"
                                                id="categories_{{ $category->id }}" autocomplete="off"
                                                value="{{ old('category', $category->id) }}"
                                                {{ in_array($category->id, $post->category->pluck('id')->toArray()) ? 'checked' : '' }}>
                                            <label class="btn btn-sm btn-outline-success"
                                                for="categories_{{ $category->id }}">{{ $category->name }}</label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            {{-- Tag --}}
                            <div class="row mb-3">
                                <label for="tag"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Tag') }}</label>
                                <div class="col-md-6 mt-2">
                                    <div class="form-check form-check-inline">
                                        @foreach ($tags as $tag)
                                            <input class="form-check-input mx-2" type="checkbox" name="tags[]"
                                                id="tag_{{ $tag->id }}" value="{{ old('tag', $tag->id) }}"
                                                {{ in_array($tag->id, $post->tag->pluck('id')->toArray()) ? 'checked' : '' }}>
                                            <label class="form-check-label"
                                                for="tag_{{ $tag->id }}">{{ $tag->name }}</label>
                                        @endforeach

                                    </div>
                                </div>
                            </div>

                              {{-- pinned  --}}
                            <div class="row mb-3">
                                <label for="tag"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Pin') }}</label>
                                <div class="col-md-6 mt-2">
                                    <div class="form-check form-check-inline">

                                            <input class="form-check-input mx-2" type="checkbox" name="is_pinned"
                                                value="1">
                                            <label class="form-check-label">Pin</label>

                                            <input class="form-check-input mx-2" type="checkbox" name="is_pinned"
                                            value="0">
                                        <label class="form-check-label">No Pin</label>


                                    </div>
                                    <div class="error mb-3 mt-3">
                                        @error('is_pinned')
                                       <p class="text-danger"> {{ $message }} </p>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            {{-- images --}}
                            <div class="row mb-3">
                                <label for="image"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Foto') }}</label>
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <div>
                                            <input name="image" value="{{$post->image}}" class="form-control @error('image') is-invalid @enderror"
                                                type="file" accept="image/*" id="formFile">
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

    @push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
    crossorigin="anonymous"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>
    @endpush
@endsection
