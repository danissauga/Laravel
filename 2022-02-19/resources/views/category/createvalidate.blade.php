@extends('layouts.app')
@section('content')
<div class="container">
<h4>Add new Category</h4>

<a class="btn btn-secondary" href="{{route('category.index')}}">Back to categories list</a>

<div class="errors">

@if ($errors->any())
    <div class="alert alert-danger">
       <ul>
            @foreach ($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
@endif
</div>

<form method="GET" action="{{route('category.createvalidate')}}">
@csrf
    <input value="{{ $fieldsCount }}" id="fieldsCount" name="fieldsCount" type="number"> 
    <input value="Add field" id="addNewField" name="addNewField" type="submit" class="btn btn-primary">

</form>

<form method="POST" action="{{route('category.storevalidate')}}">
@csrf
        <div class="pb-2" id="full-post">
            @for ($i=0; $i < $fieldsCount; $i++)  
                <div class="row" id="newPostContent first-post">
                    <div class="form-group col-6">
                        <label for="postTitle">Post title</label>
                        <input class="form-control" type="text" id="postTitle" name="postTitle[][title]" value="{{ old("postTitle.".$i.".title") }}">
                    </div>
                    <div class="form-group col-6">
                        <label for="postContent">Post descriotion</label>
                        <textarea type="text" class="form-control" id="postContent" name="postContent[][content]">{{ old("postContent.".$i.".content") }}</textarea>
                    </div>
                </div>
            @endfor    
        </div>
            <div class="form-group pt-2">
                <button class="btn btn-primary" type="submit">Add post</button>
            </div>
        </div>
</form>


@endsection
