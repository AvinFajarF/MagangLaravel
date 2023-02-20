@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('Create Category') }}</div>
                <div class="card-body">
                    <form
                        action="{{ route('categories.Editcategories', $category->id) }}"
                        method="POST"
                    >
                        @method('put')
                        @csrf
                        {{-- Name --}}
                        <div class="row mb-3">
                            <label
                                for="name"
                                class="col-md-4 col-form-label text-md-end"
                            >{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input
                                    id="name"
                                    type="text"
                                    class="form-control @error('name') is-invalid @enderror"
                                    name="name"
                                    value="{{$category->name}}"
                                >

                                @error('name')
                                    <span
                                        class="invalid-feedback"
                                        role="alert"
                                    >
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Alamat --}}
                        <div class="row mb-3">
                            <label
                                for="description"
                                class="col-md-4 col-form-label text-md-end"
                            >{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea
                                    id="description"
                                    type="text"
                                    class="form-control @error('description') is-invalid @enderror"
                                    name="description"
                                >{{$category->description}}</textarea>

                                @error('description')
                                    <span
                                        class="invalid-feedback"
                                        role="alert"
                                    >
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Save --}}
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
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
