<?php
echo 'index';

?>

<table>
    <tr>
        <th>ID</th>
        <th>Vardas</th>
        <th>Pavarde</th>
        <th>Aprašymas</th>
        <th>Telefonas</th>
    </tr>
    @foreach ($authors as $author) 
        <tr>
            <td>{{ $author->id }}</td>
            <td>{{ $author->name }}</td>
            <td>{{ $author->surename }}</td>
            <td>{{ $author->description }}</td>
            <td>{{ $author->phone }}</td>
        </tr>
    @endforeach
</table>