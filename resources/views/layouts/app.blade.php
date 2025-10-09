<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'JobFinder')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>
    <nav>
        <div>
            <a href="{{ route('home') }}">JobFinder</a>
            @auth
                @if(auth()->user()->isStudent())
                    <a href="{{ route('student.dashboard') }}">Dashboard</a>
                    <a href="{{ route('student.jobs.index') }}">Browse Jobs</a>
                    <a href="{{ route('student.applications.index') }}">My Applications</a>
                    <a href="{{ route('student.profile') }}">Profile</a>
                @else
                    <a href="{{ route('employer.dashboard') }}">Dashboard</a>
                    <a href="{{ route('employer.jobs.index') }}">My Jobs</a>
                    <a href="{{ route('employer.jobs.create') }}">Post Job</a>
                    <a href="{{ route('employer.profile') }}">Profile</a>
                @endif
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        </div>
    </nav>

    <main>
        @if(session('success'))
            <div style="background: lightgreen; padding: 10px; margin: 10px;">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div style="background: lightcoral; padding: 10px; margin: 10px;">
                {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div style="background: lightcoral; padding: 10px; margin: 10px;">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>
