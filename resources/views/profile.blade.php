<!-- resources/views/profile.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 dark:bg-gray-900 dark:text-white min-h-screen" onload="loadTheme()">
    <x-navbar />

    <div class="container mx-auto mt-12">
        <!-- Profile Header -->
        <div class="flex flex-col items-center">
            <div class="relative">
                <!-- Profile Picture -->
                <img src="https://via.placeholder.com/150" 
                     alt="Profile Picture" 
                     class="w-36 h-36 rounded-full border-4 border-yellow-500 shadow-lg">
                <!-- Edit Profile Picture Button -->
                <button class="absolute bottom-0 right-0 bg-yellow-500 p-2 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15.232 5.232a3 3 0 114.243 4.243L7.5 21H3v-4.5L15.232 5.232z" />
                    </svg>
                </button>
            </div>

            <h1 class="text-4xl font-semibold mt-4 text-gray-800 dark:text-white text-center">
                {{ auth()->user()->name }}
            </h1>
            <p class="text-lg text-gray-500 dark:text-gray-400 mt-2">{{ auth()->user()->email }}</p>
        </div>

        <!-- Profile Sections -->
        <div class="mt-12 space-y-8">
            <!-- About Me Section -->
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6 flex flex-col justify-between min-h-[300px]">
                <div>
                    <h2 class="text-2xl font-semibold mb-4">About Me</h2>
                    <ul class="space-y-3">
                        <li class="text-gray-700 dark:text-gray-300">
                            <strong>Birthday:</strong> January 15, 1990
                        </li>
                        <li class="text-gray-700 dark:text-gray-300">
                            <strong>Location:</strong> New York, USA
                        </li>
                        <li class="text-gray-700 dark:text-gray-300">
                            <strong>Phone:</strong> +1 (123) 456-7890
                        </li>
                        <li class="text-gray-700 dark:text-gray-300">
                            <strong>Bio:</strong> Passionate learner and hygiene expert with 10+ years of experience 
                            in promoting health and sanitation practices. Loves traveling and reading in my spare time.
                        </li>
                    </ul>
                </div>
                <button class="mt-4 w-full bg-yellow-500 text-gray-900 py-2 rounded-lg font-semibold 
                               hover:bg-yellow-400 transition duration-200">
                    Edit About Me
                </button>
            </div>

            <!-- Certifications Section -->
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6 flex flex-col justify-between min-h-[300px]">
                <div>
                    <h2 class="text-2xl font-semibold mb-4">Certifications</h2>
                    <ul class="space-y-3">
                        <li class="text-gray-700 dark:text-gray-300">
                            <strong>Course Name:</strong> Advanced Hygiene Certification
                        </li>
                        <li class="text-gray-700 dark:text-gray-300">
                            <strong>Institution:</strong> XYZ Institute
                        </li>
                        <li class="text-gray-700 dark:text-gray-300">
                            <strong>Date Achieved:</strong> March 2024
                        </li>
                    </ul>
                </div>
                <button class="mt-4 w-full bg-yellow-500 text-gray-900 py-2 rounded-lg font-semibold 
                               hover:bg-yellow-400 transition duration-200">
                    Add Certification
                </button>
            </div>

            <!-- Completed Courses Section -->
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6 flex flex-col justify-between min-h-[300px]">
                <div>
                    <h2 class="text-2xl font-semibold mb-4">Completed Courses</h2>
                    <ul class="space-y-3">
                        <li class="text-gray-700 dark:text-gray-300">
                            <strong>Course:</strong> Introduction to Hygiene
                            <span class="block text-sm text-gray-500 dark:text-gray-400">Completed: January 2024</span>
                        </li>
                        <li class="text-gray-700 dark:text-gray-300">
                            <strong>Course:</strong> Advanced Cleaning Techniques
                            <span class="block text-sm text-gray-500 dark:text-gray-400">Completed: February 2024</span>
                        </li>
                    </ul>
                </div>
                <button class="mt-4 w-full bg-yellow-500 text-gray-900 py-2 rounded-lg font-semibold 
                               hover:bg-yellow-400 transition duration-200">
                    View All Courses
                </button>
            </div>
        </div>
    </div>

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
