<div class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="max-w-md mx-auto bg-white shadow-lg rounded-lg p-6">
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Login</h2>

    <form action="{{ route('auth.login') }}" method="POST" class="space-y-4">
        <div>
            <input type="text" name="email" placeholder="Email" 
                class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
            <input type="password" name="password" placeholder="Password" 
                class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <button type="submit" 
            class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded-md transition duration-200">
            Login
        </button>
    </form>

    <p class="text-center text-gray-600 mt-6">
        Belum punya akun? 
        <a href="{{ route('auth.register') }}" class="text-blue-600 hover:underline font-medium">Register</a>
    </p>
</div>

</div>

