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

    <div class="container mx-auto mt-16">
        <!-- Profile Header -->
        <div class="flex flex-col items-center">
            <div class="relative">
                <!-- Profile Picture -->
                <img src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : 'https://via.placeholder.com/150' }}" 
                     alt="Profile Picture" 
                     class="w-40 h-40 rounded-full object-cover border-4 border-yellow-500 shadow-md">
        
                <!-- Edit Profile Picture Button -->
                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" 
                class="absolute bottom-1 right-1">
              @csrf
              @method('PUT')
      
              <label for="profile_picture" class="bg-yellow-500 w-8 h-8 flex items-center justify-center 
                                                 rounded-full cursor-pointer shadow-md hover:bg-yellow-400 transition">
                  <span class="text-white text-lg font-bold">+</span>
              </label>
              <input type="file" name="profile_picture" id="profile_picture" class="hidden" onchange="this.form.submit()">
          </form>
            </div>
        
            <h1 class="text-4xl font-bold mt-6 text-gray-800 dark:text-white text-center">
                {{ $user->name }}
            </h1>
            <p class="text-lg text-gray-500 dark:text-gray-400 mt-2">{{ $user->email }}</p>
        </div>

        <!-- Certifications Section -->
        <div class="mt-12">
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-xl p-6">
                <h2 class="text-2xl font-semibold mb-6">Certifications</h2>

                <ul class="space-y-4">
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

                <button class="mt-6 w-full bg-yellow-500 text-gray-900 py-3 rounded-lg font-semibold 
                               hover:bg-yellow-400 transition duration-200">
                    Add Certification
                </button>
            </div>
        </div>

        <!-- Logout Button -->
        <div class="mt-12 flex justify-center">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="bg-red-500 text-white px-8 py-3 rounded-lg font-semibold 
                               hover:bg-red-400 transition duration-200 shadow-md">
                    Logout
                </button>
            </form>
        </div>
    </div>

    <script>
        // Load the theme from localStorage
        function loadTheme() {
            if (localStorage.getItem('darkMode') === 'enabled') {
                document.documentElement.classList.add('dark');
            }
        }
    </script>
</body>

</html>
