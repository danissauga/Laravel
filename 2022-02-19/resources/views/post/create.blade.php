@extends('layouts.app')
@section('content')
<div class="container">
<h4>Add new Post</h4>

<div class="errors">
{{-- {{ print_r($errors) }} 
@if ($errors->any())
    <div class="alert alert-danger">
       <ul>
            @foreatch ($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
@endif--}}
</div>

<form method="POST" action="{{route('post.store')}}">
@csrf
<div id="categories_list">
    <div class="form-group">
            <label for="allCategories">Category</label>
            <select class="form-select" id="allCategories" name="allCategories">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title}}</option>
                @endforeach
            </select>
    </div>
</div>
<div  id="add_category" class="d-none" >
    <div class="form-group">
        <label for="newCategory">New category</label>
            <input id="newCategory" class="form-control" name="newCategory" type="text">
    </div>
    <div class="form-group pb-2">
    <label for="newCategoryDescription">New category descriotion</label>
        <textarea type="text" class="form-control" name="newCategoryDescription"></textarea>
    </div>
    <div class="form-group">
            <label for="allStatuses">Category status</label>
            <select class="form-select" id="allStatuses" name="allStatuses">
                @foreach ($statuses as $status)
                    <option value="{{ $status->id }}">{{ $status->title}}</option>
                @endforeach
            </select>
    </div>
</div>

<div class="form-group">
        <label for="addNewCategory">Add new category ?
            <input id="addNewCategory" name="addNewCategory" type="checkbox">
        </label>
</div>
<div class="form-group">
    <label for="postTitle">Post title</label>
    <input type="text" class="form-control @error('postTitle') is-invalid @enderror" name="postTitle" value="{{ old('postTitle') }}">
@error('postTitle')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
</div>
                        
<div class="form-group pb-2">
    <label for="postContent">Post descriotion</label>
    <textarea type="text" class="form-control @error('postContent') is-invalid @enderror" name="postContent">{{ old('postContent') }}</textarea>
    @error('postContent')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="form-group">
    <button class="btn btn-primary" type="submit">Add post</button>
</div>

</form>
</div>

<script>
$(document).ready(function(){
    $('#addNewCategory').click(function(){
        $("#add_category").toggleClass('d-none');
        $("#categories_list").toggleClass('d-none');
       
    });
});
</script>


@endsection 
