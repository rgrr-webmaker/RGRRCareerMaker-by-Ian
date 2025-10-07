@extends('layouts.app')

@section('title', 'Welcome to JobFinder')

@section('content')
<div style="padding: 20px;">
    <h1>Welcome to JobFinder</h1>
    <p>Connect students with employers for meaningful career opportunities.</p>

    @guest
        <div style="margin-top: 20px;">
            <a href="{{ route('register') }}" style="margin-right: 10px;">Get Started</a>
            <a href="{{ route('login') }}">Already have an account?</a>
        </div>
    @else
        <div style="margin-top: 20px;">
            @if(auth()->user()->isStudent())
                <a href="{{ route('student.dashboard') }}">Go to Dashboard</a>
            @else
                <a href="{{ route('employer.dashboard') }}">Go to Dashboard</a>
            @endif
        </div>
    @endguest
</div>
@endsection
