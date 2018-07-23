@extends ('layouts.app')

@section ('content')
    <div class="container">
        
        <h1 class="card-header bg-info">Post Details <small>({{ $post->category->title }})</small><a class="btn btn-light float-right" data-toggle="modal" 
                data-target="#deleteConfirmModal" 
                data-action="{{ url('/posts', ['id' => $post->id]) }}" 
                data-title="{{ $post->title}}" 
                data-time="{{ $post->created_at }}"
                {{ $user->id === $post->user_id ? '' : 'disabled'}}>
                        Delete Post
                </a></h1>
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

    <div id="deleteConfirmModal" class="modal fade" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title">Are you sure you want to delete this post?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="title">
                </div>
                <div class="modal-footer">
                    <form id="form_delete_post" method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-info">Yes</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection