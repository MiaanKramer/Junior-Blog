@extends ('layouts.app')

@section ('content')

<div class="container">

        <div class="card">
            <div class="card-body bg-info">
                <h1 class="card-title text-white">Posts</h1>
                <p class="lead text-white">All Posts related to this category are displayed below.</p>
            </div>
            @foreach($posts as $post)
            <div class="card-body">
                <div class="card-header bg-info">
                    <h5 class="card-title text-white">{{ $post->title }}</h5>
                    <h6 class="card-subtitle mb-2 text-white">By {{ $post->user->name }}</h6>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $post->formatDate() }}</h6>
                </div>
                <blockquote class="card-body">
                    <p>{{ $post->body }}</p>
                </blockquote>
                
                <div class="card-footer">
                    <a href="/posts/{{ $post->id }}" class="btn btn-info">Read Comments</a>
                </div>
            </div>
            @endforeach
        </div>
</div>

@endsection