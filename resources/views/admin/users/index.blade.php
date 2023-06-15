@extends('layouts.main')

@section('content')

<h1>List of users</h1>

{{-- this is where the react app will render --}}
{{--           ↓                             --}}
<div id="root"></div>

@viteReactRefresh
@vite('resources/js/user-list/main.jsx')


@endsection