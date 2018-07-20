@extends ('layouts.app')

@section ('content')

<div class="container">
    <div class="jumbotron">
        <h1><strong>{{ $category->title }}</strong> <small>({{ $posts->count() }} {{ $posts->count() > 1 ? 'Posts' : 'Post' }})</small></h1>
    </div>
</div>

@endsection