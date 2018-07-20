@extends('layouts.app')

@section('content')

<div class="container">
    <div class="jumbotron">
        <h1>Home</h1>
        <h2><small>Welcome back {{ $user }}</small></h2>
    </div>
</div>
@endsection
