@extends('layouts.app')
@section('content')
<div class="container">

    <form class="form-control" action="{{ route('product.store') }}" method="POST">
    @csrf 
    <input class="form-control" name="product_title" type="text"  placeholder="Product title">
    <input class="form-control" name="product_price" type="number" placeholder="0.00">
    <select class="form-select" name="product_category">
        @foreach ($productCategories as $category)
                <option value="{{ $category->id }}">{{ $category->title }}</soption>
        @endforeach
    </select>
    <input class="form-control" name="product_image" type="text" require placeholder="link to image or just #  ">
    <textarea class="form-control" name="product_description" placeholder="Product  descrition">
    </textarea>
    <input class="btn btn-primary" type="submit" value="Update">  
</form>


@endsection 