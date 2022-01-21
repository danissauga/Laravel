<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Company details</title>
</head>
<body>
<div class="container">
    <h1>Type details</h1>
    
    <p>ID: {{$type->id}}</p>
    <p>Type name: {{$type->name}}</p>
    <p>Type shortname: {{$type->short_name}}</p>
    <p>Type description: {{$type->description}}</p>

  <!--   $comapny->companyClients; -->

  @if(count($type->typeCompanies) == 0)
            <p>There is no companies </p>
        @else

            <table class="table table-striped">
                <tr>
                    <th>Id</th>
                    <th>name</th>
                    <th>description</th>
                    <th>Actions</th>
                    
                </tr>
                    @foreach ($type->typeCompanies as $company)
                <tr>
                    <td>{{$company->id}}</td>
                    <td>{{$company->name}}</td>
                    <td>{{$company->descrioption}}</td>
                </tr> 
                    @endforeach
            </table>
        @endif
    <form method="post" action="{{route('type.destroy', [$type])}}">
                <button class="btn btn-danger" type="submit">Delete</button>
            @csrf
    </form>
    <a class="btn btn-secondary" href="{{route('company.index') }}">Back to list</a>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>