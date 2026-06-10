<div class="min-h-screen flex items-center justify-center bg-gray-100">

<<<<<<< HEAD
    <form wire:submit="login" class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md">

        <h2 class="text-3xl font-bold text-center mb-6">
            Login
        </h2>

        <div class="mb-4">
            <input type="email" wire:model="email" placeholder="Email"
                class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('email') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <input type="password" wire:model="password" placeholder="Password"
                class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('password') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
        </div>

        <div class="mb-6 flex items-center">
            <input type="checkbox" wire:model="remember" id="remember" class="mr-2 rounded text-blue-500 focus:ring-blue-500">
            <label for="remember" class="text-sm text-gray-600 select-none">Ingat Saya</label>
        </div>

        <button type="submit"
            class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold p-3 rounded-lg transition">
            Login
        </button>

        <div class="flex justify-center items-center gap-1 mt-4">
            <p>Belum punya akun?</p>
            <a href="{{ route('register') }}" class="text-blue-500 hover:underline">
                Register
            </a>
        </div>

    </form>

=======
    <div class="max-w-xl w-full mx-auto bg-white shadow-lg rounded-xl p-8">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">
            Login
        </h2>

        <form action="{{ route('auth.login') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <input 
                    type="text" 
                    name="email" 
                    placeholder="Email"
                    class="w-full border border-gray-300 rounded-lg px-5 py-4 text-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <input 
                    type="password" 
                    name="password" 
                    placeholder="Password"
                    class="w-full border border-gray-300 rounded-lg px-5 py-4 text-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <button 
                type="submit"
                class="w-full bg-blue-500 hover:bg-blue-600 text-white text-lg font-semibold px-4 py-4 rounded-lg transition duration-200">
                Login
            </button>
        </form>

        <p class="text-center text-gray-600 mt-6">
            Belum punya akun?
            <a href="{{ route('auth.register') }}"
               class="text-blue-600 hover:underline font-medium">
                Register
            </a>
        </p>
    </div>

>>>>>>> 35dde02f19cb878a913b204da8db055c9abbfe25
</div>