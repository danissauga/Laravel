@extends('layouts.app')
@section('content')

<div class="container">
<h1> Products list </h1>
<a class="btn btn-primary" href="{{route('product.create') }}">Add Product</a> 
<a class="btn btn-secondary" href="{{route('productcategory.index') }}">Product Category  list</a>

<form method="GET" action="{{route('product.index')}}">
    @csrf
        <select name="sortCollumn">
            <option selected value="category_id">Category</option>
        </select>
        <select name="sortOrder">
            @if ($sortOrder == 'asc' || empty($sortOrder))
            <option value="asc" selected>Ascending</option>
            <option value="desc" >Descendind</option>
            @else
            <option value="asc">Ascending</option>
            <option value="desc" selected>Descendind</option>
            @endif
        </select>
        <input type="submit" name="Sort">
    </form>
    <form method="GET" action="{{route('product.categoryfilter')}}">
    @csrf
        <select name="category_id">
            @foreach ($productCategories as $category )
                <option value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
        </select>
        <input type="submit" name="Sort">
    </form>
        @if (count($products) == 0)
            <p>There is no products</p>
        @endif

        @if (session()->has('error_message'))
        <div class="alert alert-danger">
            {{session()->get('error_message')}}
        </div>
        @endif

        @if (session()->has('success_message'))
                <div class="alert alert-success">
                    {{session()->get('success_message')}}
                    success_message
                </div>
        @endif
   
<table class="table">
        <tr>
            <td>ID</td>
            <td>Title</td>
            <td>Descrtiption</td>
            <td>Price</td>
            <td>Category</td>
            <td>Image</td>
            <th class="col-2" colspan="2">Tools</th>  
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->title }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->getProductCategory->title }}</td>
            <td>
                <img src="{{ $product->image_url }}" alt="{{ $product->image_url }}" class="img-thumbnail" width="80" />
            </td>
            <td><a class="btn btn-secondary" href="{{route('product.edit', [$product])}}">Edit</a></td>
            <td>
                <form method="post" action="{{route('product.destroy', [$product])}}">
                @csrf
                    <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>

@endsection  