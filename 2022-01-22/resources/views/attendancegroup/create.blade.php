<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Add company data</title>
</head>
<body>

<div class="container">
    <h1>Add Company form</h1>

<form class="form-control" action="{{ route('company.store') }}" method="POST">

<input class="form-control" name="company_name" type="text" placeholder="Company name">

{{-- <input class="form-control" name="company_type" type="text" placeholder="Company type"> --}}

<select class="form-select" name="company_type">
    @foreach ($types as $type)
    <option selected value="{{ $type->id }}">{{ $type->short_name }}, {{$type->name }}</option> 
    @endforeach
</select>

<input class="form-control" name="company_description" type="text" placeholder="Company description">

@csrf
<input class="btn btn-primary" type="submit" value="Add">
<a class="btn btn-secondary" href="{{ route('company.index') }}">Back to list</a>

</form>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>