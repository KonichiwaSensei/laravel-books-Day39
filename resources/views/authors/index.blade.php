@extends('layouts/main')

@section('content')
    <h3>Authors</h3>

    <a href="{{ route('authors.create') }}">new author</a>

    <ul>
        @foreach($authors as $author)
            <li>
                <a href="{{ route('authors.show', $author->id) }}">{{ $author->name }}</a>
            </li>
        @endforeach
    </ul>
@endsection
