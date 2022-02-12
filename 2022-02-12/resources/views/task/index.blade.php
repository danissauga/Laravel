@extends('layouts.app')
@section('content')

<div class="container">
<h1> Tasks list </h1>

<form method="GET" action="{{route('task.index')}}">
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
        <select name="paginateSetting">
            @foreach ($paginationSettings as $setting)
            @if ($paginateSetting == $setting->value)
                <option selected value="{{ $setting->value }}">{{ $setting->title }}</option>
            @else
                <option value="{{ $setting->value }}">{{ $setting->title }}</option>
            @endif
            @endforeach
        </select>
        <select name="taskStatus">
            <option selected value="all">All statuses</option>
            @foreach ($taskStatuses as $status)
            @if ($taskStatus == $status->id)
                <option selected value="{{ $status->id }}">{{ $status->title }}</option>
            @else
                <option value="{{ $status->id }}">{{ $status->title }}</option>
            @endif
            @endforeach
        </select>
    <button type="submit" class="btn btn-secondary">Atrinkti</button>
</form>

<table class="table table-hover">
    <thead>
        <tr>
            <td>ID</td>
            <td>Title</td>
            <td>Descrtiption</td>
            <td>Status</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($tasks as $task)
        <tr>
            <td>{{ $task->id }}</td>
            <td>{{ $task->title }}</td>
            <td>{{ $task->description }}</td>
            <td>{{ $task->getTaskStatus->title }}</td>
            
        </tr>
        @endforeach
    </tbody>
</table>
  {{--   {!! $products->links() !!} --}}
  @if ($paginateSetting != 1) 
    {!! $tasks->appends(Request::except('page'))->render() !!}
  @endif
</div>

@endsection  