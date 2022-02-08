@extends('layouts.app')
@section('content')

<div class="container">
    <form method="GET" action="{{route('author.index')}}">
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
        {{-- <select name="recordsPerPage">
            @foreach ($authors->recordPerPage as $key => $page) 
                <option value="{{ $key }}" >{{ $page }}</option>
            @endforeach
        </select> --}}
        <input type="text" name="search_key">
        <button type="submit">Search</button>
    </form>
    
    <table class="table">
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Surename</td>
            <td>username</td>
            <td>Descrtiption</td>
        </tr>
        @foreach ($authors as $author)
        <tr>
            <td>{{ $author->id }}</td>
            <td>{{ $author->name }}</td>
            <td>{{ $author->surename }}</td>
            <td>{{ $author->username }}</td>
            <td>{{ $author->description }}</td>
        </tr>
        @endforeach
    </table>
    {!! $authors->appends(Request::all())->links() !!}
    <div>
     
    </div>
</div>


@endsection