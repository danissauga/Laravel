@extends('layouts.app')
@section('content')

<div class="container">
    <h2>Categories list</h2>
    <a class="btn btn-primary" href="{{route('category.create')}}">Add new category</a>
    <a class="btn btn-secondary" href="{{route('post.index')}}">Go to post`s list</a>
    @if (session()->has('error_message'))
        <div class="alert alert-danger mt-2">
            {{session()->get('error_message')}}
        </div>
        @endif

        @if (session()->has('success_message'))
                <div class="alert alert-success mt-2">
                    {{session()->get('success_message')}}
                </div>
        @endif

        @if (count($categories) == 0)
            <p>There is no company</p>
        @endif


    <table class="table table-hover">
    <thead>
        <tr>
            <td style="width: 50px;">@sortablelink('id','ID')</td>
            <td>@sortablelink('title','Title')</td>
            <td>@sortablelink('description','Category descrioption')</td>
            <td>Post`s count</td>
            <td>Status</td>
            <td colspan="2">Tools</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->title }}</td>
            <td>{{ $category->description }}</td>
            <td>{{ count($category->categoryHasPosts) }}</td>
            <td>{{ $category->categoryHasStatus->title }}</td>
            <td><a class="btn btn-primary" href="{{route('category.show', [$category])}}">Show</a>
                <a class="btn btn-secondary" href="{{route('category.edit', [$category])}}">Edit</a></td>
                <form class="form-control" method="post" action="{{route('category.destroy', [$category])}}">
                    <td>
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </td>
                    @csrf
                </form>
        </tr>
        @endforeach
    </tbody>
    </table>
        
        {!! $categories->appends(Request::except('page'))->render() !!}
   

</div>

@endsection
