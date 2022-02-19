@extends('layouts.app')
@section('content')
<div class="container">
<h4>Add new Post</h4>
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
    <input class="form-control" type="text" name="postTitle" value="">
</div>
<div class="form-group pb-2">
    <label for="postContent">Post descriotion</label>
    <textarea type="text" class="form-control" name="postContent"></textarea>
</div>

<div class="form-group">
    <button class="btn btn-primary" type="submit">Įterpti</button>
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
