@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Paieška</h1>

    <table class="table table-striped">
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Surename</td>
            <td>username</td>
            <td>Descrtiption</td>
        </tr>
        @foreach ($authors as $author)
        <tr>
            <td>{{ $author->id }}</td>
            <td>{{ $author->name }}</td>
            <td>{{ $author->surename }}</td>
            <td>{{ $author->username }}</td>
            <td>{{ $author->description }}</td>
        </tr>
        @endforeach
    </table>
</div>
@endsection