<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Authors</title>
</head>
<body>

<div class="container">
    <h1>Authors Index</h1>
        <a class="btn btn-primary" href="{{route('author.create') }}">Sukurti įrašą</a>
 @if (count($authors)== 0)

 <p>Duomenų lentelė tuščia</p>

        @endif
        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Vardas</th>
                <th>Pavarde</th>
                <th>Aprašymas</th>
                <th>Telefonas</th>
                <th class="col-2" colspan="3">Tools</th>
            </tr>
        
            @foreach ($authors as $author) 
                <tr>
                    <td>{{ $author->id }}</td>
                    <td>{{ $author->name }}</td>
                    <td>{{ $author->surename }}</td>
                    <td>{{ $author->description }}</td>
                    <td>{{ $author->phone }}</td>
                    <td><a class="btn btn-primary" href="{{route('author.show', [$author])}}">Show</a></td>
                    <td><a class="btn btn-secondary" href="{{route('author.edit', [$author])}}">Edit</a></td>
                    <form class="form-control" method="post" action="{{route('author.destroy', [$author])}}">
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