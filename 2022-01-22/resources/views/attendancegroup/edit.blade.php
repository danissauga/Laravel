<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    
    <title>Edit group data</title>
</head>
<body>

<div class="container">
    <h1>Edit group form</h1>


    <form class="form-control" action="{{ route('attendancegroup.store',['attendanceGroup'=>$attendanceGroup]) }}" method="POST">

<input class="form-control" name="attendancegroup_name" type="text" placeholder="Attendance Group name" value="{{ $attendanceGroup->name }}">

<select class="form-select" name="attendancegroup_difficulties">
    @foreach ($difficulties as $difficulty)
    @if ($attendanceGroup->difficulty_id == $difficulty->id) 
        <option selected value="{{ $difficulty->id }}">{{ $difficulty->name }}</option>
    @else
    <option value="{{ $difficulty->id }}">{{ $difficulty->name }}</option>
    @endif
    @endforeach
</select>
<select class="form-select" name="attendancegroup_schools">
    @foreach ($schools as $school)
    @if ( $school->id == $attendanceGroup->school_id ) 
        <option selected value="{{ $school->id }}">{{ $school->name }}</option> 
    @else
    <option value="{{ $school->id }}">{{ $school->name }}</option> 
    @endif
    @endforeach
</select>

<input class="form-control" name="attendancegroup_description" type="text" placeholder="Attendance Group description" value="{{ $attendanceGroup->description }}">

@csrf
<input class="btn btn-primary" type="submit" value="Add">
<a class="btn btn-secondary" href="{{ route('attendancegroup.index') }}">Back to list</a>

</form>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() 
    {
       $('#summernote').summernote();
    });
</script>
</body>
</html>