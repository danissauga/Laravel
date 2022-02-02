@extends('layouts.app')
@section('content')

<div class="container">
    <h1>Edit article data</h1>

<form class="form-control" action="{{ route('article.store') }}" method="POST">

<input class="form-control" name="article_title" type="text" placeholder="Article title">
<input class="form-control" name="article_excerpt" type="text" placeholder="Article excerpt">
<input class="form-control" name="article_author" type="text" placeholder="Article Author">
<input class="form-control" name="article_description" type="text" placeholder="Article deskription">

<select class="form-select" name="article_image">
@foreach ($articleimages as $image)
        <option value="{{ $image->id }}">{{ $image->src }}</option>
    @endforeach
</select>

@csrf
<input class="btn btn-primary" type="submit" value="Update">
<a class="btn btn-secondary" href="{{ route('article.index') }}">Back to list</a>

</form>

</div>

@endsection