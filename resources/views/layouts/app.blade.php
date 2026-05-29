<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'IDOR Lab' }}</title>
    @vite(['resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-900">
<header class="bg-white border-b border-gray-200">
    <div class="max-w-6xl mx-auto px-4 py-4 flex items-center justify-between">
        <a href="{{ route('home') }}" class="font-semibold text-lg tracking-tight">
            IDOR<span class="text-indigo-600">Lab</span>
        </a>

        <nav class="flex items-center gap-4 text-sm">
            <a class="text-gray-700 hover:text-gray-900" href="{{ route('challenges.index') }}">Challenges</a>

            <div class="w-px h-5 bg-gray-200 mx-1"></div>

            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="text-gray-700 hover:text-gray-900">Logout</button>
                </form>
            @else
                <a class="text-gray-700 hover:text-gray-900" href="{{ route('login') }}">Login</a>
                <a class="inline-flex items-center rounded-md bg-indigo-600 px-3 py-1.5 text-white hover:bg-indigo-700"
                   href="{{ route('register') }}">Sign up</a>
            @endauth
        </nav>
    </div>
</header>

<main class="max-w-6xl mx-auto px-4 py-8">
    @if (session('status'))
        <div class="mb-6 rounded-md border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">
            {{ session('status') }}
        </div>
    @endif

    @yield('content')
</main>

<footer class="border-t border-gray-200 bg-white">
    <div class="max-w-6xl mx-auto px-4 py-8 text-xs text-gray-500">
        This lab is intentionally vulnerable for learning purposes (local environment).
    </div>
</footer>
</body>
</html>
