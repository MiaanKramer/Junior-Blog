@extends ('layouts.app')

@section ('content')
    <div class="container">
        
        <h1 class="card-header bg-info">Post Details <small>({{ $post->category->title }})</small><a href="posts/create" class="btn btn-outline-light float-right">Remove Post</a></h1>
        <div class="card">
            <div class="card-body">
                <h3 class="card-title"><strong>{{ $post->title }}</strong></h3>
                <hr class="my-4">
                <h5 class="card-text">{{ $post->body }}</h5>
                <hr class="my-4">
                <h5 class="card-text"><strong>{{ $comments->count() }}</strong> Comments</h5>
            </div>
        </div>
        <div class="modal-body">
            @foreach ($comments as $comment)
                <h4><strong>{{ $comment->user->name }}</strong> <small>({{ $comment->created_at }})</small></h4>
                <p>{{ $comment->content }}</p>
                <hr>
            @endforeach
            {{ $comments->links() }}
        </div>
    </div>

@endsection