<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>School details</title>
</head>
<body>
<div class="container">
    <h1>School details</h1>
    
    <p>ID: {{$school->id}}</p>
    <p>School name: {{$school->name}}</p>
    <p>School place: {{$school->place}}</p>
    <p>School phone: {{$school->phone}}</p>
    <p>School description: {!! $school->description !!}</p>

  <!--   $comapny->schoolClients; -->

  @if(count($school->schoolAttendanceGroup) == 0)
            <p>The School has no groups... </p>
        @else

            <table class="table table-striped">
                <tr>
                    <th>Name</th>
                    <th>Difficulty</th>
                    <th>description</th>
                    <th>Actions</th>
                    
                </tr>
                    @foreach ($school->schoolAttendanceGroup as $group)
                <tr>
                    <td>{{$group->name}}</td>
                    <td>{{$group->difficulty}}</td>
                    <td>{!! $group->description !!}</td>
                    <td>
                    <form method="post" action='{{route('attendancegroup.destroy', [$group])}}'>
                            @csrf
                            <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                    </td>
                </tr> 
                    @endforeach
            </table>
        @endif
    <form method="post" action="{{route('school.destroy', [$school])}}">
                <button class="btn btn-danger" type="submit">Delete</button>
            @csrf
    </form>
    <a class="btn btn-secondary" href="{{route('school.index') }}">Back to list</a>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>