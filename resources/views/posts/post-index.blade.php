@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">My Posts</h1>
            <p class="lead">My posts are displayed here.</p>
            <hr class="my-4">
            <p>Click the button to create a new post.</p>
            <a class="btn btn-primary btn-lg" href="/posts/create" role="button">Create Post</a>
        </div>
        @foreach ($posts as $post)
        <div class="card">
            <div class="card-header bg-primary text-white">
                <a class="btn float-right" data-toggle="modal" 
                data-target="#deleteConfirmModal" 
                data-action="{{ url('/posts', ['id' => $post->id]) }}" 
                data-title="{{ $post->title}}" 
                data-time="{{ $post->created_at }}">
                        <span style="font-size: 30px; line-height: 20px">
                            &times;
                        </span>
                </a>
                <h3>{{ $post->title }} <small>({{ $post->category->title }})</small></h3>
            </div>
            <div class="card-body">
                <p class="card-text">{{ $post->body }}</p>
                <hr class="my-4">
                <a href="posts/{{ $post->id }}" class="btn btn-outline-primary btn-lg">View Post</a>
                <a href="posts/{{ $post->id }}/edit" class="btn btn-light btn-lg ">Edit</a>
            </div>
        </div>
        <hr>
        @endforeach
        {{ $posts->links() }}
    </div>

    <!-- Modal -->

    <div id="deleteConfirmModal" class="modal fade" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title">Are you sure you want to delete this post?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="title">
                </div>
                <div class="modal-footer">
                    <form id="form_delete_post" method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-info">Yes</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>

        $('#deleteConfirmModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var postAction = button.data('action'); // Extract info from data-* attributes
            var title = button.data('title');
            var time = button.data('time');

            var titleHolder = document.getElementById('title');

            titleHolder.innerHTML = title + ' (' + time + ')';
            console.log(title);
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this);

            var form = document.getElementById('form_delete_post');
            
            console.log('Confirm delete: ', postAction);

            form.action = postAction;

        });

    </script>
@endpush