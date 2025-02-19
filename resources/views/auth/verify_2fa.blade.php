<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="logo.png">
    <title>Verify 2FA - Sanifect LMS</title>
    @vite('resources/css/app.css')
</head>
<body class="h-screen w-screen overflow-hidden">

    <!-- Full-Screen Wrapper with Background Image -->
    <div class="flex w-full h-full">

        <!-- Left Side: Form Section -->
        <div class="w-full md:w-1/2 bg-gray-800 bg-opacity-90 p-12 flex items-center justify-center">
            <div class="max-w-lg w-full">
                <h2 class="text-5xl font-extrabold text-gray-100 mb-4 text-center">Two-Factor Authentication</h2>
                <p class="text-gray-400 text-center mb-8">Enter the code sent to your email to continue.</p>

                <form method="POST" action="{{ route('verify.2fa') }}" class="space-y-6">
                    @csrf

                    <!-- OTP Field -->
                    <div>
                        <label for="two_factor_code" class="block text-sm font-medium text-gray-300">Enter OTP Code</label>
                        <input type="text" id="two_factor_code" name="two_factor_code" required
                               class="w-full px-4 py-3 rounded-lg border border-gray-600 bg-gray-700 text-gray-100 
                                      focus:outline-none focus:ring-2 focus:ring-yellow-400 @error('two_factor_code') border-red-500 @enderror">
                        @error('two_factor_code')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Verify Button -->
                    <button type="submit" class="w-full bg-yellow-500 text-gray-900 py-3 rounded-lg font-semibold
                                                   hover:bg-yellow-400 transition duration-200">
                        Verify OTP
                    </button>
                </form>

                <!-- Resend OTP -->
                <form method="POST" action="{{ route('resend.2fa') }}" class="mt-4">
                    @csrf
                    <button type="submit" class="w-full bg-gray-600 text-gray-100 py-3 rounded-lg font-semibold
                                                       hover:bg-gray-500 transition duration-200">
                        Resend OTP
                    </button>
                </form>

                <!-- Error Messages -->
                @if ($errors->any())
                    <div class="mt-4 text-center">
                        @foreach ($errors->all() as $error)
                            <p class="text-red-500 text-sm">{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

        <!-- Right Side: Full-Height Image Section -->
        <div class="hidden md:block md:w-1/2">
            <img src="{{ asset('reset.jpg') }}" alt="Verify 2FA Background" class="w-full h-full object-cover">
        </div>

    </div>

</body>
</html>
