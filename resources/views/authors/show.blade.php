@extends('layouts/main')

@section('content')
    <h3>{{ $author->name }}</h3>

    {!! $author->bio !!}

    <br />
    <a href="{{ route('authors.edit', $author->id) }}"><button>Edit</button></a>
    <form action="{{ route('authors.destroy', $author->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button>Delete</button>
    </form>
@endsection
