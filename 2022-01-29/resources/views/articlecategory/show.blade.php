<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Student details</title>
</head>
<body>
<div class="container">
    <h1>Student details</h1>
    
    <p>ID: {{$student->id}}</p>
    <p>Student name: {{ $student->name }}</p>
    <p>Student surename: {{ $student->surename }}</p>
    <p>Student groupe: {{$student->studentGroup->name }}</p>

  <!--   $comapny->companyClients; -->

    <form method="post" action="{{route('student.destroy', [$student])}}">
                <button class="btn btn-danger" type="submit">Delete</button>
            @csrf
    </form>
    <a class="btn btn-secondary" href="{{route('student.index') }}">Back to list</a>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>