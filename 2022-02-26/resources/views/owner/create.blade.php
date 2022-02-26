@extends('layouts.app')
@section('content')
<div class="container">
<h4>Add new Owner</h4>
<a class="btn btn-secondary" href="{{route('owner.index')}}">Back to owners list</a>
<form method="post" action="{{route('owner.store')}}">
@csrf
<div  id="add_wner" >
    <div class="form-group">
        <label for="newOwnerName">Name</label>
            <input id="newOwnerName" class="form-control @error('newOwnerName') is-invalid @enderror" name="newOwnerName" type="text" value="{{ old('newOwnerName') }}" required>
        @error('newOwnerName')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="newOwnerSurename">Surename</label>
            <input id="newOwnerSurename" class="form-control @error('newOwnerSurename') is-invalid @enderror" name="newOwnerSurename" type="text" value="{{ old('newOwnerSurename') }}" required>
            @error('newOwnerSurename')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="newOwnerEmail">Email</label>
            <input id="newOwnerEmail" class="form-control @error('newOwnerEmail') is-invalid @enderror" name="newOwnerEmail" type="email" value="{{ old('newOwnerEmail') }}" required>
            @error('newOwnerEmail')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="newOwnerPhone">Phone</label>
            <input id="newOwnerPhone" class="form-control @error('newOwnerPhone') is-invalid @enderror" name="newOwnerPhone" type="text" value="{{ old('newOwnerPhone') }}" required>
            @error('newOwnerPhone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group">
    <button class="btn btn-primary" type="submit">Add Owner</button>
</div>

</form>
</div>

@endsection 
