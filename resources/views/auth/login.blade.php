@extends('layouts.app')

@section('content')
    <div class="max-w-md mx-auto bg-white p-8 rounded-xl shadow-sm border border-gray-100">
        <h2 class="text-2xl font-bold mb-6">Login</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="email" name="email" placeholder="Email" class="w-full p-3 mb-4 border rounded-lg">
            <input type="password" name="password" placeholder="Password" class="w-full p-3 mb-4 border rounded-lg">
            <button class="w-full bg-indigo-600 text-white py-3 rounded-lg font-semibold hover:bg-indigo-700">Login</button>
        </form>
    </div>
@endsection
