@extends('layouts.app')
@section('content')
<div class="container">
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