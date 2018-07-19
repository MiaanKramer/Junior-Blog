@extends ('layouts.app')

@section ('content')
    <div class="container">
        
        <h1>{{ $post->title }} <small>({{ $post->category->title }})</small><a href="posts/create" class="btn btn-primary pull-right">Remove Post</a></h1>
        <hr>
            {{ $post->body }}
        <hr>
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title"><strong>{{ $comments->count() }}</strong> Comments</h3>
            </div>
            <div class="panel-body">
                @foreach ($comments as $comment)
                    <h4><strong>{{ $comment->user->name }}</strong> <small>({{ $comment->created_at }})</small></h4>
                    <p>{{ $comment->content }}</p>
                    <hr>
                @endforeach
                {{ $comments->links() }}
            </div>
        </div>
    </div>

@endsection