<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="{{ asset('logo.png') }}">
    <title>Sanifect | Welcome</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gradient-to-br from-gray-100 to-white dark:from-gray-900 dark:to-gray-800 dark:text-white font-poppins">

    <!-- Hero Section with Video Background -->
    <section class="relative w-full h-screen flex items-center justify-center overflow-hidden px-6 text-center">
        <video class="absolute top-0 left-0 w-full h-full object-cover -z-10" autoplay muted loop playsinline>
            <source src="https://videos.pexels.com/video-files/7230869/7230869-uhd_3840_2160_25fps.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>

        <div class="relative max-w-2xl">
            <!-- SANIFECT Heading -->
            <h1 class="text-6xl md:text-7xl font-extrabold uppercase mb-6">
                <span class="text-yellow-500">Sa</span><span class="text-white">NIFEC</span><span class="text-black dark:text-white">t</span>
            </h1>

            <p class="text-xl font-medium mb-8 dark:text-white">
                Providing innovative solutions to safeguard your surroundings. Let us help you keep your environment safe and healthy.
            </p>

            <!-- Buttons -->
            <div class="flex justify-center space-x-6">
                <a href="{{ route('login') }}" class="bg-white text-yellow-600 px-8 py-4 rounded-lg text-xl font-semibold hover:bg-yellow-100 transition duration-300">Login</a>
                <a href="{{ route('register') }}" class="bg-yellow-500 text-white px-8 py-4 rounded-lg text-xl font-semibold hover:bg-yellow-400 transition duration-300">Register</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-10">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 Sanifect. All rights reserved.</p>
            <nav class="mt-4">
                <a href="#" class="text-gray-400 hover:text-white mx-4">Privacy Policy</a>
                <a href="#" class="text-gray-400 hover:text-white mx-4">Terms of Service</a>
                <a href="#" class="text-gray-400 hover:text-white mx-4">Contact Us</a>
            </nav>
        </div>
    </footer>

</body>

</html>
