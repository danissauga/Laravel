@extends('layouts.app')
@section('content')
<div class="container">
<h4>Add new Owner</h4>

<form method="post" action="{{route('owner.store')}}">
@csrf
<div  id="add_wner" >
    <div class="form-group">
        <label for="newOwnerName">Name</label>
            <input id="newOwnerName" class="form-control" name="newOwnerName" type="text" require>
    </div>
    <div class="form-group">
        <label for="newOwnerSurename">Surename</label>
            <input id="newOwnerSurename" class="form-control" name="newOwnerSurename" type="text" require>
    </div>
    <div class="form-group">
        <label for="newOwnerEmail">Email</label>
            <input id="newOwnerEmail" class="form-control" name="newOwnerEmail" type="email" require>
    </div>
    <div class="form-group">
        <label for="newOwnerPhone">Phone</label>
            <input id="newOwnerPhone" class="form-control" name="newOwnerPhone" type="number" require>
    </div>
</div>

<div class="form-group">
    <button class="btn btn-primary" type="submit">Add Owner</button>
</div>

</form>
</div>

@endsection 
