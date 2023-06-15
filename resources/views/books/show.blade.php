@extends('layouts/main')

@section('content')
    <h3>{{ $book->title }}</h3>

    @foreach ($book->authors as $author)
        <h3>{{ $author->name }}</h3>
    @endforeach


    <div>published at: {{ $book->publication_date }}</div>
    <div>price: {{ $book->price }} Eur</div>
    {!! $book->description !!}

    <br />


    <form action="{{ route('reviews.store') }}" method="POST">
        @csrf
        <label for="review_text">Leave a Review:</label>
        <input type="hidden" name="book_id" id="book_id" value="{{ $book->id }}">
        <input type="textfield" name="review_text" id="review_text">
        <button>Submit</button>
    </form>

    
    <ul>
        @foreach ($book->reviews as $review)
            <li>
                {{ $review->review_text }}
            </li>


            @if (Auth::id() == $review->user_id || Gate::allows('admin'))
            <a href="{{ route('reviews.edit', $review->id) }}"><button>Edit</button></a>
            @endif
        

            @can('admin')
                <form action="{{ route('reviews.destroy', $review->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
            @endcan
        @endforeach
    </ul>

    @can('admin')
        <a href="{{ route('books.edit', $book->id) }}"><button>Edit</button></a>
        {{-- <a href="{{ route('reviews.review', $book->id) }}"><button>Review</button></a> --}}
        <form action="{{ route('books.destroy', $book->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button>Delete</button>
        </form>
    @endcan
@endsection
