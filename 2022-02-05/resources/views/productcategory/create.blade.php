@extends('layouts.app')
@section('content')

<div class="container">

    <form class="form-control" action="{{ route('productcategory.store') }}" method="POST">
    @csrf 

    <input class="form-control" name="productCategory_title" type="text" placeholder="Product category title">
    <textarea id="summernote" class="form-control" name="productCategory_description" placeholder="Product category descrition">
    </textarea>
    <input class="btn btn-primary" type="submit" value="Add">  
</form>

</div>


@endsection 