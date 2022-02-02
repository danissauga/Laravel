@extends('layouts.app')
@section('content')

<div class="container">
    <h1>Articles image list</h1>
   <div class="form-group pt-2 pb-2">
        <a class="btn btn-primary" href="{{route('articleimage.create') }}">Add image</a>

    {{--<a class="btn btn-primary" href="{{route('articleimage.create') }}">Add School </a>
        <a class="btn btn-secondary" href="{{route('articleimage.index') }}">School list</a>--}}
    </div> 
 
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

        @if (count($articleimages) == 0)
            <p>There is no article images</p>
        @endif
 
       <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>ALT</th>
                <th>SRC</SRC:m></th>
                <th>width</th>
                <th>height</th>
                <th>Class</th>
                <th class="col-3" colspan="3">Tools</th>
            </tr>

            @foreach ($articleimages as $articleimage)
                <tr>
                    <td>{{ $articleimage->id }}</td>
                    <td>{{ $articleimage->alt }}</td>
                    <td> 
                        <img id='image_{{$articleimage->id}}' class='{{$articleimage->class}}' src='{{'/images/'.$articleimage->src}}' alt='{{$articleimage->alt}}' width='{{$articleimage->width}}' height='{{$articleimage->height}}' />  
                    </td>
                    <td>{{ $articleimage->width }}</td>
                    <td>{{ $articleimage->height }}</td>
                    <td>{{ $articleimage->class }}</td>
                    <td><a class="btn btn-primary" href="{{route('articleimage.show', [$articleimage])}}">Show</a></td>
                    <td><a class="btn btn-secondary" href="{{route('articleimage.edit', [$articleimage])}}">Edit</a></td>
                    <form class="form-control" method="post" action="{{route('articleimage.destroy', [$articleimage])}}">
                    <td>
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </td>
                    @csrf
                    </form>
                </tr>
            @endforeach
        </table>
</div>
@endsection