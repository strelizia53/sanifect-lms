<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="{{ asset('logo.png') }}">
    <title>LMS | Dashboard</title>
    @vite('resources/css/app.css')
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }

        .content {
            flex: 1;
            padding: 1rem;
        }

        footer {
            width: 100%;
            background-color: #1a1a1a;
            color: white;
            text-align: center;
            padding: 0.75rem 0;
        }
    </style>
</head>

<body class="bg-gray-100 dark:bg-gray-900 dark:text-white" onload="loadTheme()">
    <x-navbar />

    <div class="content mx-auto w-full px-4">
        <!-- Welcome Section -->
        <section class="text-center py-8">
            <h1 class="text-4xl font-bold text-gray-700 dark:text-white mb-2">
                Welcome to Sanifect LMS
            </h1>
            <p class="text-gray-600 dark:text-gray-300">
                You are logged in as <strong>{{ auth()->user()->role }}</strong>.
            </p>
        </section>

        <!-- Modules Section -->
        <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8">
            <!-- Sample Module -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
                <img src="{{ asset('moduleSlides/1.jpg') }}" 
                     alt="Sample Module" 
                     class="w-full h-64 object-cover"
                />
                <div class="p-6">
                    <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-4">
                        Sample Module
                    </h2>
                    <p class="text-lg text-gray-600 dark:text-gray-300 mb-4">
                        <strong>Category:</strong> Medicine
                    </p>
                    <p class="text-gray-600 dark:text-gray-300 mb-6">
                        Sanifect infection control module.
                    </p>
                    <a href="{{ route('quiz.index') }}" 
                       class="text-yellow-500 hover:underline font-medium text-lg">
                        View Module
                    </a>
                </div>
            </div>

            <!-- Module 1 -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
                <img src="{{ asset('moduleSlides/2.jpg') }}" 
                     alt="Module 1" 
                     class="w-full h-64 object-cover"
                />
                <div class="p-6">
                    <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-4">
                        Module 1
                    </h2>
                    <p class="text-lg text-gray-600 dark:text-gray-300 mb-4">
                        <strong>Category:</strong> Infection Control
                    </p>
                    <p class="text-gray-600 dark:text-gray-300 mb-6">
                        Learn about infection prevention and control measures.
                    </p>
                    <a href="{{ route('module1.index') }}" 
                       class="text-yellow-500 hover:underline font-medium text-lg">
                        View Module
                    </a>
                </div>
            </div>

            <!-- Module 2 -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
                <img src="{{ asset('moduleSlides/3.jpg') }}" 
                     alt="Module 2" 
                     class="w-full h-64 object-cover"
                />
                <div class="p-6">
                    <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-4">
                        Module 2
                    </h2>
                    <p class="text-lg text-gray-600 dark:text-gray-300 mb-4">
                        <strong>Category:</strong> Healthcare Safety
                    </p>
                    <p class="text-gray-600 dark:text-gray-300 mb-6">
                        Understanding healthcare safety measures and protocols.
                    </p>
                    <a href="{{ route('module2.index') }}" 
                       class="text-yellow-500 hover:underline font-medium text-lg">
                        View Module
                    </a>
                </div>
            </div>

            <!-- Module 3 -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
                <img src="{{ asset('moduleSlides/4.jpg') }}" 
                     alt="Module 3" 
                     class="w-full h-64 object-cover"
                />
                <div class="p-6">
                    <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-4">
                        Module 3
                    </h2>
                    <p class="text-lg text-gray-600 dark:text-gray-300 mb-4">
                        <strong>Category:</strong> Patient Care
                    </p>
                    <p class="text-gray-600 dark:text-gray-300 mb-6">
                        Best practices in patient care and hygiene.
                    </p>
                    <a href="{{ route('module3.index') }}" 
                       class="text-yellow-500 hover:underline font-medium text-lg">
                        View Module
                    </a>
                </div>
            </div>
        </section>    
    </div>

    <footer>
        <p>&copy; 2024 Sanifect LMS. All rights reserved.</p>
    </footer>

    <script>
        function loadTheme() {
            if (localStorage.getItem('darkMode') === 'enabled') {
                document.documentElement.classList.add('dark');
            }
        }
    </script>

</body>

</html>
