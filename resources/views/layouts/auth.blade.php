<!-- resources/views/layouts/auth.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('logo.png') }}">
    <title>@yield('title', 'Sanifect LMS')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-900 text-gray-100 min-h-screen flex flex-col">
    <x-navbar />

    <!-- Auth Content Wrapper -->
    <div class="flex justify-center items-center flex-grow">
        <div class="bg-gray-800 p-10 rounded-3xl shadow-lg w-full max-w-md">
            @yield('content')
        </div>
    </div>
</body>
</html>
