@extends('layouts.app')
@section('content')

<div class="container">
    <h1>Articles list</h1>
    {{-- <div class="form-group pt-2 pb-2">
        <a class="btn btn-primary" href="{{route('student.create') }}">Add student</a>
        <a class="btn btn-primary" href="{{route('school.create') }}">Add School </a>
        <a class="btn btn-secondary" href="{{route('school.index') }}">School list</a>
    </div> --}}
 
        @if (session()->has('error_message'))
        <div class="alert alert-danger">
            {{session()->get('error_message')}}
        </div>
        @endif

        @if (session()->has('success_message'))
                <div class="alert alert-success">
                    {{session()->get('success_message')}}
                    success_message
                </div>
        @endif

        @if (count($articles) == 0)
            <p>There is no articles</p>
        @endif
 
       <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Excerpt</th>
                <th>Description</th>
                <th>Author</th>
                <th>Author image</th>
                <th class="col-2" colspan="3">Tools</th>
            </tr>

            @foreach ($articles as $article)
                <tr>
                    <td>{{ $article->id }}</td>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->excerpt }}</td>
                    <td>{{ $article->description }}</td>
                    <td>{{ $article->author }}</td>
                    <td>
                        <img id='image_{{$article->getArticleImage->id }}' class='{{$article->getArticleImage->class}}' src='{{'/images/'.$article->getArticleImage->src }}' alt='{{$article->getArticleImage->alt }}' />  
                    </td>
                    <td><a class="btn btn-primary" href="{{route('article.show', [$article])}}">Show</a></td>
                    <td><a class="btn btn-secondary" href="{{route('article.edit', [$article])}}">Edit</a></td>
                    
                    <td>
                        <form method="post" action="{{route('article.destroy', [$article])}}">
                                <button class="btn btn-danger" type="submit">Delete</button>
                            @csrf
                        </form>
                    </td>
                    
                </tr>
            @endforeach
        </table>
</div>
@endsection