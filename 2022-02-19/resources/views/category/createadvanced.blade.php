@extends('layouts.app')
@section('content')
<div class="container">
<h4>Add new Category</h4>
<a class="btn btn-secondary" href="{{route('category.index')}}">Back to categories list</a>
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
   {{-- <input value="Add field" id="addNewField" name="addNewField" class="btn btn-primary">
    <input value="Remove field" id="removeLastField" name="removeLastField" class="btn btn-danger">--}}
    <div class="row">
        <div class="col-md-2">
            <list>Add`ed new post`s:</list>
        </div>
        <div class="col-md-10">
            <input type="number" class="form-control col-md-2" value="1" id="field-count"> 
        </div>
    </div>
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

         $('#addNewPost').click(function() {
            $('#full-post').toggleClass('d-none');
         })

        $('#field-count').change(function(){
            let fieldCount = $('#field-count').val();
           
            if (fieldCount > 0) {
                let tags = document.querySelectorAll('[id^=newPostContent]').length
                console.log(tags);
                    if (tags+1 > fieldCount) {
                        for (let r=fieldCount; r<tags; r++) {
                            $('#newPostContent:last-child:not(#post_first)').remove();
                        }
                        return tags;
                    }
                //console.log(tags);

                     for (let i=tags; i<fieldCount; i++) {
                     $('#full-post').append('<div id="newPostContent" class="newPostContent row"><div class="form-group col-md-6"><label for="postTitle">Title</label><input class="form-control" type="text" name="postTitle[]" /></div><div class="form-group col-md-6"><label for="postContent">Text</label><textarea class="form-control" name="postContent[]"></textarea></div></div>');
                     }
                    // return tags;
                } else {
                        $('#field-count').val(1);
                    }

        });

    })
</script>
@endsection