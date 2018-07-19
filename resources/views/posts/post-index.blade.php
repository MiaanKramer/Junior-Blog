@extends('layouts.app')


@section('content')

        <div class="container">
            <div class="jumbotron">
                <h1 class="display-4">Your Posts</h1>
                <p class="lead">All your posts are displayed here.</p>
                <hr class="my-4">
                <p>Click the button to create a new post.</p>
                <a class="btn btn-primary btn-lg" href="/posts/create" role="button">Create Post</a>
            </div>
            @foreach ($posts as $post)
            <div class="card">
                <div class="card-header bg-primary">
                    <a class="btn float-right" data-toggle="modal" data-target="#{{ $post->id }}"><span>&#10007;</span></a>
                    <h3>{{ $post->title }} <small>({{ $post->category->title }})</small></h3>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $post->body }}</p>
                    <hr class="my-4">
                    <a href="posts/{{ $post->id }}" class="btn btn-primary btn-lg">View Post</a>
                    <a href="posts/{{ $post->id }}/edit" class="btn btn-info btn-lg ">Edit</a>
                </div>
            </div>
            <hr>
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