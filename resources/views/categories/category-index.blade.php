@extends ('layouts.app')

@section ('content')

<div class="container">

    <div class="jumbotron">
        <h1>Categories</h1>
        <h1><small>Click to see overview</small></h1>
    </div>
    <div class="row">
        @foreach ($categories as $category)
            <a href="categories/{{ $category->id }}" class="btn btn-primary btn-block text-white">{{ $category->title }}</a>
        @endforeach
    </div>
</div>

@endsection