@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($profileImages as $image)
        {{-- pilna kelia iki paveksliuko --}}
        {{-- <img id='image{{$image->id}}' class='{{$image->class}}' src='{{asset('/images/'.$image->src)}}' alt='{{$image->alt}}' width='{{$image->width}}' height='{{$image->height}}' /> --}}
        
        {{-- relative kelia --}}
        <img id='image{{$image->id}}' class='{{$image->class}}' src='{{'/images/'.$image->src}}' alt='{{$image->alt}}' width='{{$image->width}}' height='{{$image->height}}' />
    @endforeach
</div>        
@endsection