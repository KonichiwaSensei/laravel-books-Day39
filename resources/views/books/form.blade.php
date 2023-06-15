@extends('layouts/main')

@section('content')
    <h4>New book</h4>
    @if (isset($book->id))
        <form action="{{ route('books.update', $book->id) }}" method="POST">
            @method('PUT')
    @else
        <form action="{{ route('books.store') }}" method="POST">
    @endif
            @csrf

            <label for="title">Title:</label>
            <input id="title" name="title" value="{{ old('title', $book->title) }}" />

            <br />

            <label for="price">Prace:</label>
            <input id="price" name="price" value="{{ old('price', $book->price) }}" />

            <br />

            <label for="publication_date">Publication date:</label>
            <input type="date" id="publication_date" name="publication_date" value="{{ old('publication_date', $book->publication_date) }}" />

            <br />

            <label for="description">Description:</label>
            <textarea id="description" name="description">{{ old('name', $book->description) }}</textarea>

            <br />

            <button>Submit</button>
        </form>
@endsection
