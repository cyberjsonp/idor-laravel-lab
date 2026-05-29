@extends('layouts.app')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
    <div>
        <div class="text-xs text-gray-500">
    auth check: {{ auth()->check() ? 'YES' : 'NO' }}
</div>
        <p class="text-sm font-semibold text-indigo-600">Local training lab</p>
        <h1 class="mt-2 text-4xl font-bold tracking-tight">
            IDOR Lab
        </h1>
        <p class="mt-4 text-gray-600">
            Practice real-world Insecure Direct Object Reference scenarios in a safe, local environment.
        </p>

        <div class="mt-6 flex flex-wrap gap-3">
            @auth
                <a href="{{ route('challenges.index') }}"
                   class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-white font-semibold hover:bg-indigo-700">
                    Go to Challenges
                </a>
            @else
                <a href="{{ route('register') }}"
                   class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-white font-semibold hover:bg-indigo-700">
                    Create an account
                </a>
                <a href="{{ route('login') }}"
                   class="inline-flex items-center rounded-md bg-white px-4 py-2 text-gray-900 font-semibold border border-gray-200 hover:bg-gray-50">
                    Login
                </a>
            @endauth
        </div>

        <div class="mt-8 text-xs text-gray-500">
            Disclaimer: This project is intentionally vulnerable for learning purposes.
        </div>
    </div>

    <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm">
        <h2 class="text-lg font-semibold">What you’ll learn</h2>
        <ul class="mt-4 space-y-2 text-sm text-gray-700 list-disc list-inside">
            <li>Finding and exploiting IDOR in realistic flows</li>
            <li>Broken authorization patterns</li>
            <li>Secure fixes (policy checks, ownership validation)</li>
        </ul>

        <div class="mt-6 rounded-xl bg-gray-50 border border-gray-200 p-4">
            <p class="text-sm font-medium">Next step</p>
            <p class="text-sm text-gray-600 mt-1">
                Sign up, then open <span class="font-mono">Challenges</span>.
            </p>
        </div>
    </div>
</div>
@endsection
