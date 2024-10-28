<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="{{ asset('logo.png') }}">
    <title>LMS | Dashboard</title>
    @vite('resources/css/app.css')
    <style>
        /* Ensures the body takes up the full height */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }

        /* Main section with sidebar and content */
        .main {
            flex: 1;
            display: flex;
            overflow: hidden;
        }

        /* Sidebar alignment */
        .sidebar {
            width: 250px;
            flex-shrink: 0;
            background-color: white;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
        }

        /* Custom scrollbar for the sidebar */
        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background-color: rgba(107, 114, 128, 0.5); /* gray-500 */
            border-radius: 3px;
        }

        /* Content area fills remaining space */
        .content {
            flex: 1;
            padding: 2rem;
        }

        /* Footer stays at the bottom */
        footer {
            width: 100%;
            background-color: #1a1a1a;
            color: white;
            text-align: center;
            padding: 1rem 0;
        }
    </style>
</head>

<body class="bg-gray-100 dark:bg-gray-900 dark:text-white" onload="loadTheme()">
    <!-- Navbar Component -->
    <x-navbar />

    <!-- Main Layout with Sidebar and Content -->
    <div class="main">
        <!-- Sidebar -->
        <aside class="sidebar p-6 dark:bg-gray-800">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-white mb-6">Categories</h2>
            <ul class="space-y-4">
                <li><a href="#" class="text-gray-600 dark:text-gray-300 hover:text-yellow-500">Mechanic</a></li>
                <li><a href="#" class="text-gray-600 dark:text-gray-300 hover:text-yellow-500">Beauty</a></li>
                <li><a href="#" class="text-gray-600 dark:text-gray-300 hover:text-yellow-500">Medical</a></li>
                <li><a href="#" class="text-gray-600 dark:text-gray-300 hover:text-yellow-500">Education</a></li>
                <li><a href="#" class="text-gray-600 dark:text-gray-300 hover:text-yellow-500">Construction</a></li>
                <li><a href="#" class="text-gray-600 dark:text-gray-300 hover:text-yellow-500">Hospitality</a></li>
            </ul>
        </aside>

        <!-- Content Area -->
        <div class="content">
            <!-- Search Bar -->
            <div class="flex justify-center mb-8">
                <input type="text" placeholder="Search modules..."
                    class="w-3/4 md:w-1/2 px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-yellow-400">
            </div>

            <!-- Dashboard Title -->
            <section class="text-center">
                <h1 class="text-4xl font-bold text-gray-700 dark:text-white mb-4">Welcome to Sanifect LMS</h1>
                <p class="text-gray-600 dark:text-gray-300">
                    You are logged in as <strong>{{ auth()->user()->role }}</strong>.
                </p>
            </section>

            <!-- Modules Grid -->
            <section class="mt-12 grid grid-cols-1 sm:grid-cols-2 gap-8">
                <!-- Module 1 -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                    <img src="https://via.placeholder.com/400x200" alt="Module 1" class="w-full h-48 object-cover" />
                    <div class="p-6">
                        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-4">Module 1: Introduction to Hygiene</h2>
                        <p class="text-gray-600 dark:text-gray-300 mb-4">
                            Learn the basics of hygiene, its importance, and how it can be effectively implemented in everyday life.
                        </p>
                        <a href="#" class="text-yellow-500 hover:underline font-medium">Start Module</a>
                    </div>
                </div>

                <!-- Module 2 -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                    <img src="https://via.placeholder.com/400x200" alt="Module 2" class="w-full h-48 object-cover" />
                    <div class="p-6">
                        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-4">Module 2: Advanced Cleaning Techniques</h2>
                        <p class="text-gray-600 dark:text-gray-300 mb-4">
                            Dive deeper into professional cleaning methods used in various industries.
                        </p>
                        <a href="#" class="text-yellow-500 hover:underline font-medium">Start Module</a>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Sanifect LMS. All rights reserved.</p>
    </footer>

    <script>
        // Load the theme from localStorage
        function loadTheme() {
            if (localStorage.getItem('darkMode') === 'enabled') {
                document.documentElement.classList.add('dark');
            }
        }

        // Toggle dark mode and store preference in localStorage
        function toggleDarkMode() {
            const html = document.documentElement;
            const isDarkMode = html.classList.toggle('dark');
            localStorage.setItem('darkMode', isDarkMode ? 'enabled' : 'disabled');
        }
    </script>
</body>

</html>