@extends('layouts.app')
@section('content')
<div class="container">
<h4>Add new Post</h4>

<div class="errors">

    <div id="red_alert" class="alert alert-danger d-none">
       
    </div>
    <div id="green_alert" class="alert alert-success d-none">
       
    </div>

</div>


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add new Post
</button>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
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
            <div class="form-group">
                <label for="postTitle">Post title</label>
                <input type="text" class="form-control @error('postTitle') is-invalid @enderror" id="postTitle" name="postTitle" value="">
            @error('postTitle')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
                                    
            <div class="form-group pb-2">
                <label for="postContent">Post descriotion</label>
                <input type="text" class="form-control @error('postContent') is-invalid @enderror" id="postContent" name="postContent" value="">
                @error('postContent')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>  
      </div>
      <div class="modal-footer">
        <button type="button" id="java_close" class="btn btn-secondary">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function(){

    $("#java_close").click(function(){
        // $(".modal-backdrop").remove();
        // $(".modal").removeClass('fade');
        // $('body').removeClass('modal-open');
        $("#exampleModal").hide();
    })
    
$.ajaxSetup({
    headers:{
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
    }
})
    $('#save_data').click(function(){
        console.log('save_clicked');
        let category;
        let postTitle;
        let postContent;
        category = $('#allCategories').val();
        postTitle = $('#postTitle').val();
        postContent = $('#postContent').val();

        $.ajax({
            type: 'POST',
            url: '{{route("post.ajaxstore")}}',
            data: { category: category, postTitle: postTitle, postContent: postContent },
            success: function(data) {
                let html;
                html = "<tr><td>"+data.category+"</td><td>"+data.postTitle+"</td><td>"+data.postContent+"</td></tr>";
                $('#red_alert').removeClass('d-none');
                $('#red_alert').html(html);
                $('#green_alert').removeClass('d-none');
                $('#green_alert').html(data.success);
            }
        })

    })

    // $('#addNewCategory').click(function(){
    //     $("#add_category").toggleClass('d-none');
    //     $("#categories_list").toggleClass('d-none');
       
   // });
});
</script>


@endsection 
