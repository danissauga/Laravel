@extends('layouts.app')
@section('content')


<div class="container">

<form method="POST" action="{{route('taskstatus.store')}}">
@csrf
<div id="tasks_list">
    <div class="form-group">
            <label for="tasksStatus">Tasks status</label>
            <select class="form-select" id="taskStatus>">
                @foreach ($taskstatuses as $status)
                    <option value="{{ $status->id }}">{{ $status->title}}</option>
                @endforeach
            </select>
    </div>
</div>
<div  id="add_task" class="d-none" >
    <div class="form-group">
        <label for="newTask">New task title</label>
            <input id="newTask" class="form-control" name="newTask" type="text"> 
    </div>
</div>
<div class="form-group">
        <label for="addNewTask">Add new task status ?
            <input id="addNewTask" name="addNewTask" type="checkbox"> 
        </label>  
</div>
<div class="form-group">
    <label for="textTitle">Task name</label>
    <input class="form-control" type="text" name="taskTitle" value="">
</div>
<div class="form-group">
    <label for="taskDescription">Task descriotion</label>
    <textarea type="text" class="form-control" name="taskDescription">
    </textarea>
</div>
<div class="form-group td-5">
    <button class="btn btn-primary" type="submit">Įterpti</button>
</div>
</form>
</div>

<script>
$(document).ready(function(){
    $('#addNewTask').click(function(){
        $("#add_task").toggleClass('d-none');
        $("#tasks_list").toggleClass('d-none');
       // alert('Ok.');
    });
});
</script>


@endsection  
