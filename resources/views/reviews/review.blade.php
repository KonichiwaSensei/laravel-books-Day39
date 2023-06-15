@extends('layouts/main')

@section('content')
<form action="{{ route('reviews.update', $review->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="review_text">Edit your review:</label>
    <input type="textfield" name="review_text" id="review_text" value="{{$review->review_text}}">
    <button>Submit</button>
</form>
@endsection