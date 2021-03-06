@extends('layouts.app')
@section('content')

<div class="container">
    <h1>Article details</h1>
    
    <p>ID: {{$article->id}}</p>
    <p>Article title: {{ $article->title }}</p>
    <p>Article excerpt: {{ $article->excerpt }}</p>
    <p>Article author: {{ $article->author }}</p>
    <p>
        <img id='image_{{$article->getArticleImage->id }}' class='{{$article->getArticleImage->class}}' src='{{'/images/'.$article->getArticleImage->src }}' alt='{{$article->getArticleImage->alt }}' width='{{$article->getArticleImage->width }}' heigth='{{$article->getArticleImage->heigth }}' />  
    </p>
    <form method="post" action="{{route('article.destroy', [$article])}}">
                <button class="btn btn-danger" type="submit">Delete</button>
                <a class="btn btn-secondary" href="{{route('article.index') }}">Back to list</a>
            @csrf
    </form>
    
    </div>
@endsection