@extends('layouts.app')
@section('content')

<div class="container">
    <h1>Product categories list</h1>
    <a class="btn btn-primary" href="{{route('productcategory.create') }}">Add Category</a> 
    <a class="btn btn-secondary" href="{{route('product.index') }}">Products list</a>

    <form method="GET" action="{{route('productcategory.index')}}">
        @csrf
            <select name="sortCollumn">
                @foreach ($select_array as $key => $collumn)
                    @if (($collumn == $sortCollumn) || (empty($sortCollumn) && $key == 0))
                        <option selected value="{{ $collumn }}">{{ $collumn }}</option>
                    @else
                    <option value="{{ $collumn }}">{{ $collumn }}</option>
                    @endif
                @endforeach
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

        @if (count($productCategories) == 0)
            <p>There is no schools</p>
        @endif
   
<table class="table">
        <tr>
            <td>ID</td>
            <td>Title</td>
            <td>Descrtiption</td>
            <th class="col-2" colspan="2">Tools</th>  
        </tr>
        @foreach ($productCategories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->title }}</td>
            <td>{{ $category->description }}</td>
            <td><a class="btn btn-secondary" href="{{route('productcategory.edit', [$category])}}">Edit</a></td>
            <td>
                <form method="post" action="{{route('productcategory.destroy', [$category])}}">
                @csrf
                    <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
            </td>
        </tr>
        @endforeach
    </table>
     {!! $productCategories->links() !!}
</div>
@endsection  