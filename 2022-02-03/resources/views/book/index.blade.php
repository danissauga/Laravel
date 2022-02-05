@extends('layouts.app')
@section('content')
<div class="container">
<form method="GET" action="{{route('book.index')}}">
    @csrf
        <select name="sortCollumn">
            @foreach ($select_array as $key => $collumn)
                @if (($collumn == $sortCollumn) || (empty($sortCollumn) && $key == 0))
                    <option selected value="{{ $collumn }}">{{ $collumn }}</option>
                @else 
                <option value="{{ $collumn }}">{{ $collumn }}</option>
                @endif
            @endforeach
        </select>

       
        <select name="sortOrder">
            @if ($sortOrder == 'asc' || empty($sortOrder)) 
            <option value="asc" selected>Ascending</option>
            <option value="desc" >Descendind</option>
            @else
            <option value="asc">Ascending</option>
            <option value="desc" selected>Descendind</option>
            @endif

        </select>
       
        <input type="submit" name="Sort">
    </form>
     <form method="GET" action="{{route('book.bookfilter')}}">
        @csrf
    <select name="author_id">
        {{-- Visus autorius --}}
        @foreach ($authors as $author)
            <option value="{{$author->id}}">{{$author->name}} {{$author->surename}}</option>
        @endforeach
    </select>
    <button type="submit">Filter</button>
    </form> 



    <table class="table table-striped">
            <tr>
                <td>ID</td>
                <td>Title</td>
                <td>Descrtiption</td>
                <td>Author</td>
            </tr>
            @foreach ($books as $book)
            <tr>
                <td>{{ $book->id }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->description }}</td>
                <td>{{ $book->getAuthor->name.' '.$book->getAuthor->surename }}</td>
            </tr>
            @endforeach
    </table>
</div>

@endsection