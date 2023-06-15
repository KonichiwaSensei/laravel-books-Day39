@extends('layouts/main')

@section('content')
    <h1>The 10 Latest books:</h1>

    <div class="container">
        <ul id="latestBooks"></ul>
        <p id="latestBooksDescription"></p>
    </div>

    <button id="loadBooksBtn">Load Books</button>
    @vite('resources/js/app.js')
@endsection
