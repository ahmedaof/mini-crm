@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">title</th>
                            <th scope="col">description</th>
                            <th scope="col">image</th>
                            <th scope="col">audio</th>
                            <th scope="col">created By</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>{{ $podcast->title }}</td>
                            <td>{{ $podcast->desc }}</td>
                            <td><img style="width: 50px; height:50px" src="{{ asset('') }}images/podcast/{{ $podcast->image }}" alt="England flag" />
                            </td>
                          
                            <td>  <audio controls>
                              <source src="{{ asset('') }}audio/podcast/{{ $podcast->mp3 }}" type="audio/ogg">
                            </audio></td>
                            <td>
                                {{ $podcast->user->name }}
                            </td>
                          </tr>
                     
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
