<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-2xl font-bold mb-6 text-gray-800">Available Challenges</h1>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Challenge 1 Card -->
                <div class="bg-white p-6 rounded-lg shadow border border-gray-200">
                    <h2 class="text-lg font-semibold text-indigo-600">Challenge 1</h2>
                    <p class="text-gray-600 mt-2">IDOR Basics: Basic Object Access</p>
                    <a href="{{ route('challenges.01') }}" class="mt-4 block text-indigo-500 font-bold hover:underline">Start Challenge →</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
