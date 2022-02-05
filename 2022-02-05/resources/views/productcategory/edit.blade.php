@extends('layouts.app')
@section('content')
<div class="container">

    <form class="form-control" action="{{ route('productcategory.update',['productCategory'=> $productCategory]) }}" method="POST">
    @csrf 
    <input class="form-control" name="productCategory_title" type="text" value="{{ $productCategory->title }}" placeholder="Producta category title">
    <textarea id="summernote" class="form-control" name="productCategory_description" placeholder="Product category descrition">
    {{ $productCategory->description }}
    </textarea>
    <input class="btn btn-primary" type="submit" value="Add">  
</form>


@endsection 