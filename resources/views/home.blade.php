@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>

    // TODO: display list of categories

    // TODO: button: 'show all / index' -> category index

    // TODO: display list of posts, most recent, max 10

    // TODO: button: 'show all / index' -> post index


</div>
@endsection
