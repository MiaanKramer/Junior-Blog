@extends ('layout')

@section ('content')

<div class="container">
    <div class="row">
        @foreach ($categories as $category)
            <a href="{{ $category->title }}">
                <div class="card-header bg-primary">
                    {{ $category->title }}
                </div>
            </a>
        @endforeach
    </div>
</div>

@endsection