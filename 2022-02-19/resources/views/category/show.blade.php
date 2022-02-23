@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Show category -> {{ $category->title }} <- details </h2>
<h3>This category has post`s</h3>
<a class="btn btn-secondary" href="{{route('category.index')}}">Back to Categories list</a>

@if (count($posts) == 0)
            <p class="mt-3">There is no posts in this category !</p>
@else
<table class="table table-hover">
    <thead>
        <tr>
            <td style="width: 50px;">@sortablelink('id','ID')</td>
            <td>@sortablelink('title','Title')</td>
            <td>@sortablelink('postContent','Post Content')</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->postContent }}</td>
        </tr>
        @endforeach
    </tbody>
    </table>
    {!! $posts->appends(Request::except('page'))->render() !!}
@endif
</div>
@endsection