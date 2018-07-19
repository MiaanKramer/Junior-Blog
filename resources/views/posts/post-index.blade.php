@extends('layouts.app')


@section('content')

    <div class="container">
        <h1>Your Posts</h1>
        <a href="posts/create" class="btn btn-primary pull-right">Create Post</a>
        <p class="lead">All your posts will be displayed here.</p>
        <hr>
        @foreach ($posts as $post)
            <div class="panel panel-info">
                    <a class="glyphicon glyphicon-remove btn pull-right" data-toggle="modal" data-target="#{{ $post->id }}"></a>
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $post->title }} <span class="badge">{{ $post->comments_count }}</span></h3>
                    <h3 class="panel-title"><small>({{ $post->category->title }})</small></h3>
                </div>
                <div class="panel-body">
                    {{ $post->body }}
                </div>
                <div class="panel-footer">
                    <a href="posts/{{ $post->id }}" class="btn btn-primary">View Post</a>
                    <a href="posts/{{ $post->id }}/edit" class="btn btn-info">Edit</a>
                </div>
                <div class="text-center">
                </div>
            </div>
        @endforeach

        {{ $posts->links() }}
    </div>
    <div id="confirmModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="panel panel-info">
                    <button type="button" class="btn btn-info glyphicon glyphicon-remove pull-right" data-dismiss="modal"></button>
                <div class="panel-heading">
                    <h4 class="panel-title">Are you sure you want to delete this post?</h4>
                </div>
                <div class="panel-footer">
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
                    <form action="{{ url('/posts', ['id' => $post->id]) }}" method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-info">Yes</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection