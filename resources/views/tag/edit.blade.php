@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">{{ __('Edit tag') }}</div>
                    <div class="card-body">
                        <form action="/tag/edit/{{$tags->id}}" method="POST">
                            @method("PUT")
                            @csrf
                            {{-- Name --}}
                            <div class="row mb-3">
                                <label for="tags"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Tag') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name" value="{{$tags->name}}" placeholder="Edit tags">

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="row mb-4">
                                        <div class="ms-5">
                                            <button
                                                type="submit"
                                                class="btn btn-dark"
                                            >
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
