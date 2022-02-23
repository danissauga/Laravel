@extends('layouts.app')
@section('content')
<div class="container">
<h4>Add new Category</h4>
<a class="btn btn-secondary" href="{{route('category.index')}}">Back to categories list</a>
<form method="POST" action="{{route('category.update',['category'=>$category])}}">
@csrf

<div  id="category">
    <div class="form-group">
        <label for="categoryTitle">Category title</label>
            <input id="categoryTitle" class="form-control" name="categoryTitle" type="text" value="{{ $category->title }}">
    </div>
    <div class="form-group pb-2">
    <label for="categoryDescription">Category descriotion</label>
        <textarea type="text" class="form-control" name="categoryDescription">{{ $category->description }}</textarea>
    </div>
    <div class="form-group">
            <label for="allStatuses">Category status</label>
            <select class="form-select" id="allStatuses" name="allStatuses">
                @foreach ($statuses as $status)
                @if ($category->status_id == $status->id)
                    <option selected value="{{ $status->id }}">{{ $status->title}}</option>
                @else
                    <option value="{{ $status->id }}">{{ $status->title}}</option>
                @endif
                @endforeach
            </select>
    </div>
    <div class="form-group pt-2">
        <button class="btn btn-primary" type="submit">Update category</button>
    </div>
</div>

</form>
</div>

@endsection

