@extends('layouts.app')

@section('content')
<div class="flex items-start justify-between gap-6">
    @if (session('success'))
    <div class="rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-green-800">
        {{ session('success') }}
    </div>
@endif
    @if($solved)
    <div class="mt-4 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-900">
        <div class="font-semibold">Solved</div>
        <div class="mt-1 text-green-600">
            You have successfully completed this challenge. Check the API response for the flag.
        </div>
    </div>
    @endif
    @if (session('flag'))
    <div class="mt-3 rounded-lg border border-yellow-200 bg-yellow-50 px-4 py-3">
        <div class="font-semibold text-yellow-900">Flag</div>
        <div class="mt-1 font-mono text-sm text-yellow-900">{{ session('flag') }}</div>
    </div>
@endif
@if (session('error'))
    <div class="rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-red-800">
        {{ session('error') }}
    </div>
@endif

    <div>
        <p class="text-sm font-semibold text-indigo-600">Challenge 01</p>
        <h1 class="mt-2 text-3xl font-bold tracking-tight">Delete Other Users' Shipping Address</h1>
        <p class="mt-3 text-gray-600">
            This challenge simulates a write-based IDOR where the application deletes an address
            by <span class="font-mono">address_id</span> without verifying ownership.
        </p>
    </div>

    <div class="rounded-xl border border-amber-200 bg-amber-50 px-4 py-3 text-sm text-amber-900 max-w-md">
        <div class="font-semibold">Hint</div>
        <div class="mt-1">
            Intercept the delete request and try changing the
            <span class="font-mono">address_id</span>.
        </div>
    </div>
</div>

<div class="mt-8 grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="lg:col-span-2">
        <div class="rounded-2xl border border-gray-200 bg-white shadow-sm">
            <div class="flex items-center justify-between border-b border-gray-100 px-6 py-4">
                <h2 class="font-semibold text-gray-900">Your saved addresses</h2>
                <span class="text-xs text-gray-500">
                    Logged in as {{ auth()->user()->email }}
                </span>
            </div>

            <div class="p-6">
                @if($addresses->isEmpty())
                    <p class="text-sm text-gray-600">No addresses found for your account.</p>
                @else
                    <div class="space-y-4">
                        @foreach($addresses as $address)
                            <div class="flex items-start justify-between gap-4 rounded-xl border border-gray-200 p-4">
                                <div>
                                    <div class="text-sm font-semibold text-gray-900">
                                        {{ $address->label }}
                                        <span class="ml-2 text-xs font-normal text-gray-500">
                                            ID: {{ $address->id }}
                                        </span>
                                    </div>

                                    <div class="mt-1 text-sm text-gray-700">
                                        {{ $address->full_name }}
                                    </div>

                                    <div class="text-sm text-gray-600">
                                        {{ $address->line1 }},
                                        {{ $address->city }}
                                        {{ $address->postal_code }},
                                        {{ $address->country }}
                                    </div>
                                </div>

                                <form method="POST" action="{{ route('address.delete') }}" class="shrink-0">
                                @csrf   
                                <input type="hidden" name="address_id" value="{{ $address->id }}">

                                    <button
                                        type="submit"
                                        class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white hover:bg-red-700">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

        <div class="mt-6 rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
            <h3 class="font-semibold text-gray-900">Goal</h3>
            <p class="mt-2 text-sm text-gray-600">
                Delete an address that belongs to another user by manipulating
                <span class="font-mono">address_id</span> in the request.
            </p>
        </div>
    </div>

    <div>
        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
            <h3 class="font-semibold text-gray-900">Endpoint</h3>
            <div class="mt-3 rounded-xl border border-gray-200 bg-gray-50 p-4 font-mono text-xs text-gray-800">
                POST /api/address/delete
            </div>

            <h3 class="mt-6 font-semibold text-gray-900">Example body</h3>
            <div class="mt-3 rounded-xl border border-gray-200 bg-gray-50 p-4 font-mono text-xs text-gray-800">
                address_id=3
            </div>

            <p class="mt-4 text-sm text-gray-600">
                The vulnerable behavior is that the backend deletes any address by ID
                without checking whether the address belongs to the logged-in user.
            </p>
        </div>
    </div>
</div>
@endsection
