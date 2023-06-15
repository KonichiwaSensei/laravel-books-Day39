<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Books</title>
    @vite('resources/css/app.scss')
</head>

<body>
    <nav>
        @auth
            {{-- can only be seen by logged-in users --}}
            <a href="/books">Books</a>
            <a href="/authors">Authors</a>
            <a href="/books/latest">Latest Books</a>
            <a href="/home">Login Home</a>
            <a href="/">Welcome Page</a>
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button>Logout</button>
            </form>
        @endauth

        @can('admin')
            {{-- can only be seen by admin defined in Gate --}}
            <a href="/admin/books">Admin Books</a>
            <a href="/books/create">Admin Books Create</a>
            <br>
            <a href="/admin/users">Admin Users</a>
            <br>
            <a href="/api/books/latest">API Books Latest</a>
            <a href="/api/users">API Users</a>
            
        @endcan

        @guest
            {{-- can only be seen by not logged-in users --}}
            <a href="/login">Login</a>
            <a href="/register">Register</a>
            
        @endguest
    </nav>
    @include('common/messages')

    @yield('content')
</body>

</html>
