@extends('layouts.app')
@section('content')

<div class="container">
    <h1>Articles Categories list</h1>
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

        @if (count($articlecategories) == 0)
            <p>There is no articles</p>
        @endif
 
      <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Desctition</th>
                <th>Article</th>
                <th class="col-2" colspan="3">Tools</th>
            </tr>

            @foreach ($articlecategories as $articlecategory)
                <tr>
                    <td>{{ $articlecategory->id }}</td>
                    <td>{{ $articlecategory->title }}</td>
                    <td>{{ $articlecategory->description }}</td>
                    <td>
                        {{ $articlecategory->getArticle->title }}
                    </td>
                    <td><a class="btn btn-primary" href="{{route('articlecategory.show', [$articlecategory])}}">Show</a></td>
                    <td><a class="btn btn-secondary" href="{{route('articlecategory.edit', [$articlecategory])}}">Edit</a></td>
                    <form class="form-control" method="post" action="{{route('articlecategory.destroy', [$articlecategory])}}">
                    <td>
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </td>
                    @csrf
                    </form>
                </tr>
            @endforeach
        </table>
</div>
@endsection