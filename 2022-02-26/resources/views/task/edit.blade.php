@extends('layouts.app')

@section('content')
  
    <div class="container">  
        <form method="POST" action="{{route('task.update', ['task' => $task])}}" enctype="multipart/form-data">
            @csrf
           
                <div class="row task">
                    <div class="form-group col-md-3">
                        <label for="task_title">Title</label>
                        <input class="form-control @error("taskTitle") is-invalid @enderror" type='text' name='taskTitle' value="{{ $task->title }}" />
                        @error("taskTitle")
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="task_description">Description</label>
                        <input class="form-control @error("taskDescription") is-invalid @enderror " type='text' name='taskDescription' value="{{ $task->description }}" />
                        @error("taskDescription")
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="task_start_date">Start Date</label>
                        <input class="form-control @error("taskStart_date") is-invalid @enderror " type='date' name='taskStart_date' value="{{ $task->start_date }}" />
                        @error("taskStart_date")
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="task_end_date">End Date</label>
                        <input class="form-control @error("taskEnd_date") is-invalid @enderror " type='date' name='taskEnd_date' value="{{ $task->end_date }}" />
                        @error("taskEnd_date")
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <input hidden value="{{ $task->logo }}" name="oldLogo" type="text">
                        <label for="task_logo">Logo </label>
                        <input class="form-control @error("taskLogo") is-invalid @enderror " type='file' name='taskLogo' autofocus/>
                        @error("taskLogo")
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
     
                    <div class="form-group col-md-3">
                        <label for="taskOwnerId">Owner ID</label>
                        <select name="taskOwnerId" class="form-select form-control @error("taskOwnerId") is-invalid @enderror">
                        @foreach ($owners as $owner)
                            @if ($owner->id == $task->owner_id)
                                <option selected value="{{ $owner->id }}">{{ $owner->name }} {{ $owner->surename }}</option>
                            @else
                                <option value="{{ $owner->id }}">{{ $owner->name }} {{ $owner->surename }}</option>
                            @endif
                        @endforeach
                        </select>
                        @error("taskOwner_id")
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>   
        </form>    
    </div>    
@endsection