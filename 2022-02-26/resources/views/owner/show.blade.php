@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Owner -> {{ $owner->name }} {{ $owner->surename }} <- details </h2>
    <a class="btn btn-secondary" href="{{route('owner.index')}}">Back to Post`s list</a>
<div class="row">
    <p>Owner ID: {{ $owner->id }}</p>
    <p>Owner Name: {{ $owner->name }}</p>
    <p>Owner Surname: {{ $owner->surename }}</p>
    <p>Owner email: {{ $owner->email }}</p>
    <p>Owner phone: {{ $owner->phone }}</p>
</div>

<table class="table table-hover">
    <thead>
        <tr>
            <td style="width: 50px;">ID</td>
            <td>Title</td>
            <td>Description</td>
            <td>Start date</td>
            <td>End date</td>
           
        </tr>
    </thead>
    <tbody>
        @foreach ($tasks as $task)
        <tr>
            <td>{{ $task->id }}</td>
            <td>{{ $task->title }}</td>
            <td>{{ $task->description }}</td>
            <td>{{ $task->start_date }}</td>
            <td>{{ $task->end_date }}</td> 
        </tr>
        @endforeach
    </tbody>
</div>
@endsection

