<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Edit client data</title>
</head>
<body>

<div class="container">
    <h1>Edit Client data</h1>

<form class="form-control" action="{{  route('client.update',['client'=>$client]) }}" method="POST">
    <div class="form-group pt-2 pb-2">
        <input class="form-control" name="client_name" type="text" placeholder="Client name" value="{{$client->name}}">
    </div>
    <div class="form-group pt-2">
        <input class="form-control" name="client_surename" type="text" placeholder="Client surename" value="{{$client->surename}}">
    </div>
    <div class="form-group pt-2">
        <input class="form-control" name="client_username" type="text" placeholder="User name" value="{{$client->username}}">
    </div>
<div class="form-group pt-2 pb-2">
    <label class="pb-2" for="client_company_id">Select Company:</label>
        <select name="client_company_id" class="form-control form-select" style="width:250px">
            <option value="">--- Select company ---</option>
            @foreach ($select_values as $company)
                @if ($company->id == $client->company_id)
                    <option selected value="{{ $company->id }}">{{ $company->name }}</option>
                @else
                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                @endif
            @endforeach
        </select>
</div>

<!--<input class="form-control" name="client_image_url" type="file" placeholder="Image"> -->

@csrf
<input class="btn btn-primary" type="submit" value="Add">
<a class="btn btn-secondary" href="{{ route('client.index') }}">Back to list</a>

</form>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>