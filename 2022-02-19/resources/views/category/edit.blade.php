@extends('layouts.app')
@section('content')
<div class="container">
<h4>Edit Category</h4>
<form method="POST" action="{{route('category.store')}}">
@csrf
<div  id="add_category">
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
        <label for="addNewPost">Add new post ?
            <input id="addNewPost" name="addNewPost" type="checkbox">
        </label>
</div>
<div class="pb-2 d-none" id="full-post">
    <input value="Add field" id="addNewField" name="addNewField" class="btn btn-primary">
    <input value="Remove field" id="removeLastField" name="removeLastField" class="btn btn-danger">
        <div class="row" id="newPostContent first-post">
            <div class="form-group col-6">
                <label for="postTitle">Post title</label>
                <input class="form-control" type="text" id="postTitle" name="postTitle[]" value="">
            </div>
            <div class="form-group col-6">
                <label for="postContent">Post descriotion</label>
                <textarea type="text" class="form-control" id="postContent" name="postContent[]"></textarea>
            </div>
        </div>
    
</div>
<div class="form-group pt-2">
    <button class="btn btn-primary" type="submit">Add post</button>
</div>

</form>
</div>

<script>
$(document).ready(function(){
    $('#addNewPost').click(function(){
        $("#full-post").toggleClass('d-none');
        $('#postTitle').val('');
        $('#postContent').val('');
    });
    
    $('#addNewField').click(function(){
        $('#full-post').append('<div class="row" id="newPostContent"><div class="form-group col-6"><label for="postTitle">Post title</label><input class="form-control" type="text" name="postTitle[]" value=""></div><div class="form-group col-6"><label for="postContent">Post descriotion</label><textarea type="text" class="form-control" name="postContent[]"></textarea></div></div>');
    });

    $('#removeLastField').click(function(){
        $('#newPostContent:last-child:not(#first-post)').remove(); 
     });

});
</script>

@endsection
