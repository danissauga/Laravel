@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Show post -> {{ $post->title }} <- details </h2>
    <a class="btn btn-secondary" href="{{route('post.index')}}">Back to Post`s list</a>
<div class="row">
    <p>Post ID: {{ $post->id }}</p>
    <p>Post Title: {{ $post->title }}</p>
    <p>Post Content: {{ $post->postContent }}</p>
    <p>Post Category: {{ $post->postHasCategory->title }}</p>
</div>

</div>
@endsection