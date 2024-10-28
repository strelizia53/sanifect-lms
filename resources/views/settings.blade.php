<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 dark:bg-gray-900 dark:text-white min-h-screen" onload="loadTheme()">
    <x-navbar />

    <div class="container mx-auto mt-12">
        <h1 class="text-4xl font-semibold text-center">Settings</h1>

        <div class="mt-8 max-w-xl mx-auto bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg">
            <div class="flex items-center justify-between">
                <label for="darkModeToggle" class="text-lg">Dark Mode</label>
                <input type="checkbox" id="darkModeToggle" class="w-6 h-6" onclick="toggleDarkMode()">
            </div>
        </div>
    </div>

    <script>
        function loadTheme() {
            const darkMode = localStorage.getItem('darkMode');
            if (darkMode === 'enabled') {
                document.documentElement.classList.add('dark');
                document.getElementById('darkModeToggle').checked = true;
            }
        }

        function toggleDarkMode() {
            const html = document.documentElement;
            const isDarkMode = html.classList.toggle('dark');
            localStorage.setItem('darkMode', isDarkMode ? 'enabled' : 'disabled');
        }
    </script>
</body>
</html>
