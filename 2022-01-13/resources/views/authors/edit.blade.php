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
    <h1>Authors Edit</h1>


<form action="{{ route('author.update',[$author]) }}" method="POST">
<input name="author_name" type="text" placeholder="Iveskite varda" value="{{$author->name}}">
<input name="author_surename" type="text" placeholder="Iveskite varda" value="{{$author->surename}}">
<input name="author_description" type="text" placeholder="Iveskite varda" value="{{$author->description}}">
<input name="author_phone" type="text" placeholder="Iveskite telefona" value="{{$author->phone}}">

@csrf

<input class="btn btn-primary" type="submit" value="Update">
<a class="btn btn-secondary" href="{{route('author.index') }}">Back to list</a>

</form>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>