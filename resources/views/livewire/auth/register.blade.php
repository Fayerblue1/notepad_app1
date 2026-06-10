<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <form wire:submit="register" class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md">

        <h1 class="text-3xl font-bold text-center mb-6">
            Register
        </h1>

        <div class="mb-4">
            <label class="block mb-2 font-medium">Nama</label>
            <input type="text" wire:model="name" placeholder="nama"
                class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('name') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-2 font-medium">Email</label>
            <input type="email" wire:model="email" placeholder="email"
                class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('email') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-2 font-medium">Password</label>
            <input type="password" wire:model="password" placeholder="password"
                class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('password') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
        </div>

        <div class="mb-6">
            <label class="block mb-2 font-medium">Konfirmasi Password</label>
            <input type="password" wire:model="password_confirmation" placeholder=""
                class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <button type="submit"
            class="w-full cursor-pointer bg-blue-500 hover:bg-blue-600 text-white font-semibold p-3 rounded-lg transition">
            Register
        </button>

        <div class="flex justify-center items-center gap-1 mt-4">
            <p>Sudah punya akun?</p>
            <a href="{{ route('login') }}" class="text-blue-500 hover:underline">
                Login
            </a>
            <p>sekarang</p>
        </div>

    </form>
</div>