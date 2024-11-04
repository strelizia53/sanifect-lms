<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="logo.png">
    <title>Forgot Password - Sanifect LMS</title>
    @vite('resources/css/app.css')
</head>
<body class="h-screen w-screen overflow-hidden bg-gray-900 text-gray-100">

    <!-- Full-Screen Wrapper -->
    <div class="flex w-full h-full">

        <!-- Form Section -->
        <div class="w-full md:w-1/2 bg-gray-800 bg-opacity-90 p-12 flex items-center justify-center">
            <div class="max-w-lg w-full">
                <h2 class="text-5xl font-extrabold text-gray-100 mb-4 text-center">Reset Password</h2>
                <p class="text-gray-400 text-center mb-6">Enter your email address to receive a password reset link.</p>

                @if (session('status'))
                    <div class="bg-green-500 text-gray-900 p-4 rounded mb-4">
                        {{ session('status') }}
                    </div>
                @endif

                <form action="{{ route('password.email') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Email Field -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-300">Email Address</label>
                        <input type="email" name="email" id="email" required
                               class="w-full px-4 py-3 rounded-lg border border-gray-600 bg-gray-700 text-gray-100
                                      focus:outline-none focus:ring-2 focus:ring-yellow-400 @error('email') border-red-500 @enderror">
                        @error('email')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="w-full bg-yellow-500 text-gray-900 py-3 rounded-lg font-semibold
                                                   hover:bg-yellow-400 transition duration-200">
                        Send Password Reset Link
                    </button>
                </form>

                <div class="text-center mt-6">
                    <a href="{{ route('login') }}" class="text-sm text-gray-300 hover:text-yellow-500">
                        Remembered your password? Login here
                    </a>
                </div>
            </div>
        </div>

        <!-- Right Side Image -->
        <div class="hidden md:block md:w-1/2">
            <img src="{{ asset('forgot-password.jpg') }}"
                 alt="Forgot Password Background" class="w-full h-full object-cover">
        </div>
    </div>

</body>
</html>
