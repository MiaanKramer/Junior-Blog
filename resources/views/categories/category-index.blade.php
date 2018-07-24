@extends ('layouts.app')

@section ('content')

<div class="container">

    <div class="jumbotron">
        <h1 class="display-4">Categories</h1>
        <p class="lead">Click a category to get a detailed overview</p>
    </div>
    <div class="row">
        @foreach ($categories as $category)
            <a href="categories/{{ $category->id }}" class="btn btn-primary btn-block text-white">{{ $category->title }}</a>
        @endforeach
    </div>
</div>

@endsection