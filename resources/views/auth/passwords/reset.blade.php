<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="logo.png">
    <title>Reset Password - Sanifect LMS</title>
    @vite('resources/css/app.css')
</head>
<body class="h-screen w-screen overflow-hidden bg-gray-900 text-gray-100">

    <!-- Full-Screen Wrapper -->
    <div class="flex w-full h-full">

        <!-- Form Section -->
        <div class="w-full md:w-1/2 bg-gray-800 bg-opacity-90 p-12 flex items-center justify-center">
            <div class="max-w-lg w-full">
                <h2 class="text-5xl font-extrabold text-gray-100 mb-4 text-center">Reset Password</h2>
                <p class="text-gray-400 text-center mb-6">Enter your new password below.</p>

                <form action="{{ route('password.update') }}" method="POST" class="space-y-6">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

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

                    <!-- New Password Field -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-300">New Password</label>
                        <input type="password" name="password" id="password" required
                               class="w-full px-4 py-3 rounded-lg border border-gray-600 bg-gray-700 text-gray-100
                                      focus:outline-none focus:ring-2 focus:ring-yellow-400 @error('password') border-red-500 @enderror">
                        @error('password')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Confirm Password Field -->
                    <div>
                        <label for="password-confirm" class="block text-sm font-medium text-gray-300">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password-confirm" required
                               class="w-full px-4 py-3 rounded-lg border border-gray-600 bg-gray-700 text-gray-100
                                      focus:outline-none focus:ring-2 focus:ring-yellow-400">
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="w-full bg-yellow-500 text-gray-900 py-3 rounded-lg font-semibold
                                                   hover:bg-yellow-400 transition duration-200">
                        Reset Password
                    </button>
                </form>
            </div>
        </div>

        <!-- Right Side Image -->
        <div class="hidden md:block md:w-1/2">
            <img src="{{ asset('reset.jpg') }}"
                 alt="Reset Password Background" class="w-full h-full object-cover">
        </div>
    </div>

</body>
</html>
