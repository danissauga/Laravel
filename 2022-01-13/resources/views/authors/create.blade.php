<?php
echo 'creat';
?>
<form action="{{ route('author.store') }}" method="POST">
<input name="author_name" type="text" placeholder="Iveskite varda">
<input name="author_surename" type="text" placeholder="Iveskite varda">
<input name="author_description" type="text" placeholder="Iveskite varda">
<input name="author_phone" type="text" placeholder="Iveskite telefona">


@csrf

<input type="submit" value="Add">

</form>