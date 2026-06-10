<div class="min-h-screen flex items-center justify-center bg-gray-100">


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


</div>