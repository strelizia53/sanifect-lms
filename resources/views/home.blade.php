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

        .main {
            flex: 1;
            display: flex;
            overflow: hidden;
        }

        .sidebar {
            width: 250px;
            background-color: white;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
        }

        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background-color: rgba(107, 114, 128, 0.5);
            border-radius: 3px;
        }

        .content {
            flex: 1;
            padding: 2rem;
        }

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
    <x-navbar />

    <div class="main">
        <!-- Sidebar -->
        <aside class="sidebar p-6 dark:bg-gray-800">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-white mb-6">Categories</h2>
            <ul class="space-y-4">
                @forelse($categories as $category)
                    <li>
                        <a href="#" class="text-gray-600 dark:text-gray-300 hover:text-yellow-500">
                            {{ $category->name }}
                        </a>
                    </li>
                @empty
                    <p>No categories available</p>
                @endforelse
            </ul>
        </aside>

        <!-- Content Area -->
        <div class="content">
            <div class="flex justify-center mb-8">
                <input type="text" placeholder="Search modules..." 
                    class="w-3/4 md:w-1/2 px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-yellow-400">
            </div>

            <section class="text-center">
                <h1 class="text-4xl font-bold text-gray-700 dark:text-white mb-4">Welcome to Sanifect LMS</h1>
                <p class="text-gray-600 dark:text-gray-300">
                    You are logged in as <strong>{{ auth()->user()->role }}</strong>.
                </p>
            </section>
            
            <section class="mt-12 grid grid-cols-1 sm:grid-cols-2 gap-8">
                @forelse($modules as $module)
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                        <img src="{{ asset('storage/' . $module->cover_image) }}" alt="{{ $module->title }}" class="w-full h-48 object-cover" />
                        <div class="p-6">
                            <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-4">{{ $module->title }}</h2>
                            <p class="text-gray-600 dark:text-gray-300 mb-4">{{ $module->description }}</p>
                            <a href="{{ route('modules.show', $module->id) }}" class="text-yellow-500 hover:underline font-medium">
                                View Module
                            </a>
                        </div>
                    </div>
                @empty
                    <p>No modules available</p>
                @endforelse
            </section>            
        </div>
    </div>

    {{-- <footer>
        <p>&copy; 2024 Sanifect LMS. All rights reserved.</p>
    </footer> --}}

    <script>
        function loadTheme() {
            if (localStorage.getItem('darkMode') === 'enabled') {
                document.documentElement.classList.add('dark');
            }
        }
    </script>

</body>

</html>
