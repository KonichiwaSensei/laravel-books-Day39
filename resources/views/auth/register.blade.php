@extends('layouts/main')

@section('content')
    <form action="{{ route('register') }}" method="post">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}">

        <br />
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}">

        <br />
        <label for="password">Pasword:</label>
        <input type="password" id="password" name="password" value="">

        <br />
        <label for="password_confirmation">Confirm password:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" value="">

        <br />
        <button>Register</button>

    </form>
@endsection
