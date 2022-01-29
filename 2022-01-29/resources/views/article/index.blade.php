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
 
       {{-- <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Surename</th>
                <th>Group</th>
                <th>Photo</th>
                <th class="col-2" colspan="3">Tools</th>
            </tr>

            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->surename }}</td>
                    <td>{{ $student->studentGroup->name }}</td>
                    <td>{{ $student->image_url }}</td>
                    <td><a class="btn btn-primary" href="{{route('student.show', [$student])}}">Show</a></td>
                    <td><a class="btn btn-secondary" href="{{route('student.edit', [$student])}}">Edit</a></td>
                    <form class="form-control" method="post" action="{{route('student.destroy', [$student])}}">
                    <td>
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </td>
                    @csrf
                    </form>
                </tr>
            @endforeach
        </table> --}}
</div>
@endsection