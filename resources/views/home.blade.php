@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron">
        <h1>Home</h1>
        <h2><small>Welcome back {{ $user->name }}</small></h2>
    </div>

    <a href="categories" class="btn btn-primary btn-lg btn-block">Categories</a>
    <hr>
    <a href="posts/10" class="btn btn-primary btn-lg btn-block">Newest Posts</a>
    <hr>
    <a href="posts" class="btn btn-primary btn-lg btn-block">My Posts</a>
</div>
@endsection


    <!-- // TODO: display list of categories

    // TODO: button: 'show all / index' -> category index

    // TODO: display list of posts, most recent, max 10

    // TODO: button: 'show all / index' -> post index -->


