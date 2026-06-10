<div class="m-0 bg-gray-50 text-gray-800 antialiased">
    <div class="flex h-screen w-full overflow-hidden">

        <div style="width:14%" class="bg-blue-400 h-full flex flex-col justify-between p-3 text-white">
            <div>
                <h1 class="text-2xl font-black tracking-wider mb-8 flex items-center gap-2">
                    LOGO<span class="text-blue-300">"</span>
                </h1>

                <button wire:click="createNote"
                    class="w-full bg-white hover:bg-blue-50 text-blue-700 font-bold py-3 px-4 rounded-xl transition duration-200 shadow-md transform active:scale-95 text-sm uppercase tracking-wider">
                    Add Note +
                </button>
            </div>

            <div class="border-t border-blue-400 pt-4 flex flex-col gap-3">
                <div>
                    <p class="text-xs text-blue-300 uppercase tracking-widest font-semibold">Logged in as</p>
                    <h2 class="text-sm font-bold tracking-wide truncate">{{ auth()->user()->name ?? 'Guest' }}</h2>
                </div>

                <button wire:click="logout"
                    class="w-full bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded transition duration-200 shadow-md text-sm uppercase tracking-wider">
                    Logout
                </button>
            </div>
        </div>

        <div style="width:18%" class="h-full bg-gray-100 border-r border-gray-200 flex flex-col">
            <div class="p-4 border-b border-gray-200 bg-gray-200 bg-opacity-50">
                <h1 class="text-center font-bold text-gray-700 tracking-wide text-sm uppercase mb-2">
                    Recent
                </h1>
                <input type="text" wire:model.live="search" placeholder="Cari catatan..."
                    class="w-full px-3 py-1.5 text-sm border rounded shadow-sm focus:outline-none focus:ring focus:border-blue-300">
            </div>

            <div class="flex-1 overflow-y-auto p-2 space-y-1">
                @forelse($notes as $note)
                    <div wire:click="loadNote({{ $note->id }})"
                        class="hover:bg-gray-200 p-3 rounded-xl cursor-pointer transition {{ $noteId === $note->id ? 'bg-gray-200 border-l-4 border-blue-500' : '' }}">
                        <h3 class="font-bold text-sm text-gray-900 truncate">{{ $note->title ?: 'Tanpa Judul' }}</h3>

                        <div class="flex justify-between items-center mt-0.5">
                            <p class="text-xs text-gray-500 truncate">{{ $note->created_at->format('d M Y') }}</p>
                            <button onclick="return confirm('Hapus catatan ini?')"
                                wire:click.stop="deleteNote({{ $note->id }})"
                                class="text-red-500 hover:text-red-700 text-xs font-bold">Hapus</button>
                        </div>
                    </div>
                @empty
                    <div class="p-3 text-center text-sm text-gray-500">
                        Belum ada catatan.
                    </div>
                @endforelse

                <div class="p-2">
                    {{ $notes->links() }}
                </div>
            </div>
        </div>

        <div style="width:68%" class="h-full bg-gray-50 flex flex-col p-8">

            @if (session()->has('message'))
                <div
                    class="bg-green-100 border-l-4 border-green-500 text-green-700 p-3 rounded mb-4 text-sm font-semibold">
                    {{ session('message') }}
                </div>
            @endif

            <div class="mb-4 flex justify-between items-start gap-4">
                <div class="flex-1">
                    <input type="text" wire:model="title" placeholder="Masukkan judul catatan..."
                        class="w-full bg-transparent text-3xl font-extrabold text-gray-900 tracking-tight placeholder-gray-300 focus:outline-none border-b border-transparent focus:border-gray-200 pb-1">
                    @error('title')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror

                    <p class="text-sm text-gray-400 mt-1 font-medium">
                        {{ auth()->user()->name ?? 'Guest' }}
                        @if ($noteId)
                            • <span class="text-blue-500 text-xs">Sedang Edit Catatan</span>
                        @endif
                    </p>
                </div>

                <button wire:click="saveNote"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-xl transition duration-200 shadow-md">
                    Simpan
                </button>
            </div>

            <div class="flex-1 w-full">
                <textarea wire:model.live.debounce.1000ms="content" placeholder="Mulai tulis catatan Anda di sini..."
                    class="w-full h-full p-6 bg-white border border-gray-200 rounded-2xl shadow-sm resize-none focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-700 leading-relaxed placeholder-gray-400"></textarea>
                @error('content')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

        </div>

    </div>
</div>
