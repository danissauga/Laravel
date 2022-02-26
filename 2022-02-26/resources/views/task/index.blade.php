@extends('layouts.app')
@section('content')

<div class="container">
    <h2>Post`s list</h2>
    <a class="btn btn-primary" href="{{route('post.create')}}">Create post</a>
    <a class="btn btn-primary" href="{{route('category.create')}}">Create Category</a>
    <a class="btn btn-primary" href="{{route('category.index')}}">Categories list</a>
    <form method="GET" action="{{route('post.index')}}">
    @csrf

    <select name="paginateSetting">
            @foreach ($paginationSettings as $setting)
            @if ($paginateSetting == $setting->value)
                <option selected value="{{ $setting->value }}">{{ $setting->title }}</option>
            @else
                <option value="{{ $setting->value }}">{{ $setting->title }}</option>
            @endif
            @endforeach
        </select>
        <select name="allCategories">
            <option selected value="all">All categories</option>
            @foreach ($allCategories as $selectCategory)
            @if ($category == $selectCategory->id)
                <option selected value="{{ $selectCategory->id }}">{{ $selectCategory->title }}</option>
            @else
                <option value="{{ $selectCategory->id }}">{{ $selectCategory->title }}</option>
            @endif
            @endforeach
        </select>
    <button type="submit" class="btn btn-secondary">Atrinkti</button>
    <input hidden name="sort" type="text" value="{{ $sort }}"/>
    <input hidden name="direction" type="text" value="{{ $direction }}"/>

</form>


    <table class="table table-hover">
    <thead>
        <tr>
            <td style="width: 50px;">@sortablelink('id','ID')</td>
            <td>@sortablelink('title','Title')</td>
            <td>@sortablelink('postContent','Post Content')</td>
         {{--     <td  style="width: 200px;">@sortablelink('category_id','Category')</td> --}}
           <td style="width: 300px;" >@sortablelink('postHasCategory.title','Category')</td>
           <td colspan="3">Tools</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->postContent }}</td>
            <td>{{ $post->postHasCategory->title }}</td> 
            <td><a class="btn btn-secondary" href="{{route('post.edit', [$post])}}">Edit</a></td>
            <td><a class="btn btn-secondary" href="{{route('post.show', [$post])}}">View</a></td>
            </td>
                <form class="form-control" method="post" action="{{route('post.destroy', [$post])}}">
                    <td>
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </td>
                    @csrf
                </form>
        </tr>
        @endforeach
    </tbody>
    </table>
    
       @if ($paginateSetting != 1)
        {!! $posts->appends(Request::except('page'))->render() !!}
    @endif

</div>
@endsection
