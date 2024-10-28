@extends('layouts.auth')

@section('content')
    <div class="max-w-md mx-auto mt-20 bg-gray-800 p-8 rounded-xl shadow-md">
        <h2 class="text-3xl font-semibold text-center text-white mb-6">Register</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <!-- Name Field -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-300">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required
                       class="w-full px-4 py-2 rounded-lg border border-gray-600 bg-gray-700 text-white 
                              @error('name') border-red-500 @enderror focus:outline-none focus:ring-2 focus:ring-yellow-400">
                @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email Field -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-300">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                       class="w-full px-4 py-2 rounded-lg border border-gray-600 bg-gray-700 text-white 
                              @error('email') border-red-500 @enderror focus:outline-none focus:ring-2 focus:ring-yellow-400">
                @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password Field -->
            <div class="mb-4 relative">
                <label for="password" class="block text-sm font-medium text-gray-300">Password</label>
                <div class="relative">
                    <input type="password" id="password" name="password" required
                           class="w-full px-4 py-2 rounded-lg border border-gray-600 bg-gray-700 text-white 
                                  @error('password') border-red-500 @enderror focus:outline-none focus:ring-2 focus:ring-yellow-400">
                    <button type="button" class="absolute inset-y-0 right-4 flex items-center"
                            onclick="togglePasswordVisibility('password', this)">
                        <svg id="eye-open" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 text-gray-300">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <svg id="eye-closed" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 text-gray-300 hidden">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.975 9.975 0 014.338-5.917m3.887-1.222a9.975 9.975 0 014.543-.861M9.879 9.879l4.242 4.242m0-4.242l-4.242 4.242" />
                        </svg>
                    </button>
                </div>
                @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password Field -->
            <div class="mb-6 relative">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-300">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required
                       class="w-full px-4 py-2 rounded-lg border border-gray-600 bg-gray-700 text-white 
                              focus:outline-none focus:ring-2 focus:ring-yellow-400">
            </div>

            <button type="submit" class="w-full bg-yellow-500 text-gray-900 py-2 rounded-lg font-semibold 
                                       hover:bg-yellow-400 transition duration-200">
                Register
            </button>
        </form>

        <div class="text-center mt-6">
            <a href="{{ route('login') }}" class="text-sm text-gray-300 hover:text-yellow-500">
                Already have an account? Login here
            </a>
        </div>
    </div>
@endsection
