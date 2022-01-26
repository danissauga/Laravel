<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Add attendance group</title>
</head>
<body>

<div class="container">
    <h1>Add attendance group</h1>

<form class="form-control" action="{{ route('attendancegroup.store') }}" method="POST">

<input class="form-control" name="attendancegroup_name" type="text" placeholder="Attendance Group name">

<select class="form-select" name="attendancegroup_difficulties">
    @foreach ($difficulties as $difficulty)
    <option selected value="{{ $difficulty->id }}">{{ $difficulty->name }}</option> 
    @endforeach
</select>

<select class="form-select" name="attendancegroup_schools">
    @foreach ($schools as $school)
    <option selected value="{{ $school->id }}">{{ $school->name }}</option> 
    @endforeach
</select>

<input class="form-control" name="attendancegroup_description" type="text" placeholder="Attendance Group description">

@csrf
<input class="btn btn-primary" type="submit" value="Add">
<a class="btn btn-secondary" href="{{ route('attendancegroup.index') }}">Back to list</a>

</form>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>