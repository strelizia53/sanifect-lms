<!-- resources/views/components/navbar.blade.php -->
<nav class="bg-yellow-500 shadow-lg">
    <div class="max-w-full px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
        <!-- Logo Image -->
        <div>
            <a href="{{ route('home') }}">
                <img src="{{ asset('logo.png') }}" alt="Logo" class="h-10">
            </a>
        </div>

        <!-- Right Side: Show Login/Register or User Dropdown -->
        <div class="flex items-center space-x-4">
            @auth
                <div class="relative">
                    <button id="dropdownButton" class="text-gray-900 font-medium flex items-center space-x-2">
                        <span>Welcome, {{ auth()->user()->name }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-5 h-5"
                             viewBox="0 0 24 24">
                            <path d="M7 10l5 5 5-5z"/>
                        </svg>
                    </button>

                    <div id="dropdownMenu"
                         class="absolute right-0 mt-2 bg-white rounded-lg shadow-lg w-48 hidden z-10">
                        <a href="{{ route('profile') }}" class="block px-4 py-2 text-gray-900 hover:bg-yellow-100">Profile</a>
                        {{-- <a href="{{ route('settings') }}" class="block px-4 py-2 text-gray-900 hover:bg-yellow-100">Settings</a> --}}
                        <form method="POST" action="{{ route('logout') }}" class="block">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-gray-900 hover:bg-yellow-100">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}" class="text-gray-900 hover:text-white font-semibold">Login</a>
                <a href="{{ route('register') }}" class="text-gray-900 hover:text-white font-semibold">Register</a>
            @endauth
        </div>
    </div>
</nav>

<script>
    const dropdownButton = document.getElementById('dropdownButton');
    const dropdownMenu = document.getElementById('dropdownMenu');

    dropdownButton?.addEventListener('click', () => {
        dropdownMenu.classList.toggle('hidden');
    });

    document.addEventListener('click', (event) => {
        if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.classList.add('hidden');
        }
    });
</script>
