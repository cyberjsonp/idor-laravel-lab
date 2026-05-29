@extends('layouts.app')

@section('content')
<div class="flex items-start justify-between gap-6">
    <div>
        <p class="text-sm font-semibold text-indigo-600">IDOR training</p>
        <h1 class="mt-2 text-3xl font-bold tracking-tight">Challenge List</h1>
        <p class="mt-3 text-gray-600">
            Practice intentionally vulnerable IDOR scenarios in a local environment.
        </p>
    </div>

    <div class="rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-600">
        Logged in as <span class="font-semibold text-gray-900">{{ auth()->user()->email }}</span>
    </div>
</div>

<div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">
    @foreach($challenges  as $challenge)
        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm hover:shadow-md transition">
            <div class="flex items-center justify-between">
                <span class="inline-flex rounded-full bg-indigo-50 px-3 py-1 text-xs font-semibold text-indigo-700">
                    {{ $challenge['category'] }}
                </span>

                <span class="text-xs font-medium text-gray-500">
                    {{ $challenge['difficulty'] }}
                </span>
            </div>

            <h2 class="mt-4 text-xl font-bold text-gray-900">
                Challenge {{ $challenge['number'] }}
            </h2>

            <h3 class="mt-1 text-base font-semibold text-gray-800">
                {{ $challenge['title'] }}
            </h3>

            <p class="mt-3 text-sm leading-6 text-gray-600">
                {{ $challenge['description'] }}
            </p>

            <div class="mt-6">
                <a href="{{ $challenge['route'] }}"
                   class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700">
                    Open Challenge
                </a>
            </div>
        </div>
    @endforeach
</div>
@endsection
