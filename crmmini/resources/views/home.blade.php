@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
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
                            <td><img style="width: 50px; height:50px" src="{{ asset('') }}images/podcast/{{ $podcast->image }}" alt="England flag" />
                            </td>
                          
                            <td>  <audio controls>
                              <source src="{{ asset('') }}audio/podcast/{{ $podcast->mp3 }}" type="audio/ogg">
                            </audio></td>
                            <td>
                              <a  href="show/{{ $podcast->id }}" class="btn btn-primary">show</a>
                            </td>
                          </tr>
                          @empty
                            <h2>no podcasts added</h2>
                          @endforelse
                     
                        </tbody>
                      </table>
                    </div>
                </div>
                <div class="row justify-content-center mt-3 mb-2">

                    <a class="btn btn-primary col-md-4" href="/pod-casts"> go to podcast</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
