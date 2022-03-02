@extends('layouts.app')
@section('content')

<div class="container">
    <h2>Post`s list</h2>
    <a class="btn btn-primary" href="{{route('task.create')}}">Create Task</a>
    <a class="btn btn-primary" href="{{route('owner.create')}}">Add Owner</a>
    <a class="btn btn-primary" href="{{route('owner.index')}}">Owners list</a>
    
    @if (session()->has('error_message'))
        <div class="alert alert-danger mt-2">
            {{session()->get('error_message')}}
        </div>
    @endif

    @if (session()->has('success_message'))
                <div class="alert alert-success mt-2">
                    {{session()->get('success_message')}}
                </div>
    @endif


    <form method="GET" action="{{route('task.index')}}">
    @csrf

    <select name="paginateSetting">
            @foreach ($paginationSettings as $setting)
            @if ($paginateSetting == $setting->value)
                <option selected value="{{ $setting->value }}">{{ $setting->title }}</option>
            @else
                <option value="{{ $setting->value }}">{{ $setting->title }}</option>
            @endif
            @endforeach
        </select>
    <button type="submit" class="btn btn-secondary">Atrinkti</button>
    <input hidden name="sort" type="text" value="{{ $sort }}"/>
    <input hidden name="direction" type="text" value="{{ $direction }}"/>

    <table class="table table-hover">
    <thead>
        <tr>
            <td style="width: 50px;">@sortablelink('id','ID')</td>
            <td>@sortablelink('title','Title')</td>
            <td>@sortablelink('description','Description')</td>
            <td>@sortablelink('start_date','Start date')</td>
            <td>@sortablelink('end_date','End date')</td>
            <td>Logo</td>
           <td style="width: 150px;" >@sortablelink('taskHasOwner.name','Owner')</td>
           <td colspan="3">Tools</td>
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
            <td> 
                <img src='{{'/images/'.$task->logo}}' alt='Logo' width="80" class='img-thumbnail' />  
            </td>
            <td>{{ $task->taskHasOwner->name }} {{ $task->taskHasOwner->surename }}</td> 
            <td style="width: 70px;"><a class="btn btn-secondary" href="{{route('task.edit', [$task])}}">Edit</a></td>
            <td style="width: 70px;"><a class="btn btn-secondary" href="{{route('task.show', [$task])}}">View</a></td>
            </td>
                <form class="form-control" method="post" action="{{route('task.destroy', [$task])}}">
                    <td style="width: 70px;">
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </td>
                    @csrf
                </form>
        </tr>
        @endforeach
    </tbody>
    </table>
    @if ($paginateSetting != 1)
        {!! $tasks->appends(Request::except('page'))->render() !!}
    @endif

</div>
@endsection
