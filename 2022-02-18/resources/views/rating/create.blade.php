@extends('layouts.app')
@section('content')
<div class="container">
<form method="GET" action="{{route('rating.create')}}">
<input type="number" name="input_count" value="{{$inputCount}}">
<button type="submit">Pridėti</button>
</form>
<form method="POST" action="{{route('rating.store')}}">
@csrf
@for($i=0; $i<$inputCount; $i++)
<input type="text" name="ratingTitle[]" value="test{{$i}}">
<input type="number" name="ratingRating[]" value="{{$i}}">
</br>
@endfor
<button type="submit">Įterpti</button>
</form>
</div>
@endsection  
