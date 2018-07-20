@extends ('layouts.app')

@section ('content')

<div class="container">
    <div class="row">
        @foreach ($categories as $category)
            <a href="categories/{{ $category->id }}" class="btn btn-primary btn-block text-white">{{ $category->title }}</a>
        @endforeach
    </div>
</div>

@endsection