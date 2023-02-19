@extends('layouts.app')

@section('content')
 <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-bold">{{ __('Update tags') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('tag.EditTag',$tags->id) }}">
                            @csrf
                            @method('put')
                            <div class="row mb-3">
                                <label for="tags" class="col-md-2 col-form-label">{{ __('tags Name') }}</label>

                                <div class="col-md-12">
                                    <input id="tags" type="text" class="form-control @error('tags') is-invalid @enderror" name="name" value="{{ $tags->name }}" autocomplete="tags">

                                    @error('tags')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <input type="hidden" name="created_by" value="{{ Auth::user()->name }}">

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-5">
                                    <button type="submit" class="btn btn-secondary">
                                        {{ __('Update') }}
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
