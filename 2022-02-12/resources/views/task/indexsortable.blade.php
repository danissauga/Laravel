@extends('layouts.app')
@section('content')

<div class="container">
<h1> Tasks list </h1>

<form method="GET" action="{{route('task.indexsortable',[$tasks->appends(Request::except('page'))->render()])}}">
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
    <input hidden name="sort" type="text" value="{{ $sort }}"/>
    <input hidden name="direction" type="text" value="{{ $direction }}"/>

</form>

<table class="table table-hover">
    <thead>
        <tr>
            <td style="width: 50px;">@sortablelink('id','ID')</td>
            <td>@sortablelink('title','Title')</td>
            <td>@sortablelink('description','Descrtiption')</td>
            <td>@sortablelink('status_id','Status')</td>
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
   {!! $tasks->appends(Request::except('page'))->render() !!} 
{{--    @if ($paginateSetting != 1) 
    {!! $tasks->appends(Request::except('page'))->render() !!}
  @endif--}}
</div>

@endsection  