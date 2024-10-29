<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="logo.png">
    <title>Login - Sanifect LMS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-screen w-screen overflow-hidden">

    <!-- Full-Screen Wrapper with Background Image -->
    <div class="flex w-full h-full">

        <!-- Left Side: Form Section -->
        <div class="w-full md:w-1/2 bg-gray-800 bg-opacity-90 p-12 flex items-center justify-center">
            <div class="max-w-lg w-full">
                <h2 class="text-5xl font-extrabold text-gray-100 mb-4 text-center">Welcome back!</h2>
                <p class="text-gray-400 text-center mb-8">Enter your credentials to access your account</p>

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email Field -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-300">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required
                               class="w-full px-4 py-3 rounded-lg border border-gray-600 bg-gray-700 text-gray-100 
                                      focus:outline-none focus:ring-2 focus:ring-yellow-400 @error('email') border-red-500 @enderror">
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password Field with Toggle Button -->
                    <div class="relative">
                        <label for="password" class="block text-sm font-medium text-gray-300">Password</label>
                        <div class="relative">
                            <input type="password" id="password" name="password" required
                                   class="w-full px-4 py-3 rounded-lg border border-gray-600 bg-gray-700 text-gray-100 
                                          focus:outline-none focus:ring-2 focus:ring-yellow-400 @error('password') border-red-500 @enderror">

                            <button type="button" class="absolute inset-y-0 right-4 flex items-center"
                                    onclick="togglePasswordVisibility('password', this)">
                                <svg id="eye-open" xmlns="http://www.w3.org/2000/svg" fill="none" 
                                     viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6 text-gray-400">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.478 0-8.268-2.943-9.542-7z" />
                                </svg>

                                <svg id="eye-closed" xmlns="http://www.w3.org/2000/svg" fill="none" 
                                     viewBox="0 0 24 24" stroke="currentColor" 
                                     class="w-6 h-6 text-gray-400 hidden">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.975 9.975 0 014.338-5.917m3.887-1.222a9.975 9.975 0 014.543-.861M9.879 9.879l4.242 4.242m0-4.242l-4.242 4.242" />
                                </svg>
                            </button>
                        </div>
                        @error('password')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between">
                        <label class="flex items-center text-sm text-gray-400">
                            <input type="checkbox" class="h-4 w-4 text-yellow-500 rounded focus:ring-yellow-400">
                            <span class="ml-2">Remember me</span>
                        </label>
                        <a href="#" class="text-sm text-yellow-500 hover:text-yellow-400">Forgot your password?</a>
                    </div>

                    <!-- Login Button -->
                    <button type="submit" class="w-full bg-yellow-500 text-gray-900 py-3 rounded-lg font-semibold
                                                   hover:bg-yellow-400 transition duration-200">
                        Log In
                    </button>
                </form>

                <div class="text-center mt-6">
                    <a href="{{ route('register') }}" class="text-sm text-yellow-500 hover:text-yellow-400">
                        Don't have an account? Register here
                    </a>
                </div>
            </div>
        </div>

        <!-- Right Side: Full-Height Image Section -->
        <div class="hidden md:block md:w-1/2">
            <img src="{{ asset('login.jpg') }}"
                 alt="Login Background" class="w-full h-full object-cover">
        </div>

    </div>

    <script>
        function togglePasswordVisibility(inputId, button) {
            const input = document.getElementById(inputId);
            const eyeOpen = button.querySelector('#eye-open');
            const eyeClosed = button.querySelector('#eye-closed');

            if (input.type === 'password') {
                input.type = 'text';
                eyeOpen.classList.add('hidden');
                eyeClosed.classList.remove('hidden');
            } else {
                input.type = 'password';
                eyeOpen.classList.remove('hidden');
                eyeClosed.classList.add('hidden');
            }
        }
    </script>

</body>
</html>
