<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">
    <div class="bg-white p-10 rounded-3xl shadow-lg w-full max-w-md">
        <h2 class="text-3xl font-semibold text-center text-gray-700 mb-6">Register</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-600">Name</label>
                <input type="text" id="name" name="name" required
                       class="w-full px-4 py-2 rounded-lg border border-gray-300">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                <input type="email" id="email" name="email" required
                       class="w-full px-4 py-2 rounded-lg border border-gray-300">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                <input type="password" id="password" name="password" required
                       class="w-full px-4 py-2 rounded-lg border border-gray-300">
            </div>
            <div class="mb-6">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-600">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required
                       class="w-full px-4 py-2 rounded-lg border border-gray-300">
            </div>
            <button type="submit" class="w-full bg-yellow-500 text-white py-2 rounded-lg">
                Register
            </button>
        </form>
        <div class="text-center mt-6">
            <a href="{{ route('login') }}" class="text-sm text-gray-600">Already have an account? Login here</a>
        </div>
    </div>
</body>
</html>
