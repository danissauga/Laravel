@extends('layouts.app')
@section('content')
<div class="container">

    <form class="form-control" action="{{ route('product.update',['product'=> $product]) }}" method="POST">
    @csrf 
    <input class="form-control" name="product_title" type="text" value="{{ $product ->title }}" placeholder="Product title">
    <input class="form-control" name="product_price" type="number" value="{{ $product->price }}" placeholder="0.00">
    <select class="form-select" name="product_category">
        @foreach ($productCategories as $category)
            
           @if ($product->category_id == $category->id)
                <option selected value="{{ $category->id }}">{{ $category->title }}</option>
            @else
                <option value="{{ $category->id }}">{{ $category->title }}</soption>
            @endif
        @endforeach
    </select>
    <input class="form-control" name="product_image" type="text" value="{{ $product->image_url }}" require placeholder="link to image or just #  ">
    <textarea class="form-control" name="product_description" placeholder="Product  descrition">
    {{ $product->description }}
    </textarea>
    <input class="btn btn-primary" type="submit" value="Update">  
</form>


@endsection 