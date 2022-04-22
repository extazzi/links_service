@extends('main.content')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <span class="display-1 d-block">404</span>
                <div class="mb-4 lead">Sorry that link doesn't work!</div>
                <a href="{{ route('link.create') }}" class="btn btn-link">Create short link</a>
            </div>
        </div>
    </div>
@endsection
