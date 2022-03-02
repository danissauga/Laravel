@extends('layouts.app')

@section('content')
  
    <div class="container">
        <form method="GET" action="{{route('task.create')}}">
            @csrf
            <input type="number" name="tasksCount" value='{{$tasksCount}}'>
            <button type="submit">Create</button>
        </form>    

        <form method="POST" action="{{route('task.store')}}" enctype="multipart/form-data">
            @csrf
            @for ($i = 0; $i< $tasksCount; $i++)
                <div class="row task">
                    <div class="form-group col-md-3">
                        <label for="task_title">Title</label>
                        <input class="form-control @error("taskTitle.".$i.".title") is-invalid @enderror " type='text' name='taskTitle[][title]' value="{{old("taskTitle.".$i.".title") }}" />
                        @error("taskTitle.".$i.".title")
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="task_description">Description</label>
                        <input class="form-control @error("taskDescription.".$i.".description") is-invalid @enderror " type='text' name='taskDescription[][description]' value="{{old("taskDescription.".$i.".description") }}" />
                        @error("taskDescription.".$i.".description")
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="task_start_date">Start Date</label>
                        <input class="form-control @error("taskStart_date.".$i.".start_date") is-invalid @enderror " type='date' name='taskStart_date[][start_date]' value="{{old("taskStart_date.".$i.".start_date") }}" />
                        @error("taskStart_date.".$i.".start_date")
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="task_end_date">End Date</label>
                        <input class="form-control @error("taskEnd_date.".$i.".end_date") is-invalid @enderror " type='date' name='taskEnd_date[][end_date]' value="{{old("taskEnd_date.".$i.".end_date") }}" />
                        @error("taskEnd_date.".$i.".end_date")
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="task_logo">Logo </label>
                        <input class="form-control @error("taskLogo.".$i.".logo") is-invalid @enderror " type='file' name='taskLogo[][logo]' value="{{old("taskLogo.".$i.".logo") }}" required autofocus/>
                        @error("taskLogo.".$i.".logo")
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
     
                    <div class="form-group col-md-3">
                        <label for="taskOwnerId">Owner ID</label>
                        <select name="taskOwnerId[][owner_id]" class="form-select form-control @error("taskOwnerId.".$i.".owner_id") is-invalid @enderror">
                        @foreach ($owners as $owner)
                            <option value="{{ $owner->id }}">{{ $owner->name }} {{ $owner->surename }}</option>
                        @endforeach
                        </select>
                        @error("taskOwner_id.".$i.".owner_id")
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            @endfor
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>   
        </form>    
    </div>    
@endsection
