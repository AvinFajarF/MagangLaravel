@extends('layouts.app')

@section('content')

        <section class="section about-section gray-bg" id="about">
            <div class="container">
                <div class="row align-items-center flex-row-reverse">
                    <div class="col-lg-6">
                        <div class="about-text go-to">
                            <h3 class="dark-color">Details users</h3>
                            <div class="row about-list">
                                <div class="col-md-6">
                                    <div class="media">
                                        <label>Tanggal Lahir</label>
                                        <p>{{ $users->tanggal_lahir }}</p>
                                    </div>
                                    <div class="media">
                                        <label>role</label>
                                        <p>{{ $users->role }}</p>
                                    </div>

                                    <div class="media">
                                        <label>Username </label>
                                        <p>{{ $users->name }}</p>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="media">
                                        <label>E-mail</label>
                                        <p>{{ $users->email }}</p>
                                    </div>
                                    <div class="media">
                                        <label>Jenis Kelamin</label>
                                        <p>{{ $users->jenis_kelamin }}</p>
                                    </div><br>
                                    <a href="/users/update/{{ $users->id }}" class="btn btn-primary">Update</a>
                                    <a href="/logout" class="btn btn-danger"><i class="bi bi-door-open"></i> LogOut</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-avatar">
                            @if (Auth::user()->images == '')
                            <img id="image" class="rounded-circle shadow-4-strong" src="{{ asset('images/person-default-23122312.gif') }}" title="" alt="">
                            @endif
                            <img id="image" class="rounded-circle shadow-4-strong" src="{{ asset('images/' . $users->images) }}" title="" alt="">

                        </div>
                    </div>
                </div>
            </div>
        </section>





@endsection
