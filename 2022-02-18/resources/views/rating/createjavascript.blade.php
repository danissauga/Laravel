@extends('layouts.app')
@section('content')
<div class="container">

<button type="button" class="btn btn-primary" id="add_field">Įterpti eilutę</button>
<button type="button" class="btn btn-danger" id="remove_field">Įterpti eilutę</button>
<input type="number" name="input_count" id="input_count" />
<button type="button" class="btn btn-primary" id="submit_number">Įterpti</button>


<form method="POST" action="{{route('rating.storejavascript')}}">
@csrf
<div class="input-rating">
<input type="text" name="ratingTitle[]" value="test1">
<input type="number" name="ratingRating[]" value="1">
</div>
<div id="info"></div>

<button type="submit">Saugoti</button>
</form>
</div>
<script>
    $(document).ready(function () {

        $('#add_field').click(function()
        {
            $('#info').append('<div class="input-rating"><input type="text" name="ratingTitle[]" value="test1"><input type="number" name="ratingRating[]" value="1"></div>');
        });
        $('#remove_field').click(function() {
            $('.input-rating:last-child').remove();
        });
        
        $('#submit_number').click(function() {
            let input_count;
            input_count = $('#input_count').val();
             for(let i=0; i<input_count; i++ ) {
             $('#info').append('<div class="input-rating"><input type="text" name="ratingTitle[]" value="test1"><input type="number" name="ratingRating[]" value="1"></div>');
             }
        });
    });

</script>


@endsection 