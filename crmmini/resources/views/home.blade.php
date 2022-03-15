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
                   @forelse($podcasts  as $podcast )
                   {{ $podcast->title }}
                       
                   @empty
                   no podast added
                       
                   @endforelse
                </div>
                <div class="row justify-content-center mt-3 mb-2">

                    <a class="btn btn-primary col-md-4" href="/pod-casts"> go to podcast</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
