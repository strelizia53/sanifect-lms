<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="{{ asset('logo.png') }}">
    <title>{{ $module->title }} | LMS</title>
    @vite('resources/css/app.css')
    <style>
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background-color: #1a1a1a; /* Match with profile's dark mode */
            color: white; /* Ensure text is readable */
            font-family: 'Arial', sans-serif;
        }

        .main {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            height: 80vh;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.5); /* Dark shadow for better visual depth */
            background-color: #1f2937; /* Darker background inside the container */
        }

        .container iframe {
            width: 100%;
            height: 100%;
            border: none;
        }

        .back-button {
            margin: 1rem;
            display: inline-block;
            background-color: #f59e0b; /* Yellow for consistency */
            color: black;
            padding: 0.75rem 1.5rem;
            text-decoration: none;
            border-radius: 4px;
            align-self: flex-start;
        }

        .back-button:hover {
            background-color: #d97706;
        }

        .dark {
            background-color: #111827; /* Dark theme matching with the site */
        }
    </style>
</head>

<body class="bg-gray-100 dark:bg-gray-900 dark:text-white" onload="loadTheme()">
    <!-- Navbar Component -->
    <x-navbar />

    <div class="main">
        <div class="container">
            <!-- Dynamically load the correct module content via iframe -->
            <iframe src="{{ asset($folderPath) }}" title="{{ $module->title }}"></iframe>
        </div>
    </div>

    <a href="{{ route('home') }}" class="back-button">Back to Home</a>

    <script>
        // Load theme from localStorage
        function loadTheme() {
            const isDarkMode = localStorage.getItem('darkMode') === 'enabled';
            if (isDarkMode) {
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
