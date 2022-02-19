@extends('layouts.app')
@section('content')

<div class="container">
<h1> Tasks list </h1>



<table class="table table-hover">
    <thead>
        <tr>
            <td style="width: 50px;">id</td>
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
   {!! $tasks->appends(Request::except('page'))->render() !!} 
{{--    @if ($paginateSetting != 1) 
    {!! $tasks->appends(Request::except('page'))->render() !!}
  @endif--}}
</div>

@endsection  