@extends('layouts.app')


@section('content')

 <div class="container">
    <div class="row">

        @foreach($errors->all() as $message)
        <div>{{ $message }}</div>
        @endforeach

        <div class="card">
            <div class="card-body">
                <h3>{{ $create ? "Create Post" : "Edit Post" }}</h3>
                <form action="{{ $create ? route('posts.create') : route('posts.update', ['id' => $post->id]) }}" method="POST">
                    @if(!$create)
                        <input type="hidden" name="_method" value="PUT">
                    @endif
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input class="form-control" type="text" name="title" value="{{ old('title', isset($post) ? $post->title : '') }}">
                    </div>
                    <div class="form-group">
                        <label for="body">Body:</label>
                        <textarea class="form-control" name="body" value="{{ old('body', isset($post) ? $post->body : '') }}"></textarea>
                    </div>

                    <input class="btn btn-info" type="submit">
                    
                </form>
            </div>
        </div>
    </div>
</div>

@endsection