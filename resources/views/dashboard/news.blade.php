@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">News Dashboard</h2>

    <div class="row">
        @foreach($news as $item)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100">
                <img src="{{ asset($item->news_header_image) }}" class="card-img-top" alt="news image">

                <div class="card-body">
                    <h5 class="card-title">{{ $item->news_heading }}</h5>
                    <p class="card-text">{{ Str::limit($item->short_description, 100) }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection