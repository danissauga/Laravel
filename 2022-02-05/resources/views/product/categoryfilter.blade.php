@extends('layouts.app')
@section('content')

<div class="container">

<table class="table">
        <tr>
            <td>ID</td>
            <td>Title</td>
            <td>Descrtiption</td>
            <td>Price</td>
            <td>Category</td>
            <td>Image</td> 
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
        </tr>
        @endforeach
    </table>


</div>

@endsection  