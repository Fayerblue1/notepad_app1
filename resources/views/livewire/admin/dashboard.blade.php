<div class="m-0 bg-gray-50 text-gray-800 antialiased">


    <div class="flex h-screen w-full overflow-hidden">

        <div style="width:14%" class="bg-blue-700 h-full flex flex-col justify-between p-3 text-white">
            <div>
                <h1 class="text-2xl font-black tracking-wider mb-8 flex items-center gap-2">
                    LOGO<span class="text-blue-300">"</span>
                </h1>

                <button class="w-full bg-white hover:bg-blue-50 text-blue-700 font-bold py-3 px-4 rounded-xl transition duration-200 shadow-md transform active:scale-95 text-sm uppercase tracking-wider">
                     Add Note +
                </button>
            </div>

            <div class="border-t border-blue-600 pt-4">
                <p class="text-xs text-blue-200 uppercase tracking-widest font-semibold">Logged in as</p>
                <h2 class="text-sm font-bold tracking-wide truncate">USERNAME</h2>
            </div>
        </div>


        <div style="width:18%" class="h-full bg-gray-100 border-r border-gray-200 flex flex-col">
            <div class="p-4 border-b border-gray-200 bg-gray-200 bg-opacity-50">
                <h1 class="text-center font-bold text-gray-700 tracking-wide text-sm uppercase">
                    Recent
                </h1>
            </div>

            <div class="flex-1 overflow-y-auto p-2 space-y-1">
                <div class="bg-gray-300 bg-opacity-70 p-3 rounded-xl cursor-pointer transition">
                    <h3 class="font-bold text-sm text-gray-900 truncate">Title note</h3>
                    <p class="text-xs text-gray-500 truncate mt-0.5">Username</p>
                </div>

                <div class="hover:bg-gray-200 p-3 rounded-xl cursor-pointer transition">
                    <h3 class="font-medium text-sm text-gray-700 truncate">Another note title</h3>
                    <p class="text-xs text-gray-400 truncate mt-0.5">Username</p>
                </div>
            </div>
        </div>


        <div style="width:68%" class="h-full bg-gray-50 flex flex-col p-8">
            
            <div class="mb-4">
                <input 
                    type="text" 
                    value="title Note" 
                    placeholder="Masukkan judul catatan..."
                    class="w-full bg-transparent text-3xl font-extrabold text-gray-900 tracking-tight placeholder-gray-300 focus:outline-none border-b border-transparent focus:border-gray-200 pb-1"
                >
                <p class="text-sm text-gray-400 mt-1 font-medium">
                    Username
                </p>
            </div>

            
            <div class="flex-1 w-full">
                <textarea 
                    placeholder="Mulai tulis catatan Anda di sini..."
                    class="w-full h-full p-6 bg-white border border-gray-200 rounded-2xl shadow-sm resize-none focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-700 leading-relaxed placeholder-gray-400"
                ></textarea>
            </div>
            
        </div>

    </div>

</div>