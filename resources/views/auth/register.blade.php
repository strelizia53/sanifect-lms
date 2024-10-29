<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="logo.png">
    <title>Register - Sanifect LMS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-screen w-screen overflow-hidden">

    <!-- Full-Screen Wrapper -->
    <div class="flex w-full h-full">

        <!-- Left Side: Register Form Section -->
        <div class="w-full md:w-1/2 bg-gray-800 bg-opacity-90 p-12 flex items-center justify-center">
            <div class="max-w-lg w-full">
                <h2 class="text-5xl font-extrabold text-gray-100 mb-4 text-center">Create Account</h2>
                <p class="text-gray-400 text-center mb-8">Fill in your details to register</p>

                <form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf

                    <!-- Name Field -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-300">Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required
                               class="w-full px-4 py-3 rounded-lg border border-gray-600 bg-gray-700 text-white 
                                      focus:outline-none focus:ring-2 focus:ring-yellow-400 @error('name') border-red-500 @enderror">
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email Field -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-300">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required
                               class="w-full px-4 py-3 rounded-lg border border-gray-600 bg-gray-700 text-white 
                                      focus:outline-none focus:ring-2 focus:ring-yellow-400 @error('email') border-red-500 @enderror">
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password Field -->
                    <div class="relative">
                        <label for="password" class="block text-sm font-medium text-gray-300">Password</label>
                        <div class="relative">
                            <input type="password" id="password" name="password" required
                                   class="w-full px-4 py-3 rounded-lg border border-gray-600 bg-gray-700 text-white 
                                          focus:outline-none focus:ring-2 focus:ring-yellow-400 @error('password') border-red-500 @enderror">
                            <button type="button" class="absolute inset-y-0 right-4 flex items-center"
                                    onclick="togglePasswordVisibility('password', this)">
                                <svg id="eye-open" xmlns="http://www.w3.org/2000/svg" fill="none" 
                                     viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6 text-gray-300">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.478 0-8.268-2.943-9.542-7z" />
                                </svg>
                                <svg id="eye-closed" xmlns="http://www.w3.org/2000/svg" fill="none" 
                                     viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6 text-gray-300 hidden">
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
                    <div class="relative">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-300">Confirm Password</label>
                        <div class="relative">
                            <input type="password" id="password_confirmation" name="password_confirmation" required
                                   class="w-full px-4 py-3 rounded-lg border border-gray-600 bg-gray-700 text-white 
                                          focus:outline-none focus:ring-2 focus:ring-yellow-400">
                            <button type="button" class="absolute inset-y-0 right-4 flex items-center"
                                    onclick="togglePasswordVisibility('password_confirmation', this)">
                                    <svg id="eye-open" xmlns="http://www.w3.org/2000/svg" fill="none" 
                                    viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6 text-gray-300">
                                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                         d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                         d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.478 0-8.268-2.943-9.542-7z" />
                               </svg>
                               <svg id="eye-closed" xmlns="http://www.w3.org/2000/svg" fill="none" 
                                    viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6 text-gray-300 hidden">
                                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                         d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.975 9.975 0 014.338-5.917m3.887-1.222a9.975 9.975 0 014.543-.861M9.879 9.879l4.242 4.242m0-4.242l-4.242 4.242" />
                               </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Register Button -->
                    <button type="submit" class="w-full bg-yellow-500 text-gray-900 py-3 rounded-lg font-semibold
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
        </div>

        <!-- Right Side: Full-Height Image Section -->
        <div class="hidden md:block md:w-1/2">
            <img src="{{ asset('register.jpg') }}"
                 alt="Register Background" class="w-full h-full object-cover">
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
