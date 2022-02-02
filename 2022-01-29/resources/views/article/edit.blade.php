@extends('layouts.app')
@section('content')

<div class="container">
    <h1>Edit article data</h1>

<form class="form-control" action="{{ route('article.update',['article'=>$article]) }}" method="POST">

<input class="form-control" name="article_title" type="text" placeholder="Article title" value="{{ $article->title }}">
<input class="form-control" name="article_excerpt" type="text" placeholder="Article excerpt" value="{{ $article->excerpt }}">
<input class="form-control" name="article_author" type="text" placeholder="Article Author" value="{{ $article->author }}">
<input class="form-control" name="article_description" type="text" placeholder="Article deskription" value="{{ $article->description }}">

<select class="form-select" name="article_image">
@foreach ($articleImages as $image)
        @if ($image->id == $article->image_id)
        <option selected value="{{ $image->id }}">{{ $image->src }}</option> 
        @else
        <option value="{{ $image->id }}">{{ $image->src }}</option>
        @endif
    @endforeach
</select>


@csrf
<input class="btn btn-primary" type="submit" value="Update">
<a class="btn btn-secondary" href="{{ route('article.index') }}">Back to list</a>

</form>

</div>

@endsection