@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron">
        <h1>Home</h1>
        <h2><small>Welcome back {{ $user->name }}</small></h2>
    </div>
</div>
@endsection


    <!-- // TODO: display list of categories

    // TODO: button: 'show all / index' -> category index

    // TODO: display list of posts, most recent, max 10

    // TODO: button: 'show all / index' -> post index -->


