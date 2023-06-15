@extends('layouts/main')

@section('content')
    <h4>New author</h4>
    @if (isset($author->id))
        <form action="{{ route('authors.update', $author->id) }}" method="POST">
            @method('PUT')
    @else
        <form action="{{ route('authors.store') }}" method="POST">
    @endif
            @csrf

            <label for="name">Name:</label>
            <input id="name" name="name" value="{{ old('name', $author->name) }}" />

            <br />

            <label for="bio">Bio:</label>
            <textarea id="bio" name="bio">{{ old('name', $author->bio) }}</textarea>

            <br />

            <button>Submit</button>
        </form>
@endsection
