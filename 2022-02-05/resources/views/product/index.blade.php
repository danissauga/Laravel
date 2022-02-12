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
       
        <select name="paginateSetting">
            @foreach ($paginationSettings as $setting)
            @if ($paginateSetting == $setting->value)
                <option selected value="{{ $setting->value }}">{{ $setting->title }}</option>
            @else 
                <option value="{{ $setting->value }}">{{ $setting->title }}</option> 
            @endif
            @endforeach
        </select>
        <select name="category_id">
            <option value="all">All records</option>
            @foreach ($productCategories as $category )
            @if ($category_id == $category->id)
                <option selected value="{{ $category->id }}">{{ $category->title }}</option>
            @else
                <option value="{{ $category->id }}">{{ $category->title }}</option>
            @endif
            @endforeach
        </select>
        <input type="submit" name="Atrinkti">
    </form>

<a href="{{route('product.index')}}" class="btn btn-secondary">Clear filters</a>
    
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
            <th style="width: 50px;" colspan="2">Tools</th>  
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
            <td><a style="border: none; background-color:transparent;" href="{{route('product.edit', [$product])}}"><i class="fas fa-edit text-gray-300"></i></a></td>
            
            <td>
                <form method="post" action="{{route('product.destroy', [$product])}}">
                @csrf
                    <button type="submit" style="border: none; background-color:transparent;"><i class="fas fa-trash fa-lg text-danger"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  {{--   {!! $products->links() !!} --}}
  @if ($paginateSetting != 1) 
    {!! $products->appends(Request::except('page'))->render() !!}
  @endif
</div>

@endsection  