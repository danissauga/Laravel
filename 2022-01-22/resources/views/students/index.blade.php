<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Students list</title>
</head>
<body>

<div class="container">
    <h1>Students list</h1>
    <div class="form-group pt-2 pb-2">
        <a class="btn btn-primary" href="{{route('student.create') }}">Add student</a>
        <a class="btn btn-primary" href="{{route('school.create') }}">Add School </a>
        <a class="btn btn-secondary" href="{{route('school.index') }}">School list</a>
</div>
 
        @if (session()->has('error_message'))
        <div class="alert alert-danger">
            {{session()->get('error_message')}}
        </div>
        @endif

        @if (session()->has('success_message'))
                <div class="alert alert-success">
                    {{session()->get('success_message')}}
                    success_message
                </div>
        @endif

        @if (count($students) == 0)
            <p>There is no students</p>
        @endif
 
        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Surename</th>
                <th>Group</th>
                <th>Photo</th>
                <th class="col-2" colspan="3">Tools</th>
            </tr>

            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->surename }}</td>
                    <td>{{ $student->studentGroup->name }}</td>
                    <td>{{ $student->image_url }}</td>
                    <td><a class="btn btn-primary" href="{{route('student.show', [$student])}}">Show</a></td>
                    <td><a class="btn btn-secondary" href="{{route('student.edit', [$student])}}">Edit</a></td>
                    <form class="form-control" method="post" action="{{route('student.destroy', [$student])}}">
                    <td>
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </td>
                    @csrf
                    </form>
                </tr>
            @endforeach
        </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>