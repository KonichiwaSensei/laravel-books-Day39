@extends('layouts/main')

@section('content')
    <form action="{{ route('login') }}" method="post">
        @csrf

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}">

        <br />
        <label for="password">Pasword:</label>
        <input type="password" id="password" name="password" value="">

        <br />
        <button>Login</button>
    </form>
@endsection
