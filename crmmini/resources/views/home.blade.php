@extends('layouts.app')

@section('content')
    <div id="carouselExampleControls" class="carousel slide mb-3" data-ride="carousel" style="margin-top: -1.5em !important">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{ asset('') }}images/1610150182.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('') }}images/1610472014.jpg" alt="Second slide">
            </div>

        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">title</th>
                            <th scope="col">description</th>
                            <th scope="col">image</th>
                            <th scope="col">audio</th>
                            <th scope="col">action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($podcasts as $podcast)
                            <tr>
                                <td>{{ $podcast->title }}</td>
                                <td>{{ $podcast->desc }}</td>
                                <td><img style="width: 50px; height:50px"
                                        src="{{ asset('') }}images/podcast/{{ $podcast->image }}"
                                        alt="England flag" />
                                </td>

                                <td> <audio controls>
                                        <source src="{{ asset('') }}audio/podcast/{{ $podcast->mp3 }}"
                                            type="audio/ogg">
                                    </audio></td>
                                <td>
                                    <a href="show/{{ $podcast->id }}/{{ str_slug($podcast->title, '-') }}"
                                        class="btn btn-primary">show</a>
                                </td>
                            </tr>
                        @empty
                            <h2>no podcasts added</h2>
                        @endforelse

                    </tbody>
                </table>
                <div class="row justify-content-center mt-5 mb-2">

                    <a class="btn btn-primary col-md-4 justify-content-center`" href="/pod-casts"> go to podcast</a>
                </div>
            </div>
        </div>
    </div>
    <style>
        .w-100 {
            max-height: 30em !important;
        }

    </style>
    </div>
@endsection
