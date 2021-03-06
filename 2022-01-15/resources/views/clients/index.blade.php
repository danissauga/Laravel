<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Clients list</title>
</head>
<body>

<div class="container">
    <h1>Clients list</h1>
    <div class="form-group pt-2 pb-2">
        <a class="btn btn-primary" href="{{route('client.create') }}">Add client</a>
        <a class="btn btn-secondary" href="{{route('company.create') }}">Add company</a>
        <a class="btn btn-secondary" href="{{route('company.index') }}">Copanys list</a>
    </div>
 @if (count($clients)== 0)

 <p>Data list is empty</p>

        @endif
        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Sure name</th>
                <th>User name</th>
                <th>Company</th>
                <th><a>Foto</a></th>
                <th class="col-2" colspan="3">Tools</th>
            </tr>

            @foreach ($clients as $client)
                <tr>
                    <td>{{ $client->id }}</td>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->surename }}</td>
                    <td>{{ $client->username }}</td>
                    <!-- <td>{{ $client->company_id }}</td> -->
                    <td><?php print_r( $client->clientCompanyType ); ?></td>
                    <td>{{ $client->image_url }}</td>
                    <td><a class="btn btn-primary" href="{{route('client.show', [$client])}}">Show</a></td>
                    <td><a class="btn btn-secondary" href="{{route('client.edit', [$client])}}">Edit</a></td>
                    <form class="form-control" method="post" action="{{route('client.destroy', [$client])}}">
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