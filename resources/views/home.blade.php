<h1 class="text-4xl text-center mt-20">Welcome to Sanifect LMS</h1>
<p class="text-center text-gray-600">You are logged in as {{ auth()->user()->role }}.</p>
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button class="mt-4 bg-red-500 text-white py-2 px-4 rounded-lg">Logout</button>
</form>
