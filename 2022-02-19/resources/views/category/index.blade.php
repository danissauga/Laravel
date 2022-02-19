@extends('layouts.app')
@section('content')

<div class="container">
    <h2>Categories list</h2>

    <table class="table table-hover">
    <thead>
        <tr>
            <td style="width: 50px;">@sortablelink('id','ID')</td>
            <td>@sortablelink('title','Title')</td>
            <td>@sortablelink('description','Category descrioption')</td>
            <td>Post`s count</td>
            <td>Status</td>
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
            <td><a class="btn btn-primary" href="{{route('category.show', [$category])}}">Show</a></td>
        </tr>
        @endforeach
    </tbody>
    </table>
     {!! $categories->appends(Request::except('page'))->render() !!}
    {{--     @if ($paginateSetting != 1)
        {!! $tasks->appends(Request::except('page'))->render() !!}
    @endif--}}

</div>

@endsection
